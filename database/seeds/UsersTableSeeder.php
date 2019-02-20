<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //fake admin account for development
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_admin' => true
        ]);

        //fake client account for development
        DB::table('users')->insert([
            'email' => 'client@client.com',
            'password' => bcrypt('client'),
            'is_admin' => false,
        ]);

    }
}
