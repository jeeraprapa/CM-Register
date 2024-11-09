<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->guard('user')->user();
        return view('http.user.index',compact('user'));
    }
}
