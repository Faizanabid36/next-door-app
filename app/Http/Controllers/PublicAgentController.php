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
                $cat = new User;
                $cat->name = $data['name'];
                $cat->email = $data['email'];
                $cat->password = $data['password'];
                $cat->gender = $data['gender'];
                $cat->address = $data['address'];
                $cat->postal = $data['postal'];
                $cat->contact = $data['contact'];
                $cat->postal = $data['postal'];
                $cat->is_public_agent = 1;
                $cat->avatar =$data['avatar'];
                $cat->save();
                return redirect()->back();
            }
            // // $details = Category::where(['parent_id'=>0])->get();
            // return view('admin.product.category.add_category' , \compact('details'));
        
    }

    
    
}
