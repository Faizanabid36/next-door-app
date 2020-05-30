<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function list()
    {
        $users = User::paginate(5)->get();
        dd($users);
        return \view('dashboard.user_list' , \compact('users'));
    }

    public function delete_user($id)
    {
        User::where(['id'=>$id])->delete();
        return redirect()->back();
    }


}
