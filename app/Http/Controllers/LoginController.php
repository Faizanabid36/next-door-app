<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {// do your magic here
            return redirect()->route('admin-dashboard');
        }

        return redirect('/dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password])) 
            {
            $user = User::where('email', $request->email)->first();
            if ($user->is_admin()) {
                return redirect()->route('admin-dashboard');
            }
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'These Credentials Do not Match Our Records');
    }
}
