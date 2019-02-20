<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'slug', 'region_code'
    ];

    /**
     * Récupère la region;
     */
    public function region()
    {
        return $this->belongsTo('App\Region', 'region_code', 'code');
    }

    /**
     * Récupère les villes;
     */
    public function cities()
    {
        return $this->hasMany('App\City', 'department_code', 'code');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
