<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\ProfilSekolahModel;

class NoAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->level != 1)
        {
            Auth::logout();
           return redirect('/login');
        }
        
        return $next($request);
    }
}
