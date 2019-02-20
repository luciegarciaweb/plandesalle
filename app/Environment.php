<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
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
     * Récupère le lieu
     */
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
