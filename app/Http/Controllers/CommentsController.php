<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Auth;
use Validator;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();

        return redirect('/');
    }

    public function delete(Request $request)
    {
        // $comment = Comment::find($request->comment_id);
        $comment = Comment::where('id', $request->comment_id)->first();
        $comment->delete();

        return redirect('/');
    }
}
