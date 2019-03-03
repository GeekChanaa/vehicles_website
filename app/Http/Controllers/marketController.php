<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class marketController extends Controller
{
    //Routes To Markets
    public function usedvehicles(){
      return view('markets.usedvehicles');
    }
    public function newvehicles(){
      return view('markets.newvehicles');
    }
    public function usedcarpart(){
      return view('markets.usedcarparts');
    }
    public function newcarpart(){
      return view('markets.newcarparts');
    }
    public function index(){
      return view('markets.index');
    }
}
