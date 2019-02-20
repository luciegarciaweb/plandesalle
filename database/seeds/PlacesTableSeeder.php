<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create fake places for development
    	DB::table('places')->insert([
            'slug' => str_slug('Hotel Richelieu Toulouse'),
            'name' => 'Hotel Richelieu',
            'typeplace_id' =>'6',
            'description' => 'salle des reception',
            'address' => '6 rue de Figeac',
            'city_id' => '12067',
            'surface' => '600',
            'roomQuantity' => '1',
            'persQuantity' => '120',
            'is_validated' => '1',
            'gps_lat' => '43.62419',
            'gps_lng' => '1.44024'
        ]);

        DB::table('places')->insert([
            'slug' => str_slug('Restaurant Later Toulouse'),
            'name' => 'Restaurant Later',
            'typeplace_id' =>'4',
            'description' => 'Restaurant',
            'address' => '140 rue de rabastenc',
            'city_id' => '12067',
            'surface' => '300',
            'roomQuantity' => '1',
            'persQuantity' => '500',
            'is_validated' => '1',
            'gps_lat' => '43.62180',
            'gps_lng' => '1.47599'
        ]);

        DB::table('places')->insert([
            'slug' => str_slug('Bar le Challenge Toulouse'),
            'name' => 'Bar le Challenge',
            'typeplace_id' =>'10',
            'description' => 'bar',
            'address' => '60 rue Dinetard',
            'city_id' => '12067',
            'surface' => '300',
            'roomQuantity' => '1',
            'persQuantity' => '500',
            'is_validated' => '1',
            'gps_lat' => '43.61460',
            'gps_lng' => '1.47764'
        ]);

        DB::table('places')->insert([
        	'slug' => str_slug('Mairie Capitolium Toulouse'),
        	'name' => 'Mairie Capitolium',
            'typeplace_id' =>'1',
        	'description' => 'salle des fetes',
        	'address' => '20 place capitolium',
            'city_id' => '12067',
	    	'surface' => '300',
	        'roomQuantity' => '1',
            'persQuantity' => '500',
            'is_validated' => '1',
	        'gps_lat' => '43.60462560000000',
	        'gps_lng' => '1.44420500000000'
        ]);

        DB::table('places')->insert([
            'slug' => str_slug('Spectacle Coll Toulouse'),
            'name' => 'Spectacle Coll',
            'typeplace_id' =>'1',
            'description' => 'salle de spectacle',
            'address' => '20 rue adolphe coll',
            'city_id' => '12067',
            'surface' => '300',
            'roomQuantity' => '1',
            'persQuantity' => '500',
            'is_validated' => '1',
            'gps_lat' => '43.59805',
            'gps_lng' => '1.42485'
        ]);

        DB::table('places')->insert([
            'slug' => str_slug('Salon detente Toulouse'),
            'name' => 'Salon detente',
            'typeplace_id' =>'1',
            'description' => 'salon',
            'address' => 'rue reclusane',
            'city_id' => '12067',
            'surface' => '300',
            'roomQuantity' => '1',
            'persQuantity' => '500',
            'is_validated' => '1',
            'gps_lat' => '43.59970',
            'gps_lng' => '1.43333'
        ]);

        DB::table('places')->insert([
            'slug' => str_slug('Convention regionale Toulouse'),
            'name' => 'Convention regionale',
            'typeplace_id' =>'1',
            'description' => 'Convention',
            'address' => '4 rue lejeune',
            'city_id' => '12067',
            'surface' => '300',
            'roomQuantity' => '1',
            'persQuantity' => '500',
            'is_validated' => '1',
            'gps_lat' => ' 43.60773',
            'gps_lng' => '1.43384'
        ]);

        DB::table('places')->insert([
            'slug' => str_slug('Mairie de Paris Paris'),
            'name' => 'Mairie de Paris',
            'typeplace_id' =>'1',
            'description' => 'lieu de seminaire ',
            'address' => '5 rue dela',
            'city_id' => '29900',
            'surface' => '500',
            'roomQuantity' => '1',
            'persQuantity' => '1500',
            'is_validated' => '0',
            'gps_lat' => '48.866667',
            'gps_lng' => '2.333333'
        ]);

        DB::table('places')->insert([
            'slug' => str_slug('Salle des Metiers Bessancourt'),
            'name' => 'Salle des Metiers Bessancourt',
            'typeplace_id' =>'1',
            'description' => 'lieu de seminaire ',
            'address' => '5 rue dela',
            'city_id' => '95550',
            'surface' => '500',
            'roomQuantity' => '1',
            'persQuantity' => '1500',
            'is_validated' => '0',
            'gps_lat' => '49.04060627118643',
            'gps_lng' => '2.20444966101695'
        ]);

        DB::table('places')->insert([
            'slug' => str_slug('Mairie de Lyon Lyon'),
            'name' => 'Mairie de Lyon',
            'typeplace_id' =>'5',
            'description' => 'lieu de seminaire ',
            'address' => '5 rue dela',
            'city_id' => '27679',
            'surface' => '500',
            'roomQuantity' => '1',
            'persQuantity' => '1500',
            'is_validated' => '0',
            'gps_lat' => '45.77129180000000',
            'gps_lng' => '4.82808310000000'
        ]);
    
	}
}        
	        
 
