<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call([
            UsersTableSeeder::class,
            TypeplacesTableSeeder::class,
            PlacesTableSeeder::class,
            EventsTableSeeder::class,
            RoomsTableSeeder::class,
        ]);

        //externals datas files to add to MySQL
        $path = 'app/developer_docs/regions.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Regions table seeded!');

        $path = 'app/developer_docs/departments.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Departments table seeded!');

        $path = 'app/developer_docs/cities.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Cities table seeded!');
        
    }
}
