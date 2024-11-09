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
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required',
            'location' => 'required',
        ]);

        $user = new User();
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

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
            'email' => 'required|email',
            'phone' => 'required',
            'location' => 'required',
        ]);

        $user->fill($request->all());

        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('admin.user.list');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.list');
    }
}
