<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('register_users')->insert([
            'name' => 'sithu',
            'email' => 'sithu.stdean@gmail.com',
            'password' => Hash::make('sithudean'),
        ]);
    }
}
