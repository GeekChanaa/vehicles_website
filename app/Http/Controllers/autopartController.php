<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\auto_part;
use Response;

class autopartController extends Controller
{
    //
    public function getpart($category)
    {
      $parts = auto_part::all()->where('category','=',$category);
        return Response::json(array('success'=>true,'data'=>$parts));
    }
}
