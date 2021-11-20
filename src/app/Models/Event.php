<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'date',
    ];

    public function city() {
        return $this->belongsTo(City::class, 'id_city', 'id');
    }

    public function events_users() {
        return $this->hasMany(Event_User::class, 'id_event', 'id');
    }
}
