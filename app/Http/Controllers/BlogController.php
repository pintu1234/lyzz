<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        #composerServiceProvider load here...

        $posts = Post::latestFirst()
                ->published()
                ->Paginate(4);

        return view('blog.index', compact('posts'));
    }

    public function show($id)
    {
        #composerServiceProvider load here...

        $post = Post::published()->findOrFail($id);
        return view('blog.show', compact('post'));
    }

    //...Filtering posts by category
    public function category(Category $category)
    {
        #composerServiceProvider load here...

        /*$posts = Post::latestFirst()
            ->published()
            ->where('category_id', $id)
            ->Paginate(4);*/

        $posts = $category->posts()
                ->with('author')
                ->latestFirst()
                ->published()
                ->paginate(4);

        return view('blog.index', compact('posts'));

    }
}
