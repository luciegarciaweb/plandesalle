<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'insee_code', 'zip_code', 'name', 'slug', 'gps_lat', 'gps_lng', 'department_code'
    ];

    /**
     * get department;
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'department_code', 'code');
    }
    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKey()
    {
        return $this->slug;
    }

    

    /**
     * get place;
     */
    public function places()
    {
        return $this->hasMany('App\Place', 'city_id', 'id');
    }
}
