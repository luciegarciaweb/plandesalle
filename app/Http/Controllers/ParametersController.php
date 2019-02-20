<?php

namespace App\Http\Controllers;

use App\Parameter;
use App\Place;
use App\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;

class ParametersController extends Controller
{
   //user profile requires middleware authenticate
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Edit the parameters.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::user()){
            $favorites = favorite::where('user_id', Auth::user()->id)->count();

            return view('parameters/dashboard', [
            'favorites' => $favorites,
            ]);
        }
    }

    /**
     * Edit the profile parameters.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('parameters/edit');
    }

    /**
     * update user profile.
     * @param  \App\User  $user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //allows to verify that the incoming request body
        $request->validate([
            'firstname' => 'required|string|max:191',
            'lastname' => 'required|string|max:191',
            'email' => 'required|email|string|max:191',
            'phone' =>'nullable|numeric',
            'address' => 'nullable|string|max:191',
            'postal_code' => 'nullable|string|max:8',
            'city' => 'nullable|string|max:75',
            'job' => 'nullable|string|max:75'
        ]);
           
        Auth::user()->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'job' => $request->input('job')
        ]);

        return redirect()->route('parameters.edit')
            ->with('success', 'Votre profil a bien été mis à jour.');
    }

     /**
     * change user password.
     * @param  \Illuminate\Validation\Validator  $validator
     * @return \Illuminate\Http\Response
     */
    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Entrez votre mot de passe actuel',
            'password.required' => 'Entrez votre nouveau mot de passe',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required|string',
            'password' => 'required|same:password',
            'confirmPassword' => 'required|same:password',    
        ], $messages);

        return $validator;
    } 
   
    /**
     * change user password.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordsUpdate(Request $request)
    {
        if (Hash::check($request->input('old_password'), Auth::user()->password)) {
            $request->validate([
                'new_password' => 'required|string|min:6|max:191',
                'confirm_new_password' => 'required|same:new_password'
            ]);

            Auth::user()->update([
                'password' => Hash::make($request->input('new_password'))
            ]);

            return redirect()->back()->with('success', 'Votre mot de passe a bien été changé.');
        }

        return redirect()->back()->withErrors(['old_password' => 'Mot de passe incorrect.']);
    }
      
    //change password
    public function passwordsEdit()
    {
        return view('parameters/passwords_edit');
    }

    /**
     * Edit the favoris parameters.
     *
     * @return \Illuminate\Http\Response
     */
    public function favoris()
    {
        //get all favorites places according user
        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        
        /*dd($favorites);*/

        return view('parameters/favoris', [
            'favorites' => $favorites,
            /*'places' => $places*/
        ]);
    }
}
