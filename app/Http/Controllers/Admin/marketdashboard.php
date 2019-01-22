<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class marketdashboard extends Controller
{
    /* Lists Needed */

    //list new car parts

    //list used car parts

    //list used vehicles

    //list new vehicles


    /* Market Stats */

    //number of newcarpart articles

    //number of usedcarparts articles

    //number of usedvehicles articles

    //number of newvehicles articles

    public function newcarpartsdashboard(){
      return view('admin.markets.newcarparts');
    }

    public function newvehiclesdashboard(){
      return view('admin.markets.newvehicles');
    }

    public function usedcarpartsdashboard(){
      return view('admin.markets.usedcarparts');
    }

    public function usedvehiclesdashboard(){
      return view('admin.markets.usedvehicles');
    }
}
