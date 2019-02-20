<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{

	/**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_accommodate' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number_people'
    ];
}
