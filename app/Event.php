<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    /**
     * Retourne rooms event(s)
     */
    public function eventsrooms()
    {
        return $this->hasMany('App\Eventsroom');
    }

}
