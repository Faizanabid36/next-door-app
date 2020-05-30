<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;


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

    public function list()
    {
        // $users = User::paginate(5)->all();
        $users = User::paginate(2);
//        dd($users);

        return \view('dashboard.user_list' , \compact('users'));
    }

    public function delete_user($id)
    {
        User::find($id)->delete();
        return back()->with('deleted','User Deleted');
    }


}
