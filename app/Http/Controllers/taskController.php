<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\task;
use auth;

class taskController extends Controller
{
    //add todo record
    public function create(Request $request){
      $task = new task;
      $task->user_id = Auth::user()->id;
      $task->in_charge_of_id = 1;
      $task->section = $request->section;
      $task->state = 'undone';
      $task->content = $request->content;
      $task->save();

      return response()->json($task);
    }
    //delete todo record
    public function delete(Request $request){
      $task = task::all()->where('id','=',$request->id)->first();
      $task->delete();
    }

    //done todo record
    public function done(Request $request){
      $task = task::all()->where('id','=',$request->id)->first();
      $task->state='done';
      $task->save();
    }



    // undone todo record
    public function undone(Request $request){
      $task = task::all()->where('id','=',$request->id)->first();
      $task->state='undone';
      $task->save();

    }

    // update todo content
    public function updatecontent(Request $request){
      $task = task::all()->where('id','=',$request->id)->first();
      $task->content = $request->content;
      $task->save();
    }

    // update todo deadline
    public function updatedeadline(Request $request){
      $task = task::all()->where('id','=',$request->id)->first();
      $task->deadline = $request->deadline;
      $task->save();
    }

    //edit todo record

}
