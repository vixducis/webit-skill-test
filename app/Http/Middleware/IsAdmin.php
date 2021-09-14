<?php

namespace App\Http\Middleware;

use App\Providers\AppServiceProvider;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user === null || $user->admin == false) {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
