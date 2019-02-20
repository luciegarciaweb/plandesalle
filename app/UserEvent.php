<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
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
        'name'
    ];

    /**
     * Récupère l'environment;
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

     /**
     * Récupère l'environment;
     */
    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
