<?php


use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the table
        DB::table('posts')->truncate();

        // generate 10 dummy posts data
        $posts = [];
        $faker = Factory::create();
        $date = Carbon::create(2019,10, 23, 6,0,0);

        for($i = 1; $i <=20; $i++)
        {
            $image = "Post_Image_". rand(1,5).".jpg";
            $date->addDays(1);
            $publishedDate = clone($date);

            $posts[]= [
                'author_id' => rand(1,3),
                'title'=> $faker->sentence(rand(8,12)),
                'excerpt'=> $faker->text(rand(250,300)),
                'body'=> $faker->paragraphs(rand(10,15), true),
                'slug'=>$faker->slug,
                'image'=>rand(0,1)==1? $image : NULL,
                'created_at'=>clone($date),
                'updated_at'=>clone($date),
                'category_id'=> rand(1,5),
                'published_at'=> $i > 5 && rand(0,1)== 0 ? NULL : $publishedDate->addDays($i+4)

            ];
        }
        DB::table('posts')->insert($posts);
    }
}
