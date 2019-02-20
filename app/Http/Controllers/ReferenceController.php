<?php

namespace App\Http\Controllers;

use App\Reference;
use App\City;
use App\Department;
use App\Region;
use App\Place;
use App\Typeplace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ReferenceController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeplaces = TypePlace::all()->sortBy('name');

        return view('/reference/create', [
            'typeplaces' => $typeplaces
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  \App\Reference  $reference
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|string|max:191',
            'city' => 'required|string|max:100',
            'typePlace' => 'required|string|max:100',
            'cap_min' => 'required|string|string|max:191',
            'cap_max' => 'required|string|max:10',
            'email' => 'required|email|string|max:100',
            'phone' => 'nullable|string|min:10|max:15'
        ]);

        Reference::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'typePlace' => $request->input('typePlace'),
            'cap_min' => $request->input('cap_min'),
            'cap_max' => $request->input('cap_max'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);

        return redirect()->route('referencement.create')
        ->with('success', 'Merci. Votre référencement a bien été envoyé. Nous reviendrons vers vous pour compléter l\'annonce avant de la mettre en ligne.');
    }
}
