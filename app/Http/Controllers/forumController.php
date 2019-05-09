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

  public function new_post($section){

    return view('blog.new_post')->with(['section'=>$section]);
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

 public function section($section){
   if(section::all()->where('title','=',$section)->first()){
     $list_posts = post::all()->where('section','=',$section);
     $list_comments = comment::all()->whereIn('post_id',$list_posts);
     $list_replies = reply::all()->whereIn('comment_id',$list_comments);
     $data=[
       'list_posts' => $list_posts,
       'list_comments' => $list_comments,
       'list_replies' => $list_replies,
       'section' => $section
     ];
     return view('blog.section')->with($data);
   }
   return view('blog.section_not_found')->with(['section' => $section]);

 }

 public function post($section,$postid){
   if(section::all()->where('title','=',$section)->first()){
     $list_comments = comment::all()->where('post_id','=',$postid);
     $list_replies = reply::all()->whereIn('comment_id',$list_comments);
     $data=[
       'list_comments' => $list_comments,
       'list_replies' => $list_replies
     ];
     return view('blog.post')->with($data);
   }
   return view('blog.section_not_found')->with(['section' => $section]);


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
