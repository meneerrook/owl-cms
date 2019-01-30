<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role
{
    public function handle($request, Closure $next, ... $roles)
    {
        if(Auth::user()->role == 'admin') {
            return $next($request);
        }

        foreach($roles as $role) {
            if(Auth::user()->role == $role) {
                return $next($request);
            }
        }

        return redirect('/owl/dashboard');
    }
}
