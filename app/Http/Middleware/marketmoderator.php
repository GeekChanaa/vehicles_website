<?php

namespace App\Http\Middleware;

use Closure;
use auth;

class marketmoderator
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
      if (Auth::user() &&  (Auth::user()->rank == 'marketm' || Auth::user()->rank == 'admin' )) {
             return $next($request);
      }

     return redirect('onlyMarketModerator');
    }

}
