<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Auth;
use Illuminate\Http\Request;
use Validator;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::limit(10)->orderBy('created_at', 'DESC')->get();
        // limit(10)は取り出すレコード上限(最大１０個)
        return view('post/index', compact('posts'));
    }

    public function show($user_id)
    {
        $user = User::where('id', $user_id)->first();
        return view('user/show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user/edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string|min:6|confirmed',
        ]);
        // バリデーションの結果がエラーの場合
        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $user = User::find($request->id);
        $user->name = $request->user_name;
        if ($request->user_profile_photo != null) {
            $request->user_profile_photo->storeAs('public/user_images', $user->id . '.jpg');
            $user->profile_photo = $user->id . '.jpg';
        }
        $user->password = bcrypt($request->user_password);
        $user->save();

        return redirect('/users/' . $request->id);
    }

    public function new()
    {
        return view('post/new');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|max:255',
            'photo' => 'required'
        ]);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $post = new Post;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->save();

        $request->photo->storeAs('public/post_images', $post->id.'.jpg');

        return redirect('/');
    }
}
