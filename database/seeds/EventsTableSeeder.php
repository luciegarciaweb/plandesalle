<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //create multi events
        DB::table('events')->insert([
            'name' => 'Mariage',
            'slug' => 'Mariage'
        ]);

        DB::table('events')->insert([
            'name' => 'Conférence',
            'slug' => 'Conférence'
        ]);

        DB::table('events')->insert([
            'name' => 'Séminaire',
            'slug' => 'Séminaire' 
        ]);

        DB::table('events')->insert([
            'name' => 'Spectacle',
            'slug' => 'Spectacle'
        ]);

        DB::table('events')->insert([
            'name' => 'Réunion',
            'slug' => 'Réunion'
        ]);

        DB::table('events')->insert([
            'name' => 'Anniversaire',
            'slug' => 'Anniversaire'
        ]);

        DB::table('events')->insert([
            'name' => 'Fête',
            'slug' => 'Fête'
        ]);

        DB::table('events')->insert([
            'name' => 'Formation',
            'slug' => 'Formation'
        ]);
        
    }
}
