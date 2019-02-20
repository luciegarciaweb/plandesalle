<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'place_id'
    ];

    /**
     * get the place relationship;
     */
    public function place()
    {
        return $this->belongsTo('App\Place', 'place_id');
    }

     /**
     * get the user relationship;
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
