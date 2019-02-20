<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'slug'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
         return $this->slug;
    }

     /**
     * Récupère les departemenst;
     */
    public function departments()
    {
        return $this->hasMany('App\Department', 'code', 'region_code');
    }

        
}
