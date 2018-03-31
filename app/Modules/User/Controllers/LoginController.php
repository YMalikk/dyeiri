<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Chef\Models\Chef;
use App\Modules\User\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Modules\User\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

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
            if($user->status==0)
            {
                Auth::logout();
                alert()->warning('Veuillez vérifier votre compte', 'Information')->persistent('Ok');
                return redirect()->back();
            }
            else
            {
            if ($user->hasRole('client')) {
                Auth::login($user);
                return redirect()->route('showProfile');
            } elseif ($user->hasRole('chef')) {
                $chef=$user->chef;
                Auth::login($user);
                if($chef->status==0)
                {
                    return redirect()->route("showChefRegisterStepTwo");
                }
                else
                {
                    return redirect()->route('showChefProfile');
                }

            }
            }
        } else {
            Auth::logout();
            alert()->error('Vérifier vos données', 'Erreur')->persistent('Ok');
            return redirect()->back();
        }
    }

    public function authenticate($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function loginProvider($provider)
    {
        $socialUserInfo = Socialite::driver($provider)->stateless()->user();
        $user = User::where(['email' => $socialUserInfo->getEmail()])->first();
        if(isset($user))
        {
            Auth::login($user);
            if($user->hasRole('client'))
                return redirect()->route('showProfile');
            else if($user->hasRole('chef'))
                return redirect()->route('showChefProfile');
        }
        else {
            Session::put('providerInfo', $socialUserInfo);
            Session::put('provider', $provider);
            return view('User::auth.subscriptionProvider');
        }
    }

    public function handleSubscriptionProviderType(Request $request)
    {
        if (Session::has('providerInfo')) {
            $socialUserInfo = session('providerInfo');
            $provider = session('provider');
            $nameComposed = explode(" ", Str::lower($socialUserInfo->getName()));
            if($provider=="facebook")
            {
                $name= $nameComposed[0];
                $surname= $nameComposed[1];
            }
            else
            {
                $surname= $nameComposed[0];
                $name= $nameComposed[1];
            }
            $user = User::create([
                'name' => $name,
                'surname' => $surname,
                'email' => $socialUserInfo->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUserInfo->getId(),
                'image' => $socialUserInfo->getAvatar(),
                'status' => 1
            ]);

            if ($request->userType == "client")
            {
                $user->assignRole(2);
                $user->current_user=2;
                $user->save();
                Auth::login($user);
                return redirect()->route('showProfile');
            }
            else if ($request->userType == "chef")
            {
                $destinationPathCoverPhoto='storage/uploads/chefs/chefCover.jpg';
                $user->assignRole(3);
                $user->current_user=1;
                $user->save();
                $dataChef=[
                    'cover_photo'=>$destinationPathCoverPhoto,
                    'likes_count'=>0,
                    'description'=>'',
                    'work'=>'',
                    'language'=>'Arabic',
                    'status'=>0,
                    'user_id'=>$user->id
                ];

                Chef::create($dataChef);

                for($i=1;$i<=7;$i++)
                {
                    Schedule::create([
                        'day'=>$i,
                        'status'=>0,
                        'user_id'=>$user->id
                    ]);
                }
                Auth::login($user);
                return redirect()->route('showChefProfile');
            }
        }
        else
        {
            return redirect()->route('showHome');
        }
    }

    public function showLogin()
    {
            return view('User::auth.login');
    }
}
