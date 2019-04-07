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
    }

    //done todo record
    public function done(Request $request){
      $task = todolist::all()->where('id','=',$request->id)->first();
      $task->state='done';
      $task->save();
    }



    // undone todo record
    public function undone(Request $request){
      $task = todolist::all()->where('id','=',$request->id)->first();
      $task->state='undone';
      $task->save();

    }

    // update todo content
    public function updatecontent(Request $request){
      $task = todolist::all()->where('id','=',$request->id)->first();
      $task->content = $request->content;
      $task->save();
    }

    // update todo deadline
    public function updatedeadline(Request $request){
      $task = todolist::all()->where('id','=',$request->id)->first();
      $task->deadline = $request->deadline;
      $task->save();
    }

    //edit todo record

}
