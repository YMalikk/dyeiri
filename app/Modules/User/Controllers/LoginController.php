<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Modules\User\Models\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function handleLogout()
    {
        Auth::logout();
        return redirect()->route('showHome');
    }

    public function handleConnection(Request $request)
    {
        $credentials = $this->credentials($request);
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            $user = Auth::getLastAttempted($credentials, true);

            if ($user->hasRole('client')) {
                Auth::login($user);
                return redirect()->route('showProfile');
            } elseif ($user->hasRole('chef')) {
                Auth::login($user);
                return redirect()->route('showProfileChef');
            }
        } else {
            Auth::logout();
            alert()->error('Vérifier vos données', 'Erreur')->persistent('Ok');
            return redirect()->back();
        }

    }
}
