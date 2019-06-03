<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vmodel;
use Response;

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

    // Get models by brand
    public function getvmodels($brand){
      $models = vmodel::all()->where('brand','=',$brand);
      return Response::json(array('success'=>true,'data'=>$models));

    }
}
