<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\section;

class sectionController extends Controller
{
    //
    public function create(Request $request){
      $section = new section;
      $section->title = $request->title;
      $section->save();
      return redirect()->back();
    }
}
