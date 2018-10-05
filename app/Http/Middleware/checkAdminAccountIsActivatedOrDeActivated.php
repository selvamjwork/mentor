<?php

namespace App\Http\Middleware;

use Closure;

class checkAdminAccountIsActivatedOrDeActivated
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
        if(\Auth::user()->is_activated=='0'){
            \Auth::logout();

            return redirect('/admin/login');
        }
        return $next($request);
    }
}
