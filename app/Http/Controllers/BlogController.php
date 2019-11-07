<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
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

        #1st way to filter
        /*$posts = Post::latestFirst()
            ->published()
            ->where('category_id', $id)
            ->Paginate(4);*/
        #2nd way to filter
        /*$posts = Category::find($id)->posts()
                ->with('author')
                ->latestFirst()
                ->published()
                ->paginate(4);*/

        #3rd way to filter with category slug
        $posts = $category->posts()
                ->with('author')
                ->latestFirst()
                ->published()
                ->paginate(4);

        return view('blog.index', compact('posts'));

    }

    public function author($id)
    {
       /* $posts = Post::latestFirst()->published()->where('author_id', $id)->paginate(4);*/
        $posts = User::findOrFail($id)->posts()->lastFirst()->published()->paginate(4);
        return view('blog.index', compact('posts'));
    }
}
