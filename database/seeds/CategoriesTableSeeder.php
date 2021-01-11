<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the table
        DB::table('categories')->truncate();

        // insert 5 dummy data to categories table
        DB::table('categories')->insert([
            [
                'title' => 'Web design',
                'slug'  => 'web-design'
            ],
            [
                'title' => 'Web development',
                'slug'  => 'web-development'
            ],
            [
                'title' => 'Programming',
                'slug'  => 'programming'
            ],
            [
                'title' => 'Data Science',
                'slug'  => 'data-science'
            ],
            [
                'title' => 'Mobile App',
                'slug'  => 'mobile-app'
            ]
        ]);
    }
}
