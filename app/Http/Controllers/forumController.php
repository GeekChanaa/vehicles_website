<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\reply;
use App\comment;
use Auth;

class forumController extends Controller
{
  public function createpost(Request $request){
    $post = new post;
    $post->title = $request->title;
    $post->user_id = Auth::user()->id;
    $post->content = $request->content;
    $post->section = $request->section;
    $post->save();
    return redirect()->back();
  }

}
