<?php

namespace App\Http\Middleware;

use Closure;
use auth;

class encyclopediamoderator
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
          if (Auth::user() &&  (Auth::user()->rank == 'encyclopediam' || Auth::user()->rank == 'admin' )) {
                 return $next($request);
          }

         return redirect('onlyEncyclopediaModerator');
        }
}
