<?php

namespace App\Http\Middleware;

use Closure;

class RoleAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $urlRole)
    {

        foreach($urlRole as $userprivilege){
             if(auth()->user()->userprivilege == $userprivilege)
            return $next($request);
        }
        return redirect()->route('dashboard');

    }
}
