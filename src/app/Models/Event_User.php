<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_User extends Model
{
    use HasFactory;

    protected $table = 'events_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_event_organizer',
        'caption',
        'link_photo',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function event() {
        return $this->belongsTo(Event::class, 'id_event', 'id');
    }

}
