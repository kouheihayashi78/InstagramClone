<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

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

    public function edit()
    {
        $user = Auth::user();

        return view('user/edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string|min:6|confirmed',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
        $user = User::find($request->id);
        $user->name = $request->user_name;
        if($request->user_profile_photo !=null)
        {
            $request->user_profile_photo->storeAs('public/user_images', $user->id. '.jpg');
            $user->profile_photo = $user->id. '.jpg';
        }
        $user->password = bcrypt($request->user_password);
        $user->save();
        return redirect('/users/', $request->id);
    }

}
