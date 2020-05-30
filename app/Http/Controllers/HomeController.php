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
    public function index()
    {
        return view('user.user_dashboard');
    }

    public function list()
    {
        // $users = User::paginate(5)->all();
        $users = DB::table('users')->paginate(4);

        return \view('dashboard.user_list' , \compact('users'));
    }

    public function delete_user($id)
    {
        User::where(['id'=>$id])->delete();
        return redirect()->back();
    }


}
