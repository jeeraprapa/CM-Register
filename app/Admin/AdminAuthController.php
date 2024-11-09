<?php

namespace App\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {

        $remember = $request->has('remember');

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::guard('admin')->attempt($credentials,$remember)) {

            return redirect()->route('admin.dashboard')->with('success','You are Logged in successfully.');
        }else {
            return back()->with('error','Whoops! invalid email and password.');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

}
