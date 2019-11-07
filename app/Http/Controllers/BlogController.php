<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::with(['posts'=>function($ctg){
            $ctg->published();
        }])->orderBy('title', 'asc')->get();

        $posts = Post::latestFirst()
                ->published()
                ->Paginate(4);

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show($id)
    {
        $categories = Category::with(['posts'=>function($ctg){
            $ctg->published();
        }])->orderBy('title', 'asc')->get();

        $post = Post::published()->findOrFail($id);
        return view('blog.show', compact('post', 'categories'));
    }

    //...Filtering posts by category
    public function category($id)
    {
        $categories = Category::with(['posts'=>function($ctg){
                $ctg->published();
        }])->orderBy('title', 'asc')->get();

        $posts = Post::latestFirst()
            ->published()
            ->where('category_id', $id)
            ->Paginate(4);

        return view('blog.index', compact('posts', 'categories'));

    }
}
