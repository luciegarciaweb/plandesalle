<?php

namespace App;

use App\Favorite;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_admin' => 'boolean',
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
        'firstname', 'lastname', 'email', 'email_verified_at', 'password', 'job', 'phone', 'is_admin','is_active', 'address', 'postal_code', 'city', 'last_connexion', 'number_connexion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Affiche le prénom et le nom de famille
     */
    public function fullname()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    /**
    * Récupère les favoris;
    */
    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    /**
    * Récupère les favoris;
    */
    public function isFavorite($place){
       // dd($place);
        if(Auth::user()){
            return Favorite::where('place_id', $place->id)
            ->where('user_id', Auth::user()->id)
            ->first();
        }
    }

}
