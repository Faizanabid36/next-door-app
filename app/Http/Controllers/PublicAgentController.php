<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicAgentController extends Controller
{
    public function createagent()
    {
        return view('admin.public_agents.create_user');
    }
}
