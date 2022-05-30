<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'manager',
                'email' => '25one@ukr.net',
                'password' => bcrypt('12345678'),
                'role' => 'manager',
                'remember_token' => str_random(10),
            ]
        ); 
    }
}
