<?php

namespace App\Http\Middleware;

use Closure;
use auth;
class editor
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

        if (Auth::user() &&  Auth::user()->rank == 'editor') {
               return $next($request);
        }

       return redirect('onlyEditor');

    }
}
