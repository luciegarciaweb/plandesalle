<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeplacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create type of places
        DB::table('typeplaces')->insert([
        	'name' => 'Mairie',
            'slug' => 'Mairie'
        ]);

        DB::table('typeplaces')->insert([
        	'name' => 'Château',
            'slug' => 'Château'
        ]);

        DB::table('typeplaces')->insert([
        	'name' => 'Manoir',
            'slug' => 'Manoir'
        ]);

        DB::table('typeplaces')->insert([
        	'name' => 'Salle des fetes',
            'slug' => 'Salle des fetes'
        ]);

        DB::table('typeplaces')->insert([
        	'name' => 'Salle de séminaires',
            'slug' => 'Salle de séminaires'
        ]);

      	DB::table('typeplaces')->insert([
        	'name' => 'Salle de mariages',
            'slug' => 'Salle de mariages'
        ]);

       	DB::table('typeplaces')->insert([
    		'name' => 'Salle de conférences',
            'slug' => 'Salle de conférences'
        ]);

    	DB::table('typeplaces')->insert([
    		'name' => 'Salle de réceptions',
            'slug' => 'Salle de réceptions'
        ]);

     	DB::table('typeplaces')->insert([
    		'name' => 'Restaurant',
            'slug' => 'Restaurant'
        ]);

        DB::table('typeplaces')->insert([
    		'name' => 'Hôtel',
            'slug' => 'Hôtel'
        ]);

        DB::table('typeplaces')->insert([
    		'name' => 'Lieu atypique',
            'slug' => 'Lieu atypique'
        ]);

        DB::table('typeplaces')->insert([
    		'name' => 'Péniche',
            'slug' => 'Péniche'
        ]);

        DB::table('typeplaces')->insert([
    		'name' => 'Demeure de caractère',
            'slug' => 'Demeure de caractère'
        ]);

        DB::table('typeplaces')->insert([
    		'name' => 'Villa',
            'slug' => 'Villa'
        ]);

        DB::table('typeplaces')->insert([
   		 	'name' => 'Chambre d\'hôte',
            'slug' => 'Chambre d\'hôte'
        ]);

        DB::table('typeplaces')->insert([
  		  	'name' => 'Ferme',
            'slug' => 'Ferme'
        ]);

        DB::table('typeplaces')->insert([
    		'name' => 'Loft',
            'slug' => 'Loft'
        ]);

        DB::table('typeplaces')->insert([
    		'name' => 'Village vacances',
            'slug' => 'Village vacances'
        ]);
	    
	    DB::table('typeplaces')->insert([
			'name' => 'Gîte',
            'slug' => 'Gîte'
        ]);
    }
}
