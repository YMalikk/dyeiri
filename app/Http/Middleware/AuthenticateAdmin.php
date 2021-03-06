<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 03/11/2017
 * Time: 7:34 AM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AuthenticateAdmin
{
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

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( !$this->auth->user() )
        {
            return redirect()->route('showAdminLogin');
        }
        else
        {
                if($this->auth->user()->roles()->pluck('title')->first()!=="admin")
                    return redirect('/');
        }

        return $next($request);
    }

}