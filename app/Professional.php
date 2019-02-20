<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
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
        'description', 'company_name', 'siret', 'TVA_intracom', 'workforce'
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
    public function type_business()
    {
        return $this->belongsTo('App\TypeBusiness');
    }
}
