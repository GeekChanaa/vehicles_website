<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;

class brandsController extends Controller
{
  public function create(Request $request){
    $brand = new brand;
    $brand->name = $request->name ;
    $brand->year_foundation = $request->year_foundation ;
    $brand->headquarters = $request->headquarters ;
    $brand->CEO = $request->CEO ;
    $brand->website = $request->website ;
    $brand->production_output = $request->production_output ;
    $brand->revenue = $request->revenue ;
    $brand->net_income = $request->net_income ;
    $brand->nbr_of_employees = $request->nbr_of_employees ;
    $brand->description = $request->description ;
    $brand->save();
    return redirect()->back();
    }
    //
}
