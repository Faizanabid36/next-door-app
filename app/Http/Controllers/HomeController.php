<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


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
        $users = User::whereNull('is_public_agent')
            ->where('id', '!=', auth()->user()->id)
            ->orderBy('name', 'ASC')->get();
        if (auth()->user()->admin)
            return \view('admin.neighbours.user_list', compact('users'));
        return \view('web.frontend.neighbours.neighbours', compact('users'));
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
        if (auth()->user()->admin)
            return \view('admin.public_agents.user_list', compact('users'));
        return \view('frontend.public_agencies.user_list', compact('users'));
    }

    public function view_profile($id)
    {
        $user = User::whereId($id)->with('family_members')->firstOrFail();
        return \view('web.frontend.neighbours.view_profile', compact('user'));
//        return \view('frontend.account.view_profile' , compact('profile'));
    }

    public function read_notifications(Request $request)
    {
        $notification = auth()->user()->notifications()->where('id', $request->notification_id)->first();
        $notification->markAsRead();
        return ['url' => $notification->data['url']];
    }


}
