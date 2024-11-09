<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('http.user.login');
    }

    public function postLogin(Request $request)
    {

        $remember = $request->has('remember');

        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $remember)) {

            return redirect()
                ->route('user.index')
                ->with('success', 'You are Logged in successfully.');
        } else {
            return back()->with('error', 'Whoops! invalid email and password.');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.login');
    }
}
