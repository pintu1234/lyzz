<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Requests\PostsRequest;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBlogController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('author', 'category')->latestFirst()->paginate(12);
        $postsCount = Post::count();
        return view('admin.blog.index', compact('posts', 'postsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $input = $request->all();

        if($file = $request->file('image'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('img', $name);

            $input['image'] = $name;
        }
        $request->user()->posts()->create($input);
        return redirect('admin/blogs')
            ->with('post_create' , 'Your post is saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
