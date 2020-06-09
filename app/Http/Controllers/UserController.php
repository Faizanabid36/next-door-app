<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function dashboard()
    // {
    //     return \view('user.user_dashboard');
    // }
    public function updateuser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:54',
            'email' => 'required',
            'postal' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);
        // (\request()->merge(['pass'=> \Hash::make('1234567890') ]));
        //\request()->except('_token');

        $user = User::whereId($id)->update(\request()->except('_token'));
        return back()->with('success', 'User Updated Successfuly ');

    }
}
