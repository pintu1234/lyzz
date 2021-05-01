<?php

use Faker\Factory;
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
        $faker = Factory::create();
        DB::table('users')->insert([
            [
                'name' => 'Tahmid Nishat',
                'email'=> 'tahmid.ni7@gmail.com',
                'password'=> bcrypt('secret'),
                'bio' => $faker->text(rand(250,310))
            ],
            [
                'name' => 'Izaz Mahmud',
                'email'=> 'izaz@gmail.com',
                'password'=> bcrypt('secret'),
                'bio' => $faker->text(rand(250,310))
            ],
            [
                'name' => 'Abid Mahmud',
                'email'=> 'abid@gmail.com',
                'password'=> bcrypt('secret'),
                'bio' => $faker->text(rand(250,310))
            ],
        ]);
    }
}
