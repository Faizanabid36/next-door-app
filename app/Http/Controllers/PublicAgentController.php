<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicAgentController extends Controller
{
    public function createagent()
    {
        if(!auth()->user()->admin)
            return back();
        return view('admin.public_agents.create_user');
    }
}
