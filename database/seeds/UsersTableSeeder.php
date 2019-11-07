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
        // Reset the table
        DB::table('users')->truncate();
        // generate 3 users
        DB::table('users')->insert([
            [
                'name' => 'Tahmid Nishat',
                'email'=> 'tahmid.ni7@gmail.com',
                'password'=> bcrypt('secret')
            ],
            [
                'name' => 'Izaz Mahmud',
                'email'=> 'izaz@gmail.com',
                'password'=> bcrypt('secret')
            ],
            [
                'name' => 'Abid Mahmud',
                'email'=> 'abid@gmail.com',
                'password'=> bcrypt('secret')
            ],
        ]);
    }
}
