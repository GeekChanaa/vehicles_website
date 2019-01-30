é<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class users extends Controller
{
    //
    public function delete(Request $request){
      $user = user::all()->where('id','=',$request->id)->first();
      $user->delete();
      return redirect()->back();
    }

}
