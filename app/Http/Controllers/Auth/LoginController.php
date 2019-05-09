<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo(){
      if(Auth::user()->rank=='admin'){
        return '/Dashboard';
      }
      else if(Auth::user()->rank=='encyclopediam'){
        return '/EncyclopediaDashboard';
      }
      else if(Auth::user()->rank=='blogm'){
        return '/BlogDashboard';
      }
      else if(Auth::user()->rank=='marketm'){
        return '/MarketDashboard';
      }
      else if(Auth::user()->rank=='servicesm'){
        return '/ServicesDashboard';
      }
      else{
        return '/home';
      }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
