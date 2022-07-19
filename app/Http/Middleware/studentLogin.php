<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class studentLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
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
