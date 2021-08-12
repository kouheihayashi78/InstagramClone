<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        // テンプレート「post/index.blade.php」を表示します。
        return view('post/index');
    }

    public function show($user_id)
    {
        $user = User::where('id', $user_id)->first();
        return view('user/show', compact('user'));
    }

}
