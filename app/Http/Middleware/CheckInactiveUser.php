<?php

namespace SSD\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckInactiveUser
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
    $maxIdleTime = config('session.lifetime') * 60; // en segundos
    $lastActivity = session('last_activity');
    $user = $request->user() ? $request->user() : null;


    if (time() - $lastActivity > $maxIdleTime) {
        Auth::logout();
        return redirect('/login')->with('message', 'Su sesión ha expirado debido a inactividad.');
    }

    session(['last_activity' => time()]);

    $response = $next($request);

    if (Auth::check() && $user < 3) {
        session(['redirect_count' => $user + 1]);
        return redirect('/');
    }

    return $response;
}


    
}