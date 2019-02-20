<?php

namespace App\Http\Controllers\Admin;

use App\Place;
use App\City;
use App\Room;
use App\Event;
use App\Eventsroom;
use App\Typeplace;
use App\Picturesplace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $places = Place::paginate(10);

        return view('admin/places/index', [
            'places' => $places
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all()->sortBy('name');
        $typeplaces = Typeplace::all()->sortBy('name');
        $cities = City::all();
        $place = Place::all();
        $rooms = Room::all();
        
        return view('admin/places/create', [
            'events' => $events,
            'typeplaces' => $typeplaces,
            'cities' => $cities,
            'place' => $place,
            'rooms' => $rooms,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[

            'name' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'description' => 'required|string|max:500',
            'typeplace' => 'required|string',
            'city' => 'required|numeric|exists:cities,id',
            'is_privatized' => 'required|string',
            'surface' => 'required|numeric',
            'persQuantity' => 'required|numeric',
            'roomQuantity' => 'required|numeric',
            'city_gps_lat' => 'required|numeric|exists:cities,gps_lat',
            'city_gps_lng' => 'required|numeric|exists:cities,gps_lng',
            'name_room' => 'required|string|max:191',
            'description_room' => 'required|string|max:500',
            'event' => 'required',
            'is_dancing' => 'required|string',
            'is_seat' => 'required|string',
            'is_stand' => 'required|string',
            'surface_room' => 'required|numeric',
            'min_capacity_stand' => 'required|numeric',
            'max_capacity_stand' => 'required|numeric',
            'min_capacity_seat' => 'required|numeric',
            'max_capacity_seat' => 'required|numeric',
            'photos' => 'required|max:2048'

        ]);

        /*upload pictures*/
        if($request->hasFile('photos')){
             
            $allowedfileExtension=['jpg','jpeg','png'];
            $files = $request->file('photos');

                foreach($files as $file){
                 
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);
                     
                    //dd($check);
                  
                if($check){
                    $places = Place::create([
                        'name' => $request->input('name'),
                        'slug' => str_slug($request->input('name')),
                        'address' => $request->input('address'),
                        'description' => $request->input('description'),
                        'is_privatized' => $request->input('is_privatized'),
                        'surface' => $request->input('surface'),
                        'city_id' => $request->input('city'),
                        'persQuantity' => $request->input('persQuantity'),
                        'roomQuantity' => $request->input('roomQuantity'),
                        'typeplace_id' => $request->input('typeplace'),
                        'gps_lat' => $request->input('city_gps_lat'),
                        'gps_lng' => $request->input('city_gps_lng'),
                    ]);

                    //get all pictures
                    foreach ($request->photos as $photo) {
                     
                        /*$filename = $photo->store('/photos/'.$filename);*/
                        $filename = $photo->store('places', 'public');
                         
                        Picturesplace::create([
                         
                        'place_id' => $places->id,
                        'picture_url' => $filename
                         
                        ]);
                    }

                    //create only one room per place
                    $rooms =  Room::create([

                        'slug' => str_slug($request->input('name_room')),
                        'name' => $request->input('name_room'),
                        'description' => $request->input('description_room'),
                        'is_dancing' => $request->input('is_dancing'),
                        'place_id' => $places->id,
                        'is_seat' => $request->input('is_seat'),
                        'is_stand' => $request->input('is_stand'),
                        'surface' => $request->input('surface_room'),
                        'min_capacity_stand' => $request->input('min_capacity_stand'),
                        'max_capacity_stand' => $request->input('max_capacity_stand'),
                        'min_capacity_seat' => $request->input('min_capacity_seat'),
                        'max_capacity_seat' => $request->input('max_capacity_seat'),
                    ]);
                 
                    foreach ($_POST['event'] as $event=>$value) {
                        
                        Eventsroom::create([
                            'room_id' => $rooms->id,
                            'event_id' => $value
                        ]);
                    }

                echo "téléchargement réussi.";
                 
                }
                 
                else
                 
                {
                 
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Désolé! Les formats d\'images doivent être en png ou jpg/jpeg </div>';
                }

            }
            
        }

        return redirect()->route('admin.places.create')
            ->with('success', 'Vous avez bien rajouté un nouveau lieu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(place $place)
    {
        $events = Event::all()->sortBy('name');
        $typeplaces = Typeplace::all()->sortBy('name');
        $cities = City::all();
        $place = Place::all();
        $rooms = Room::all();

        return view('admin/places/edit', [
            'events' => $events,
            'typeplaces' => $typeplaces,
            'cities' => $cities,
            'place' => $place,
            'rooms' => $rooms,
        ]);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $place->delete();

        return redirect()->route('admin.places.index')
        ->with('success', 'Le lieu a bien été supprimé.');
    }

}
