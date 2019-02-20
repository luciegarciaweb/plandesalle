<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
	/**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_read' => 'boolean'
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
        'name', 'address', 'city', 'typePlace', 'cap_max', 'cap_min', 'email', 'phone'
    ];


}
