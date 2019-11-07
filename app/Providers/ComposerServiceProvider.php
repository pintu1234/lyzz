<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        #...load categories
        view()->composer('layouts.sidebar', function ($view){
            $categories = Category::with(['posts'=>function($ctg){
                $ctg->published();
            }])->orderBy('title', 'asc')->get();

            return $view->with('categories', $categories);
        });

        #...popular posts
        view()->composer('layouts.sidebar', function ($view){
            $popularPosts = Post::published()->popular()->take(4)->get();

            return $view->with('popularPosts', $popularPosts);
        });
    }
}
