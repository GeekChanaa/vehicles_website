<?php

namespace App\Http\Middleware;

use Closure;
use auth;
class servicesmoderator
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
      if (Auth::user() &&  Auth::user()->rank == 'servicesm') {
             return $next($request);
      }

     return redirect('onlyServicesModerator');
    }
}
