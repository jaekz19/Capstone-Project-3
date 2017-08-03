<?php

namespace App\Http\Middleware;

use Closure;

class All
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
        if (!$request->user()) {
            return redirect('/login');
        }elseif ($request->user()->role == 'New') {
            return redirect('/inactive');
        }
        return $next($request);
    }
}
