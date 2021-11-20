<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Traits\ApiResponse;
     */
    public function index()
    {
        return $this->sendData(Event::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \App\Traits\ApiResponse;
     */
    public function show($id)
    {
        return $this->sendData(Event::find($id));
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
}
