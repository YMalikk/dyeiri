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
        $user = User::where('email','=',$request->email)->first();
        if(!isset($user))
        {
            alert()->warning('Ce compte n\'existe pas.', 'Information')->persistent("Ok");
        }
        elseif(!Hash::check($request->password, $user->password))
        {
            alert()->warning('Le mot de passe ne correspond pas', 'Information')->persistent("Ok");
        }
        elseif($user->status==0)
            alert()->warning('Veuillez activer votre compte', 'Information')->persistent("Ok");
        else
        {
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if ($user->hasRole('client'))
                return redirect()->route('showProfile');
            elseif($user->hasRole('chef'))
                return redirect()->route('showProfileChef');
        }
        return redirect()->back();
    }
}
