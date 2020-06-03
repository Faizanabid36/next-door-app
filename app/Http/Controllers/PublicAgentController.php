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
            $request['avatar']=('theme\app-assets\images\portrait\small\avatar-s-25.jpg');
        }
        else{
            $request['avatar']=('theme\app-assets\images\portrait\small\avatar-s-26.jpg');
        }
        
        
            if ($request->isMethod('post')) {
    
                $data = $request->all();
                $u = new User;
                $u->name = $data['name'];
                $u->email = $data['email'];
                $u->password = Hash::make( $data['password']);
                $u->gender = $data['gender'];
                $u->address = $data['address'];
                $u->postal = $data['postal'];
                $u->contact = $data['contact'];
                $u->is_public_agent = 1;
                $u->avatar =$data['avatar'];
                $u->save();
                return redirect()->back();
            }
            // // $details = Category::where(['parent_id'=>0])->get();
            // return view('admin.product.category.add_category' , \compact('details'));
        
    }

    
    
}
