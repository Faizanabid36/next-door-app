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
            
        return back()->with('success', 'User Updated Successfuly ');
        

    }
    public function changePassword(Request $request, $id ) {
        //if old pass is not matched
        if (!(Hash::check($request->get('account-old-password'), Auth::user()->password))) {
            return back()->with('error',"Password Not Matched Please try again.");
        }
        //if old and new sem
        if(strcmp($request->get('account-old-password'), $request->get('account-new-password'))){

            return back()->with("error","New Password is same as Old Password.");
        }
        if(!(strcmp($request->get('account-old-password'), $request->get('con-password')))){

            return back()->with("error","Retyped And New Password Not Matched.");
        }

        // $validatedData = $request->validate([
        //     'account-old-password' => 'required',
        //     'account-new-password' => 'required|string|min:6|confirmed',
        // ]);

       $user = Auth::user();
       $user->password = Hash::make($request->get('account-new-password'));
      // (\request()->merge(['password'=>($user->password)]));
        
       
      //  $user= User::whereId($id)->update(\request());
         $user->save();
        return redirect('/')->with('Success',"Password Changed! ");
    }

}
