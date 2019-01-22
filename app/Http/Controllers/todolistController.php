<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\todolist;
use auth;

class todolistController extends Controller
{
    //add todo record
    public function create(Request $request){
      $task = new todolist;
      $task->user_id = Auth::user()->id;
      $task->state = 'notdone';
      $task->content = $request->content;
      $task->save();
      return redirect()->back();
    }
    //delete todo record
    public function delete(Request $request){
      $task = todolist::all()->where('id','=',$request->id)->first();
      $task->delete();
      return redirect()->back();
    }

    //done todo record
    public function update(Request $request){
      $task = todolist::all()->where('id','=',$request->id)->first();
      $task->state='done';
      $task->save();
      return redirect()->back();

    }
    //edit todo record

}
