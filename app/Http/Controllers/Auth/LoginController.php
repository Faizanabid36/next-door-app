<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\SocialIdentity;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

//use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        \Auth::login($authUser, true);
        return redirect(route('dashboard'));
    }

    public function findOrCreateUser($providerUser, $provider)
    {
        $account = SocialIdentity::whereProviderName($provider)
            ->whereProviderId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'avatar' => $providerUser->avatar,
                ]);
            }

            $user->identities()->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider,
            ]);

            return $user;
        }
    }
}


//namespace App\Http\Controllers\Auth;
//
//use App\Http\Controllers\Controller;
//use App\SocialIdentity;
//use App\User;
//use Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Laravel\Socialite\Facades\Socialite;
//
////use Socialite;
//
//class LoginController extends Controller
//{
//    /*
//    |--------------------------------------------------------------------------
//    | Login Controller
//    |--------------------------------------------------------------------------
//    |
//    | This controller handles authenticating users for the application and
//    | redirecting them to your home screen. The controller uses a trait
//    | to conveniently provide its functionality to your applications.
//    |
//    */
//
//    use AuthenticatesUsers;
//
//    /**
//     * Where to redirect users after login.
//     *
//     * @var string
//     */
//    // protected $redirectTo = RouteServiceProvider::HOME;
//
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
//
//    public function redirectToProvider($provider)
//    {
//        return Socialite::driver($provider)->redirect();
//    }
//
//    public function handleProviderCallback($provider)
//    {
//        try {
//            $user = Socialite::driver($provider)->user();
//        } catch (\Exception $e) {
//            return redirect('/login');
//        }
//
//        $authUser = $this->findOrCreateUser($user, $provider);
//        if ($authUser['creation'] == true) {
//            \Auth::login($authUser['user'], true);
//            return redirect()->route('signup2');
//        } else {
//            \Auth::login($authUser['user'], true);
//            return redirect()->route('dashboard');
//        }
////        \Auth::login($authUser, true);
////        return redirect(route('dashboard'));
//    }
//
//    public function findOrCreateUser($providerUser, $provider)
//    {
//        $account = SocialIdentity::whereProviderName($provider)
//            ->whereProviderId($providerUser->getId())
//            ->first();
//
//        if ($account) {
////            return $account->user;
//            return ['creation' => false, 'user' => $account->user];
//            return 'logging';
//        } else {
//            $user = User::whereEmail($providerUser->getEmail())->first();
//
//            if (!$user) {
//                $user = User::create([
//                    'email' => $providerUser->getEmail(),
//                    'name' => $providerUser->getName(),
//                    'avatar' => $providerUser->avatar,
//                ]);
//            }
//
//            $user->identities()->create([
//                'provider_id' => $providerUser->getId(),
//                'provider_name' => $provider,
//            ]);
//
//            return ['creation' => true, 'user' => $user];
//        }
//    }
//}
