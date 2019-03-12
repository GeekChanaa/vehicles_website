<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class encyclopediaController extends Controller
{
    //
    public function index(){
      return view('encyclopedia.index');
    }
}
