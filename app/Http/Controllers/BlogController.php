<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        #composerServiceProvider load here...

        $posts = Post::with('author', 'category', 'tags', 'comments')
                ->latestFirst()
                ->published()
                ->search(request('term'))
                ->Paginate(4);

        return view('users.blog.index', compact('posts'));
    }
    public function blogs()
    {
        #composerServiceProvider load here...

        $posts = Post::with('author', 'category', 'tags', 'comments')
                ->latestFirst()
                ->published()
                ->search(request('term'))
                ->get();

        return view('users.blog.list', compact('posts'));
    }

    public function food()
    {
        return view('users.blog.food');
    }
    public function life()
    {
        return view('users.blog.life');
    }
    public function love()
    {
        return view('users.blog.love');
    }
    public function travel()
    {
        return view('users.blog.travel');
    }
    public function wellness()
    {
        return view('users.blog.wellness');
    }
    public function silverlinings()
    {
        return view('users.blog.silverlinings');
    }

    public function contactUs()
    {
        #composerServiceProvider load here...

        $posts = Post::with('author', 'category', 'tags', 'comments')
                ->latestFirst()
                ->published()
                ->search(request('term'))
                ->Paginate(4);

        return view('contact-us', compact('posts'));
    }

    public function show($id)
    {
        #composerServiceProvider load here...

        $post = Post::published()->findOrFail($id);

        $postComments = $post->comments()->latest()->get();

        $post->increment('view_count');
        return view('users.blog.show', compact('post', 'postComments'));
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

        return view('users.blog.index', compact('posts'));

    }

    public function author($id)
    {
        #composerServiceProvider load here...

       /* $posts = Post::latestFirst()->published()->where('author_id', $id)->paginate(4);*/
        $posts = User::findOrFail($id)->posts()->latestFirst()->published()->paginate(4);
        return view('users.blog.index', compact('posts'));
    }

    public function tag(Tag $tag)
    {
        $tagName = $tag->name;
        $posts = $tag->posts()
            ->with('author', 'tags')
            ->latestFirst()
            ->published()
            ->paginate(4);

        return view('users.blog.index', compact('posts', 'tagName'));
    }
}
