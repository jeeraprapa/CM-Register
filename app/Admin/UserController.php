<?php

namespace App\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.list',compact('users'));
    }

    public function add()
    {
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required',
            'location' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = new User();
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        if($request->hasFile('avatar')){
            $user->addMedia($request->file('avatar'))->toMediaCollection('avatar');
        }

        return redirect()->route('admin.user.list');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required',
            'location' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user->fill($request->all());

        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        if($request->hasFile('avatar')){
            $user->clearMediaCollection('avatar');
            $user->addMedia($request->file('avatar'))->toMediaCollection('avatar');
        }

        return redirect()->route('admin.user.list');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.list');
    }
}
