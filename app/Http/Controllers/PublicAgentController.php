<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateAgent;
use App\User;
use Illuminate\Support\Facades\Hash;

class PublicAgentController extends Controller
{


    public function agent()
    {
        if(!auth()->user()->admin)
            return back();
        return view('admin.public_agents.create_user');
    }

    public function createagent(ValidateAgent $request)
    {
        $request->merge(['is_public_agent' => 1, 'avatar' => 'theme\app-assets\images\portrait\small\avatar-s-25.jpg']);
        if ($request->isMethod('post')) {
            $request->merge(['password' => Hash::make($request->get('password'))]);
            User::create($request->except('_token'));
            return back()->with('success', 'Created Successfully');
        }
    }

    public function agencies()
    {
        $users = User::userList(auth()->user(), 'agents')->get();
        if (auth()->user()->admin)
            return \view('admin.public_agents.user_list', compact('users'));
        return \view('web.frontend.public_agencies.list', compact('users'));
    }

    public function feed()
    {
        return \view('web.frontend.public_agencies.feed');
    }

}
