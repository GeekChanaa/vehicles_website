<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\country;
use App\city;

class countryController extends Controller
{

    // Function that return the cities of the given country
    public function getcities($country_name){
      $country= country::all()->where('name','=',$country_name)->first();
      $cities= city::all()->where('country_id','=',$country->id);
      return Response::json(array('success'=>true,'data'=>$cities));
    }
}
