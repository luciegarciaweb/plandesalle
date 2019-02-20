<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventsroom extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id', 'event_id'
    ];


    /**
     * Retourne l'evenement'
     */
    public function events()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * Retourne la salle
     */
    public function rooms()
    {
        return $this->belongsTo('App\Room');
    }
}
