<?php

namespace App\Http\Controllers;

use App\Room;
use App\City;
use App\Department;
use App\Region;
use App\Place;
use App\Event;
use App\Typeplace;
use App\Quote;
use App\User;
use App\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlacesController extends Controller {

    //search for a place by city name
    public function search($query) {
        //if queries are empty go back to /
        if (!$query) {
            return redirect()->back();
        } else {
            //use regex to match cities speels
            $cityname = preg_replace("/[^a-zA-Z]/", "", $query);
            $cityzip = preg_replace("/[^0-9]/", "", $query);
            
            //if the query has name and zipcode 
            if ($cityname and $cityzip) {
                //select the right city from cities table
                $city = DB::select("SELECT id,name,slug,department_code,zip_code FROM cities
                    WHERE name='$cityname' AND zip_code='$cityzip'"); // only one result available with AND
                if ($city) {
                    //get first data and redirect with slug and zipcode
                    $city = $city[0];
                    return redirect($city->slug . '-' . $city->zip_code);
                }
            //otherwise use regex and limit to 100 the cities result
            } elseif ($cityname or $cityzip) {
                $where = ($cityname) ? "name LIKE '%$cityname%'" : "zip_code='$cityzip'";
                $cities = DB::select("SELECT id,name,slug,department_code,zip_code FROM cities
                    WHERE $where LIMIT 100"); 
                //if one city exists get first data and redirect with slug and zipcode
                if ($cities) {
                    if (count($cities) == 1) {
                        $city = $cities[0];
                        return redirect($city->slug . '-' . $city->zip_code);
                    }
                    //loop cities to get the id
                    $cid = [];
                    foreach ($cities as $c) {
                        $cid[] = $c->id;
                    }
                    //find all places which have the same city id
                    $places = DB::select("SELECT P.name,P.slug,C.zip_code, P.gps_lat,P.gps_lng, P.address, C.name AS cityname
                        FROM places P JOIN cities C ON P.city_id=C.id
                        WHERE P.city_id IN (" . implode(',', $cid) . ')');

                    return view('places/index', ['places' => $places, 'cities' => $cities, 'query' => $query]);
                    
                }
            }
            //get the result on places index
            return view('places/index', ['query' => $query]);
        }
    }


    //show one place to the use
    public function show($slug) {
        $place = Place::where('slug', $slug)->first();
        $rooms = Room::where('place_id', $place->id)->get();
        return view('places/show', [
            'place' => $place,
            'rooms' => $rooms
        ]);
    }

    public function showCity($cityslug, $cityzip) {
        $places = false;
        $region = false;
        $department = false;
        $cities = false;

        $city = DB::select("SELECT id,name,slug,department_code FROM cities WHERE slug='$cityslug' AND zip_code='$cityzip'");
        if ($city) {
            $city = $city[0];

            $department = DB::select("SELECT * FROM departments WHERE code='" . $city->department_code . "'")[0];
            $region = DB::select("SELECT * FROM regions WHERE code='" . $department->region_code . "'")[0];

            $cities = DB::select("SELECT zip_code,name,slug
                        FROM cities
                        WHERE department_code='" . $department->code . "' ORDER BY name");
            $places = DB::select("SELECT P.id,P.name,P.slug,C.zip_code, P.gps_lat,P.gps_lng, P.address, C.name AS cityname
                        FROM places P JOIN cities C ON P.city_id=C.id
                        WHERE P.city_id=" . $city->id);
        }

        return view('places/index', [
            'places' => $places,
            'city' => $city,
            'cities' => $cities,
            'department' => $department,
            'region' => $region
        ]);
    }

    public function showDepartment($departmentslug, $departmentcode) {
        $places = false;
        $region = false;
        $cities = false;

        $department = DB::select("SELECT * FROM departments WHERE code='" . $departmentcode . "'");
        if ($department) {
            $department = $department[0];

            $region = DB::select("SELECT * FROM regions WHERE code='" . $department->region_code . "'")[0];

            $cities = DB::select("SELECT zip_code,name,slug
                        FROM cities
                        WHERE department_code='$departmentcode' ORDER BY name");

            $places = DB::select("SELECT P.id, P.name,P.slug,C.zip_code, P.gps_lat,P.gps_lng, P.address, C.name AS cityname
                        FROM departments D
                        JOIN cities C ON C.department_code=D.code
                        JOIN places P ON P.city_id=C.id
                        WHERE D.code='$departmentcode' LIMIT 100"); /* TODO pagination */
        }

        return view('places/index', [
            'places' => $places,
            'cities' => $cities,
            'department' => $department,
            'region' => $region
        ]);
    }

    public function showRegion($regionslug) {
        $places = false;
        $region = DB::select("SELECT * FROM regions WHERE slug='" . $regionslug . "'");
        if ($region) {
            $region = $region[0];

            $regions = DB::select("SELECT code,name,slug FROM regions ORDER BY name");
            $departments = DB::select("SELECT * FROM departments WHERE region_code='" . $region->code . "' ORDER BY name");

            $places = DB::select("SELECT P.id,P.name,P.slug,C.zip_code, P.gps_lat,P.gps_lng, P.address, C.name AS cityname
                        FROM regions R
                        JOIN departments D ON D.region_code=R.code
                        JOIN cities C ON C.department_code=D.code
                        JOIN places P ON P.city_id=C.id
                        WHERE R.slug='$regionslug' LIMIT 6"); /* TODO pagination */
        }

        return view('places/index', [
            'places' => $places,
            'regions' => $regions,
            'departments' => $departments,
            'region' => $region
        ]);
    }


    //show one place to the use
    public function showRoom($placeslug, $roomslug) {
        $place = Place::where('slug', $placeslug)->first();
        $room = false;
        if ($place) {
            $room = Room::where('place_id', $place->id)->where('slug', $roomslug)->first();
        }
        return view('places/showRoom', [
            'room' => $room,
            'place' => $place,
            /*'city' => $city*/
        ]);
    }


    /**
     * Store place in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $place = Place::find($id);

        $request->validate([
            'environment_id' => 'nullable|numeric|max:5',
            'typeplace_id' => 'nullable|numeric|max:5',
            'event_id' => 'nullable|numeric|max:5',
            'city_id' => 'required|numeric',
            'is_bookmarked' => 'nullable|numeric',
            'is_privatized' => 'nullable|numeric',
            'is_validated' => 'nullable|numeric',
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100',
            'description' => 'required|text',
            'address' => 'required|string|max:191',
            'surface' => 'required|numeric|max:6',
            'persQuantity' => 'required|numeric|max:5',
            'roomQuantity' => 'required|numeric|max:2',
            'picture' => 'nullable|string|max:191',
            'gps_lat' => 'required|numeric',
            'gps_lng' => 'required|numeric',

        ]);

        Product::create([
            'slug' => str_slug($request->input('title')),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'price' => $request->input('price'),
            'price_kilo' => $request->input('price_kilo'),
            'weight_unity' => $request->input('weight_unity'),
            'picture' => isset($picture) ? $picture : null,
            'quantity' => $request->input('quantity'),
            'variety_id' => $request->input('variety'),
            'container_id' => $request->input('container')
        ]);

        return redirect()->route('lieu.show')
            ->with('success', 'Vous avez bien modifié ce lieu. Il est en attente de validation par l\'administration du site');
    }

    // function to favorite places
   public function favorite($place)
    {
        //if user is logged
        if (Auth::user()) {
        //show places 
        $place = Place::where('slug', $place)->first();
        //show favorites places 
        $favorite = Favorite::where('place_id', $place->id)->first();
        //verified if user is logged
        $user = Auth::user();
            //if place is not already favorited, let's created it and add it to database
            if($favorite === null){

                Favorite::create([
                    'user_id' => $user->id,
                    'place_id' => $place->id
                ]);

            /*return redirect()->route('favorite.add');*/
            return response()->json(['favorite' => 'add']);

            //if place is already favorited, let's delete it from database
            }else{

                Favorite::where([
                    'user_id' => $user->id,
                    'place_id' => $place->id
                ])->delete();

           /* return redirect()->route('favorite.delete');*/
           return response()->json(['favorite' => 'delete']);
            }

        }

        //if user is not logged, show alert "you need to connect to favorite place"
         return response()->json(['favorite' => 'error']);
    }

}
