<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteViewsController extends Controller
{
    //
    public function user_dashboard()
    {
        return view('user.user_dashboard');
    }
    public function main_dashboard()
    {
        if(!auth()->user()->admin)
            return back();
        return view('dashboard.main_dashboard');
    }
    public function login_page()
    {
        return view('auth.login');
    }
}
