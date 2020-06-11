<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;
use Auth;

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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // (\request()->merge(['pass'=> \Hash::make('1234567890') ]));
        //\request()->except('_token');
        if (request()->hasFile('Picture')){

        $file = $request->file('Picture');

        $imageName =auth()->user()->id.'.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/users/avatar/');


        $file->move($destinationPath,$imageName);

        (\request()->merge(['avatar'=> ('users/avatar/'.$imageName) ]));

      }

        $user = User::whereId($id)->update(\request()->except('_token','Picture'));
            
        return back()->with('success', 'User Updated Successfully ');
        

    }
    public function changePassword(Request $request, $id ) {

        User::where('id', $id)->update(['password' => Hash::make(\request('password'))]);
        return back()->with('success', 'Password Updated Successfully ');

       
    }

}
