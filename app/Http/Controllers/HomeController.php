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

    public function neighbours_list()
    {
        $users = User::whereNull('is_public_agent')->orderBy('name','ASC')->get();
        if(auth()->user()->admin)
            return \view('admin.neighbours.user_list' , compact('users'));
        return \view('frontend.neighbours.user_list' , compact('users'));
    }

    public function delete_user()
    {
        $ids=\request('ids');
        foreach($ids as $id)
        {
            $user = User::find($id);
            $user->delete();
        }
        return ['status'=>'deleted'];
    }

    public function public_agencies()
    {
        return view('frontend.public_agencies.view');
    }

    public function agents_list()
    {
        $users = User::whereNotNull('is_public_agent')->get();
        if(auth()->user()->admin)
            return \view('admin.public_agents.user_list' , compact('users'));
        return \view('frontend.public_agencies.user_list' , compact('users'));
    }
    public function view_profile($id)
    {
        $profile = User::whereId($id)->with('family_members')->first();
        return \view('frontend.account.view_profile' , compact('profile'));
    }


}
