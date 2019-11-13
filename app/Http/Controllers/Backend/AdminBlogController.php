<?php

namespace App\Http\Controllers\Backend;
use Intervention\Image\ImageManagerStatic as Image;
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
        $posts = Post::with('author', 'category')->latest()->paginate(12);
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
            /*$file->move('img', $name);*/
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(500, 270);
            $image_resize->save(public_path('img/' .$name));
            $input['image'] = $name;
        }
        $request->user()->posts()->create($input);
        return redirect('admin/blogs')
            ->with('create_message' , 'Your post is created successfully');
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
        $post = Post::findOrFail($id);
        return view('admin.blog.edit', compact('post'));
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
        $rules = [
            'title' => 'required',
            'slug'  => 'required',
            'excerpt'=> 'required',
            'body' => 'required',
            'published_at' => 'date_format:Y-m-d H:i:s',
            'category_id' => 'required',
            'image' => 'image|max:1000'
        ];
        $message = [
            'category_id.required'      => 'Select a category for the post',
            'published_at.date_format'  => 'Published date must be followed by date format',
            'image.image'               => 'Image must be in (jpeg, png, bmp, gif, or svg) format',
        ];
        $this->validate($request, $rules, $message);

        $input = $request->all();

        if($file = $request->file('image'))
        {
            $name = time().$file->getClientOriginalName();
            /*$file->move('img', $name);*/
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(500, 270);
            $image_resize->save(public_path('img/' .$name));
            $input['image'] = $name;
        }
        $post = Post::findOrFail($id);
        $post->update($input);
        return redirect('admin/blogs')
            ->with('update_message' , 'Your post is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return redirect()->back()->with('trash_message', ['message', $id]);
    }
    public function forceDelete($id)
    {
        $trash = Post::withTrashed()->findOrFail($id);
        if($trash->image !== '')
        {
            unlink(public_path().'/img/'.$trash->image);
        }
        $trash->forceDelete();

        return redirect()->back()
            ->with('delete_message', 'Your post is permanently deleted !');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back()->with('restore_message', 'You post has been restored.');
    }

    /*
     * All trash posts
     */
    public function all_trash()
    {
        $trashes = Post::onlyTrashed()->paginate(10);
        $trashCount = Post::onlyTrashed()->count();
        return view('admin.blog.trash', compact('trashes', 'trashCount'));
    }


    /*
         * All published posts
         */
    public function publish_posts()
    {   $posts = Post::published()->paginate(10);
        $postsCount = Post::published()->count();
        return view('admin.blog.index', compact('posts', 'postsCount'));
    }
    /*
     * All scheduled posts
     */
    public function schedule_posts()
    {   $posts = Post::scheduled()->paginate(10);
        $postsCount = Post::scheduled()->count();
        return view('admin.blog.index', compact('posts', 'postsCount'));
    }
    /*
     * All drafted posts
     */
    public function draft_posts()
    {   $posts = Post::drafted()->paginate(10);
        $postsCount = Post::drafted()->count();
        return view('admin.blog.index', compact('posts', 'postsCount'));
    }
}
