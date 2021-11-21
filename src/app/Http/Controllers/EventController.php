<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use App\Services\JWTService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class EventController extends Controller
{
    public function __construct(
        private JWTService $JWTService,
    ) {}

    /**
     * Display a listing of the resource.
     *
     * @return \App\Traits\ApiResponse;
     */
    public function index(Request $request)
    {
        $event = Event::with('city')->orderBy('date', 'desc')->get();

        if($request->user instanceof User) {
            $userId = $request->user->id;
            
            $event->transform(function ($item) use($userId){
                $new_item = $item->toArray();

                $new_item["participant"] = $item->eventsUsers->count();
                
                $joined = $item->whereHas('eventsUsers', function (Builder $query) use($userId) {
                    $query->where('id_user', '=', $userId);
                })->count();
                $new_item["joined"] = $joined > 0;

                return $new_item;
            });
        } else {
            $event->transform(function ($item) {
                $new_item = $item->toArray();
                $new_item["participant"] = $item->eventsUsers->count();
                $new_item["joined"] = false;
                return $new_item;
            });
        }
        
        return $this->sendData($event);
    }

    /**
     * Display a listing of user's event from the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Traits\ApiResponse;
     */
    public function mine(Request $request)
    {
        $request->validate([
            'user' => 'required',
        ]);

        $eventsUsers = EventUser::where('id_user', $request->user->id)->with('event')->get();

        $eventsUsers->transform(function ($item) {
            $eventParticipant = Event::where('id', '=', $item->event->id)->first();
            $new_item = $item->toArray();
            $new_item["city_name"] = $item->event->city->name;
            $new_item["participant"] = $eventParticipant->eventsUsers->count();
            return $new_item;
        });

        return $this->sendData($eventsUsers);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id (event)
     * @return \App\Traits\ApiResponse;
     */
    public function show($id)
    {
        return $this->sendData(Event::with('city')->find($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id (event)
     * @return \App\Traits\ApiResponse;
     */
    public function post($id) {

        $data = EventUser::where('id_event', $id)->with('user')->get();
        return $this->sendData($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Traits\ApiResponse;
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_city' => 'required',
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        try {
            DB::beginTransaction();

            Event::create([
                'id_city' => $request->id_city,
                'name' => $request->name,
                'description' => $request->description,
                'date' => $request->date,
            ]);

            DB::commit();
            return $this->sendOk();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->handleException($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Traits\ApiResponse;
     */
    public function update(Request $request)
    {
        $request->validate([
            'id_event' => 'required',
            'id_city' => 'required',
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $event = Event::find($request->id_event);

        if(!$event) {
            return $this->sendError('Event not found.');
        }

        try {
            DB::beginTransaction();

            $event->update([
                'id_city' => $request->id_city,
                'name' => $request->name,
                'description' => $request->description,
                'date' => $request->date,
            ]);

            DB::commit();
            return $this->sendOk();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->handleException($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \App\Traits\ApiResponse;
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Event::destroy($id);
            DB::commit();
            return $this->sendOk();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->handleException($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @deprecated
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Traits\ApiResponse;
     */
    public function createParticipation(Request $request)
    {
        $request->validate([
            'id_event' => 'required',
            'is_event_organizer' => 'required',
        ]);

        $eventUser = EventUser::where('id_event', '=', $request->id_event)
            ->where('id_user', '=', $request->user->id)->first();

        if($eventUser) {
            return $this->sendError('Already Participate.'); 
        }
        
        try {
            DB::beginTransaction();

            $request->user->eventsUsers()->attach($request->id_event, [
                'is_event_organizer' => $request->is_event_organizer,
            ]);

            DB::commit();
            return $this->sendOk();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->handleException($e);
        }
    }

    /**
     * Update or Edit events_users row for upload photo and caption after event
     * @deprecated
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Traits\ApiResponse;
     */
    public function editParticipation(Request $request)
    {
        $request->validate([
            'id_event' => 'required',
            'caption' => 'required',
        ]);

        $photo = $request->file('photo');
        $filename = md5("{$request->id_event}". time()) . "." . $photo->getClientOriginalExtension();
        $photoUrl = $this->JWTService->save(file_get_contents($photo), $filename);

        $eventUser = EventUser::where('id_event', '=', $request->id_event)
            ->where('id_user', '=', $request->user->id)->first();

        $user = User::find($request->user->id);

        if(!$user) {
            return $this->sendError('Unauthorized.'); 
        }

        if(!$eventUser) {
            return $this->sendError('You did not participate in this event.'); 
        }

        if($eventUser->caption != null || $eventUser->link_photo != null) {
            return $this->sendError('You already made a post on this event.'); 
        }
        
        try {
            DB::beginTransaction();

            $eventUser->update([
                'caption' => $request->caption,
                'link_photo' => $photoUrl,
            ]);

            $user->update([
                'point' => $user->point + 1,
            ]);

            DB::commit();
            return $this->sendOk();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->handleException($e);
        }
    }

    /**
     * Rempce a created resource in storage.
     * @deprecated
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Traits\ApiResponse;
     */
    public function quitParticipation(Request $request)
    {
        $request->validate([
            'id_event' => 'required',
        ]);

        $eventUser = EventUser::where('id_event', '=', $request->id_event)
            ->where('id_user', '=', $request->user->id)->first();
        
        if(!$eventUser) {
            return $this->sendError('You did not participate in this event.'); 
        }

        if($eventUser->caption != null || $eventUser->link_photo != null) {
            return $this->sendError('You already made a post on this event, cannot quit this event.'); 
        }

        try {
            DB::beginTransaction();
            
            $request->user->eventsUsers()->detach($request->id_event);

            DB::commit();
            return $this->sendOk();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->handleException($e);
        }
    }
}
