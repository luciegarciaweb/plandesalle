<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
   /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_strict' => 'boolean'
        'is_regular' => 'boolean'
        'is_dance' => 'boolean'
        'is_accommodate' => 'boolean'
    ];
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
        'event', 'number_people','disposition', 'start_date', 'end_date', 'start_time', 'end_time', 'catere','budget','description','firstname', 'lastname', 'email', 'phone', 'is_strict', 'is_regular', 'is_dance', 'is_accommodate'
    ];

}
