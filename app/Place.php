<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_bookmarked' => 'boolean',
        'is_privatized' => 'boolean',
        'is_validated' => 'boolean'
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
        'slug', 'name', 'environment_id', 'typeplace_id','description','address', 'city_id', 'surface','roomQuantity', 'persQuantity', 'is_bookmarked', 'is_privatized', 'is_validated', 'gps_lat', 'gps_lng'
    ];

    
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
     * get the city relationship;
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /**
     * get the room relationship;
     */
    public function room()
    {
        return $this->hasOne('App\Room');
    }

    /**
     * get the environment relationship;
     */
    public function environment()
    {
        return $this->belongsTo('App\Environment');
    }

      /**
     * get the pictures relationship;
     */
    public function picturesplaces()
    {
        return $this->hasMany('App\Picturesplace');
    }

    /**
     * get one type of place;
     */
    public function typeplace()
    {
        return $this->belongsTo('App\Typepplace');
    }

    
      /**
     * Récupère les favoris;
     */
    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }
}
