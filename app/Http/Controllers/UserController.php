<?php

namespace App\Http\Controllers;

use App\FamilyMember;
use App\Http\Requests\ValdateFamilyMember;
use App\User;
use App\UserExtra;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * ------------------------------------------------
     * Function for General Tab in Edit Profile
     *-------------------------------------------------
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateuser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:54',
            'email' => 'required',
            'Picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if (request()->hasFile('Picture')) {
            $file = $request->file('Picture');
            $imageName = auth()->user()->id . '.' . $file->getClientOriginalExtension();
            $destinationPath = storeImage($request->file('Picture'), 'users/' . auth()->user()->id);
            (\request()->merge(['avatar' => $destinationPath]));
        }
        User::whereId($id)->update(\request()->except('_token', 'Picture'));
        if (!empty($request->get('postal'))) {
            try {
                $client = new \GuzzleHttp\Client();
                $display = $client->request('GET', 'http://api.zippopotam.us/ph/' . $request->get('postal'));
                $output = json_decode($display->getBody()->getContents());
                $place_name = $output->places[0]->{'place name'};
                User::whereId($id)->update(['postal' => $request->get('postal'), 'address' => $place_name]);
                return back()->with('success', 'Settings Updated');
            } catch (\Exception $exception) {
                return back()->with('error', 'Postal Code Does not Exist');
            }
        }
        return back()->with('success', 'Settings Updated');
    }

    public function show_user_details($id)
    {
        return User::whereId($id)->with('family_members')->get();
    }

    /**
     * ------------------------------------------------
     * Function for Change Password Setting Tab
     *-------------------------------------------------
     */

    public function changePassword(Request $request, $id)
    {
        $this->validate($request,[
            'old_password'=>'sometimes|required|min:6',
            'new_password'=>'required|min:6',
            'confirm_password'=>'required|min:6|required_with:new_password|same:new_password',
        ]);
        //if old pass is not matched
        if(isset($request->old_password))
        {
            if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
                return back()->with('error', "Incorrect Password Entered.");
            }
        }
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        return back()->with('success', "Password Changed! ");
    }

    /**
     * ------------------------------------------------
     * Function for Change Password Setting Tab
     *-------------------------------------------------
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

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

    /**
     * ----------------------------------
     * Create Family Members
     * ----------------------------------
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function update_family(ValidateFamilyMember $request,$id)
    {
        if ($request->hasFile('Picture')) {
            $file = $request->file('Picture');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/users/family/');
            $file->move($destinationPath, $imageName);
            ($request->merge(['member_image' => ('users/family/' . $imageName)]));
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

    /**
     * ----------------------------
     * Update Family Members Info
     * ----------------------------
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function edit_family(ValidateFamilyMember $request, $id)
    {
        if ($request->hasFile('Picture')) {
            $file = $request->file('Picture');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/users/family/');
            $file->move($destinationPath, $imageName);
            ($request->merge(['member_image' => ('users/family/' . $imageName)]));
        }
        $request->merge(['member_relation'=>$request->get('relation')]);
        $x=FamilyMember::whereId($id)->update($request->except('_token','Picture','relation'));
        if($x)
            return back()->with('success', 'Member Updated Successfully');
        return back()->with('error', 'Could Not Update Member');
    }

    /**
     * ------------------------------
     * Delete Family Member
     * ------------------------------
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete_family($id)
    {
        $d = FamilyMember::whereId($id)->delete();
        if ($d)
            return back()->with('success', 'Member Deleted Successfully');
        return back()->with('error', 'Could Not Delete Member');
    }
}
