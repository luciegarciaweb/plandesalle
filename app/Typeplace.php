<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeplace extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Récupère les lieux
     */
    public function places()
    {
        return $this->HasMany('App\Place');
    }
}
