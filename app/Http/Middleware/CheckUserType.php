<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {   
        $usertype = Auth::user()->user_type;
        $rol = explode('|', $roles);

        foreach ($rol as $role){
            if($role == $usertype){
                return $next($request);
            }
        }

        abort('404');
    }
}
