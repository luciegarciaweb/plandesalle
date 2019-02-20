<?php

namespace App\Http\Controllers;

use App\Place;
use App\Room;
use App\City;
use App\Department;
use App\Region;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Show the application landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->sortBy('name');
        $cities = City::all()->sortBy('name');
        $regions = Region::all();
        $departments = Department::all();
        
       /* dd($regions);*/
        
        return view('home', [
            'events' => $events,
            'cities' => $cities,
            'regions' => $regions,
            'departments' => $departments
        ]);
    }

}
