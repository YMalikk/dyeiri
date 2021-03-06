<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Route;

class AuthenticateChef
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Guard  $auth
     * @return void
     */

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {

        if ( !$this->auth->user() )
        {
            return redirect()->route('showLogin');
        }
        else
        {
            if(!$this->auth->user()->hasRole("admin"))
            {
            if($this->auth->user()->current_user==2)
            {
                return redirect('/');
            }
            elseif($this->auth->user()->current_user==1)
            {

                if(($this->auth->user()->chef->status==0)&&(Route::currentRouteName()!="showChefRegisterStepTwo")&&(Route::currentRouteName()!="handleCompleteRegisterChef"))
                {
                    return redirect()->route("showChefRegisterStepTwo");
                }
            }
            }
            else
            {
                return redirect()->route('showAdminLogin');
            }
        }

        return $next($request);
    }
}
