<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PublicAgentController extends Controller
{
    public function agent()
    {
        if(!auth()->user()->admin)
            return back();
        return view('admin.public_agents.create_user');
    }

    public function createagent(Request $request)
    {
        if($request['gender']==0)
        {
            \request()->merge(['avatar'=>'theme\app-assets\images\portrait\small\avatar-s-25.jpg']);
        }
        else{
            \request()->merge(['avatar'=>'theme\app-assets\images\portrait\small\avatar-s-26.jpg']);
        }


            if ($request->isMethod('post')) {
                request()->merge(['password'=>Hash::make(\request('password'))]);
                User::create(\request()->except('_token'));
                return back()->with('success','Created Successfully');
            }
            // // $details = Category::where(['parent_id'=>0])->get();
            // return view('admin.product.category.add_category' , \compact('details'));

    }



}
