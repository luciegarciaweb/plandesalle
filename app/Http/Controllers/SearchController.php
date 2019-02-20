<?php

namespace App\Http\Controllers;

use App\Place;
use App\City;
use App\Department;
use App\Region;
use App\Event;
use App\Typeplace;
use App\Reference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
	//view autocomplete
    public function index(){
        return view('autocomplete.index');
    }

    //autocomplete action on input
    public function autocomplete(Request $request)
	{
		$term = $request->get('term', '');
		
        $queries = City::where('name', 'LIKE', $term.'%')
        ->orWhere('zip_code', 'LIKE', $term.'%')
        ->limit(5)
        ->get();
             

        $results = array();

		foreach ($queries as $query)
		{
		    $results[] = ['id' => $query->id, 'value' => $query->name.' '. $query->zip_code, 'city' => $query->name,'gps_lat'=>$query->gps_lat, 'gps_lng'=>$query->gps_lng];
		}

	        return response()->json($results);
	}
	
}

