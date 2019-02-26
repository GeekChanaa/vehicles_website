<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vmodel;

class vmodelsController extends Controller
{
    //
    public function create(Request $request){
      $vmodel = new vmodel;
      $vmodel->name = $request->name;
      $vmodel->brand = $request->brand;
      $vmodel->description = $request->description;
      $vmodel->save();
      return redirect()->back();
    }
}
