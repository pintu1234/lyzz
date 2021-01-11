<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $rules = [
            'author_name'   => 'required',
            'author_email'  => 'required|email',
            'body'          => 'required'
        ];
        $message = [
            'body.required' => "Comment body can't be empty"
        ];

        $this->validate($request, $rules, $message);

        $input = $request->all();
        $input['post_id'] = $post->id;

        $comment = Comment::create($input);

        return redirect()->back()->with('create_message', 'Your comment added');
    }
}
