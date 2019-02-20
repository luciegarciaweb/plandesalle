<?php

namespace App\Http\Controllers;

use App\Quote;
use App\City;
use App\Department;
use App\Region;
use App\Place;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class QuotesController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function createQuote(Request $request) {

       $events = Event::all()->sortBy('name');
       
        return view('quote/create', [
        	'events' => $events,
        ]);
    }

     /**
     * Show the form for editing the specified resource.
     * 
     * @param  \App\Quote  $quote
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeQuote(Request $request)
    {
        $request->validate([
            'event' => 'required|string|max:100',
            'number_people' => 'required|integer|max:5',
            'disposition' => 'string|max:100',
            
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'min:1|max:24',
            'end_time' => 'min:1|max:24',

            'is_strict' => 'boolean',
            'is_regular' => 'boolean',
            'catere' => 'required|string|max:100',

            'is_dance' => 'boolean',
            'is_accommodate' => 'boolean',
            'budget' => 'string|max:100',
            'description' => 'string',

            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email|string|max:100',
            'phone' => 'required|string|min:10|max:15'
        ]);

        Quote::create([
            'event' => $request->input('event'),
            'number_people' => $request->input('number_people'),
            'disposition' => $request->input('disposition'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'is_strict' => $request->input('strict_date', true),
            'is_regular' => $request->input('regular_date', false),

            'catere' => $request->input('catere'),
            'is_dance' => $request->input('is_dance', false),
            'is_accommodate' => $request->input('is_accommodate', false),
            'budget' => $request->input('budget'),
            'description' => $request->input('description'),

            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('demande.create');
    }
}
