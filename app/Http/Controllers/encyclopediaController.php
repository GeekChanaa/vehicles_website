<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class encyclopediaController extends Controller
{
    //
    public function index(){
      return view('encyclopedia.index');
    }

    public function brands(){
      return view('encyclopedia.brands');
    }

    public function carpartBrands(){
      return view('encyclopedia.carpartbrands')
    }

    public function news(){
      return view('encyclopedia.news');
    }

    public function autoparts(){
      return view('encyclopedia.autoparts');
    }
}
