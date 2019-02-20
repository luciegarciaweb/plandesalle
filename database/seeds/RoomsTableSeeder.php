<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create fake rooms for development
        DB::table('rooms')->insert([
            'slug' => str_slug('salle louis'),
            'name' => 'Salle reception',
            'place_id' =>'1',
            'price_id' =>'25',
            'description' => 'grande',
            'is_dancing' => '0',
            'is_seat' => '1',
            'is_stand' => '1',
            'max_capacity_stand' => '200',
            'min_capacity_stand' => '50',
            'max_capacity_seat' => '150',
            'min_capacity_seat' => '50',
            'surface' => '400'
        ]);

        DB::table('rooms')->insert([
        	'slug' => str_slug('salle de restaurant'),
        	'name' => 'Salle de restaurant',
            'place_id' =>'2',
            'price_id' =>'25',
        	'description' => 'grande',
        	'is_dancing' => '0',
        	'is_seat' => '1',
        	'is_stand' => '1',
        	'max_capacity_stand' => '200',
        	'min_capacity_stand' => '50',
        	'max_capacity_seat' => '150',
            'min_capacity_seat' => '50',
	    	'surface' => '400'
        ]);

        DB::table('rooms')->insert([
            'slug' => str_slug('Lounge'),
            'name' => 'Lounge',
            'place_id' =>'3',
            'price_id' =>'25',
            'description' => 'grande',
            'is_dancing' => '0',
            'is_seat' => '1',
            'is_stand' => '1',
            'max_capacity_stand' => '200',
            'min_capacity_stand' => '50',
            'max_capacity_seat' => '150',
            'min_capacity_seat' => '50',
            'surface' => '400'
        ]);

        DB::table('rooms')->insert([
            'slug' => str_slug('salle des fetes'),
            'name' => 'Salle des fetes',
            'place_id' =>'4',
            'price_id' =>'25',
            'description' => 'grande',
            'is_dancing' => '0',
            'is_seat' => '1',
            'is_stand' => '1',
            'max_capacity_stand' => '200',
            'min_capacity_stand' => '50',
            'max_capacity_seat' => '150',
            'min_capacity_seat' => '50',
            'surface' => '400'
        ]);

        DB::table('rooms')->insert([
            'slug' => str_slug('salle Coll'),
            'name' => 'Salle Coll',
            'place_id' =>'5',
            'price_id' =>'25',
            'description' => 'grande',
            'is_dancing' => '0',
            'is_seat' => '1',
            'is_stand' => '1',
            'max_capacity_stand' => '200',
            'min_capacity_stand' => '50',
            'max_capacity_seat' => '150',
            'min_capacity_seat' => '50',
            'surface' => '400'
        ]);

        
        DB::table('rooms')->insert([
            'slug' => str_slug('salon bleu'),
            'name' => 'Salon bleu',
            'place_id' =>'6',
            'price_id' =>'25',
            'description' => 'grande',
            'is_dancing' => '0',
            'is_seat' => '1',
            'is_stand' => '1',
            'max_capacity_stand' => '200',
            'min_capacity_stand' => '50',
            'max_capacity_seat' => '150',
            'min_capacity_seat' => '50',
            'surface' => '400'
        ]);

        DB::table('rooms')->insert([
            'slug' => str_slug('salle George'),
            'name' => 'Salle George',
            'place_id' =>'7',
            'price_id' =>'1250',
            'description' => 'grande',
            'is_dancing' => '0',
            'is_seat' => '1',
            'is_stand' => '1',
            'max_capacity_stand' => '200',
            'min_capacity_stand' => '50',
            'max_capacity_seat' => '150',
            'min_capacity_seat' => '50',
            'surface' => '400'
        ]);

        DB::table('rooms')->insert([
            'slug' => str_slug('salle professionnel'),
            'name' => 'Salle professionnel',
            'place_id' =>'8',
            'price_id' =>'25',
            'description' => 'grande',
            'is_dancing' => '0',
            'is_seat' => '1',
            'is_stand' => '1',
            'max_capacity_stand' => '200',
            'min_capacity_stand' => '50',
            'max_capacity_seat' => '150',
            'min_capacity_seat' => '50',
            'surface' => '400'
        ]);

        DB::table('rooms')->insert([
            'slug' => str_slug('salle des congres'),
            'name' => 'Salle des congres',
            'place_id' =>'9',
            'price_id' =>'25',
            'description' => 'grande',
            'is_dancing' => '0',
            'is_seat' => '1',
            'is_stand' => '1',
            'max_capacity_stand' => '200',
            'min_capacity_stand' => '50',
            'max_capacity_seat' => '150',
            'min_capacity_seat' => '50',
            'surface' => '400'
        ]);

        DB::table('rooms')->insert([
            'slug' => str_slug('salle lyonnaise'),
            'name' => 'Salle lyonnaise',
            'place_id' =>'10',
            'price_id' =>'25',
            'description' => 'grande',
            'is_dancing' => '0',
            'is_seat' => '1',
            'is_stand' => '1',
            'max_capacity_stand' => '200',
            'min_capacity_stand' => '50',
            'max_capacity_seat' => '150',
            'min_capacity_seat' => '50',
            'surface' => '400'
        ]);
    }
}
