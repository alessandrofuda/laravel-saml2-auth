<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('azure')->redirect();
    }

    public function handleProviderCallback()
    {
        $azureUser = Socialite::driver('azure')->user();

        // dump($azureUser->getName());
        // dd($azureUser->token);
        if($azureUser->token) {
            $user = User::where('name', $azureUser->getName())->first() ?? null;

            if($user) {
                Auth::login($user, true);
            } else {
                die('User non present in local DB');
            }

            return redirect()->back();
        }

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back()->with('message', 'User locally logged out correctly');


        dd('TODO'); // TODO
    }
}
