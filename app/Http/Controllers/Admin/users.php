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

    public function update(Request $request){
      $user = user::all()->where('id','=',$request->id)->first();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->num_tel = $request->num_tel;
      $user->address = $request->address;
      $user->rank = $request->rank;
      $user->blog_score = $request->blog_score;
      $user->save();
      return redirect()->back();
    }
}
