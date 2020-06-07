<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    // public function dashboard()
    // {
    //     return \view('user.user_dashboard');
    // }
        public function updateuser(Request $request,$id){
           // (\request()->merge(['pass'=> \Hash::make('1234567890') ]));
           //\request()->except('_token');
            
           $user= User::whereId($id)->update(\request()->except('_token'));
           return back()->with('success', 'User Updated Successfuly ');
          
          }
}
