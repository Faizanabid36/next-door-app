<?php

namespace App\Http\Controllers;
use app\User;

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
        if (!isset(auth()->user()->id))
            return view('auth.login');
        else {
            if (auth()->user()->admin)
                return view('admin.main_dashboard');
            else
                return view('user.user_dashboard');
        }
    }

    public function add_cat()
    {
        if(!auth()->user()->admin)
            return back();
        return \view('admin.category.add');
    }
    public function view_cat()
    {
        if(!auth()->user()->admin)
            return back();
        return \view('admin.category.view');
    }

    public function account()
    {
        // $users= User::where('id',auth()->user()->id)->first();
        // $user=auth()->user()->with('family_members');
        $user= User::with(['family_members','user_extra'])->get();
       return $user;

        return \view('frontend.account.account',compact('user'));
    }
}
