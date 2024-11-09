<?php

namespace App\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        return view('admin.dashboard',compact('userCount'));
    }
}
