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
        'id_city',
        'name',
        'description',
        'date',
    ];

    public function city() {
        return $this->belongsTo(City::class, 'id_city', 'id');
    }

    public function eventsUsers() {
        return $this->hasMany(EventUser::class, 'id_event', 'id');
    }
}
