<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picturesplace extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'place_id', 'picture_url'
    ];

    /**
     * Retourne les lieux
     */
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

}
