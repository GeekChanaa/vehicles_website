<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\reply;
use App\comment;
use Auth;
use App\section;

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

  public function index(){
    // Listing of all sections
    $list_sections = section::all();

    return view('blog.index')->with('list_sections',$list_sections);
  }

  public function newpost(){
    $list_sections = section::all();

    return view('blog.newpost')->with('list_sections',$list_sections);
  }

 public function section(){
   $list_posts = post::all();
   $list_comments = comment::all();
   $list_replies = reply::all();
   $data=[
     'list_posts' => $list_posts,
     'list_comments' => $list_comments,
     'list_replies' => $list_replies,
   ];
   return view('blog.section')->with($data);
 }

  public function createcomment(Request $request){
    $comment = new comment;
    $comment->user_id = $request->user_id;
    $comment->post_id = $request->post_id;
    $comment->content = $request->content;
    $comment->upvotes = 0 ;
    $comment->save();
    return redirect()->back();
  }

  public function createreply(Request $request){
    $reply = new reply;
    $reply->user_id = $request->user_id;
    $reply->comment_id = $request->comment_id;
    $reply->content = $request->content;
    $reply->upvotes = 0;
    $reply->save();
    return redirect()->back();

  }

}
