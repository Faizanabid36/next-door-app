<?php

namespace App\Http\Controllers;

use App\FamilyMember;
use App\User;
use App\UserExtra;
use Auth;
use Hash;
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
            'Picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if (request()->hasFile('Picture')) {
            $file = $request->file('Picture');
            $imageName = auth()->user()->id . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/users/avatar/');
            $file->move($destinationPath, $imageName);
            (\request()->merge(['avatar' => ('users/avatar/' . $imageName)]));
        }
        User::whereId($id)->update(\request()->except('_token', 'Picture'));
        return back()->with('success', 'User Updated Successfuly ');
    }

    public function show_user_details($id)
    {
        return User::whereId($id)->with('family_members')->get();
    }

    public function changePassword(Request $request, $id)
    {
        $this->validate($request,[
            'old_password'=>'required|min:6',
            'new_password'=>'required|min:6',
            'confirm_password'=>'required|min:6|required_with:new_password|same:new_password',
        ]);
        //if old pass is not matched
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return back()->with('error', "Incorrect Password Entered.");
        }
        //if old and new sem
//        if (strcmp($request->get('old_password'), $request->get('new_password'))) {
//            return back()->with("error", "New Password is same as Old Password.");
//        }
//        if (!(strcmp($request->get('old_password'), $request->get('confirm_password')))) {
//            return back()->with("error", "Retyped And New Password Not Matched.");
//        }
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        return back()->with('success', "Password Changed! ");
    }

    public function update_user_extras(Request $request, $id)
    {
        $display_phone = $request->get('display_phone');
        $display_address = $request->get('display_address');
        if (isset($display_phone))
            request()->merge(['hide_phone' => 0]);
        else
            request()->merge(['hide_phone' => 1]);
        if (isset($display_address))
            request()->merge(['hide_address' => 0]);
        else
            request()->merge(['hide_address' => 1]);
        UserExtra::where('user_id', $id)->update(\request()->except('_token','display_phone','display_address'));
        return back()->with('success', 'Settings Updated');
    }
    public function update_family(Request $request,$id)
    {
        $this->validate($request, [
            'member_name' => 'required|max:54',
            'relation' => 'required|max:54',
            'Picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if (request()->hasFile('Picture')) {
            $file = $request->file('Picture');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/users/family/');
            $file->move($destinationPath, $imageName);
            (\request()->merge(['member_image' => ('users/family/' . $imageName)]));
        }
        $data=new FamilyMember();
        $data->member_name=$request->get('member_name');
        $data->member_relation=$request->get('relation');
        $data->member_image=$request->get('member_image');
        $data->user_id=$id;
        $user=User::find($id);
        $user->family_members()->save($data);
        return back()->with('success', 'Member Created Successfully');
    }
    public function edit_family(Request $request, $id)
    {
        $this->validate($request, [
            'member_name' => 'required|max:54',
            'relation' => 'required|max:54',
            'Picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if (request()->hasFile('Picture')) {
            $file = $request->file('Picture');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/users/family/');
            $file->move($destinationPath, $imageName);
            (\request()->merge(['member_image' => ('users/family/' . $imageName)]));
        }
        $request->merge(['member_relation'=>$request->get('relation')]);
        $x=FamilyMember::whereId($id)->update($request->except('_token','Picture','relation'));
        if($x)
            return back()->with('success', 'Member Updated Successfully');
        return back()->with('error', 'Could Not Update Member');
    }

    public function delete_family($id)
    {
        $d=FamilyMember::whereId($id)->delete();
        if($d)
            return back()->with('success', 'Member Deleted Successfully');
        return back()->with('error', 'Could Not Delete Member');
    }

}
