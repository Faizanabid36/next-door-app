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
        return view('admin.main_dashboard');
    }
    public function login_page()
    {
        return view('auth.login');
    }

    public function add_cat()
    {
        return \view('admin.category.add');
    }
    public function view_cat()
    {
        return \view('admin.category.view');
    }
}
