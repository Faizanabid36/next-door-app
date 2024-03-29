<?php

namespace App\Http\Controllers;

use App\Post;
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
        $users = User::userList(auth()->user(), 'neighbours')->get();
        if (auth()->user()->admin)
            return \view('admin.neighbours.user_list', compact('users'));
        return \view('web.frontend.neighbours.neighbours', compact('users'));
    }

    public function delete_user()
    {
        $ids=\request('ids');
        foreach($ids as $id) {
            $user = User::find($id);
            $user->delete();
        }
        return ['status'=>'deleted'];
    }

    public function public_agencies()
    {
        $users = User::userList(auth()->user(), 'agents')->get();
        return view('frontend.public_agencies.view', compact('users'));
    }

    public function agents_list()
    {
        $users = User::userList(auth()->user(),'agents')->get();
        if (auth()->user()->admin)
            return \view('admin.public_agents.user_list', compact('users'));
        return \view('frontend.public_agencies.user_list', compact('users'));
    }

    public function view_profile(Request $request, $id)
    {
        $user = User::whereId($id)->with('family_members')->firstOrFail();
        $posts = Post::latest()->with('user')->whereUserId($user->id)->paginate(10);
        if ($request->ajax()) {
            return postsHTML($posts);
        }
        return \view('web.frontend.neighbours.view_profile', compact('user'));
//        return \view('frontend.account.view_profile' , compact('profile'));
    }

    public function read_notifications(Request $request)
    {
        $notification = auth()->user()->notifications()->where('id', $request->notification_id)->first();
        $notification->markAsRead();
        return ['url' => $notification->data['url']];
    }

    public function check_postal_code($code)
    {
        $address = get_address($code);
        if (isset($address['error']))
            return ['error' => 'Postal Code Does Not Exist'];
        return ['success' => $address];
    }


    public function feed(Request $request)
    {
        if (auth()->user()->admin)
            return redirect()->route('admin-dashboard');


        $posts = Post::sectionPosts('news-feed');
        if ($request->ajax()) {
            return postsHTML($posts);
        }
        return view('web.frontend.home');
    }

}
