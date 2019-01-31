<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    function notFound(){
        return view('errors.404');
    }
    function accessDenied(){
        return view('errors.403');
    }
}
