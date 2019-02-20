<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Room extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['room.id', 'room.name'],
                'separator' => '_'
            ],
        ];
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_dancing' => 'boolean',
        'is_seat' => 'boolean',
        'is_stand' => 'boolean',
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
        'slug', 'name', 'description', 'min_capacity_stand','max_capacity_stand', 'min_capacity_seat', 'max_capacity_seat', 'surface', 'picture', 'place_id', 'price_id', 'accommodation_id', 'option_id', 'equipment_id', 'is_dancing', 'is_seat', 'is_stand'
    ];

   
    
    /**
     * get the place relationship;
     */
    public function place()
    {
        return $this->belongsTo('App\Place', 'place_id');
    }

     /**
     * get the price relationship;
     */
    public function price()
    {
        return $this->belongsTo('App\Price');
    }


     /**
     * get the accommodation relationship;
     */
    public function accommodation()
    {
        return $this->belongsTo('App\Accommodation');
    }

     /**
     * get the option relationship;
     */
    public function option()
    {
        return $this->belongsTo('App\Option');
    }

     /**
     * get the equipment relationship;
     */
    public function equipment()
    {
        return $this->belongsTo('App\Equipment');
    }

    /**
     * Retourne rooms event(s)
     */
    public function eventsrooms()
    {
        return $this->hasMany('App\Eventsroom');
    }
}
