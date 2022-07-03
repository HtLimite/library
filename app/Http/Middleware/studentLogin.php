<?php

namespace App\Http\Middleware;

use Closure;

class studentLogin
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
        if($request->session()->has('account'))
        {
            return $next($request);
        }else {
            return redirect('/');
        }
    }
}
