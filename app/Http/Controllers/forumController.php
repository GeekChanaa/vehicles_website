<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\reply;
use App\comment;
use Auth;
use App\postvote;
use App\replyvote;
use App\commentvote;
use App\section;
use Response;

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
     $list_posts = post::where('section','=',$section)->with('comments','comments.replies')->paginate(15);
     $list_replies = reply::paginate(15);
     $data=[
       'list_posts' => $list_posts,
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

  public function upvotePost(Request $request){
    if(postvote::where('post_id','=',$request->postid)->where('user_id','=',$request->userid)->first()){
      $vote = postvote::where('post_id','=',$request->postid)->where('user_id','=',$request->userid)->first();
      $vote->value=1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
    else{
      $vote = new postvote;
      $vote->user_id = $request->userid;
      $vote->post_id = $request->postid;
      $vote->value=1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
  }

  public function downvotePost(Request $request){
    if(postvote::where('post_id','=',$request->postid)->where('user_id','=',$request->userid)->first()){
      $vote = postvote::where('post_id','=',$request->postid)->where('user_id','=',$request->userid)->first();
      $vote->value=-1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
    else{
      $vote = new postvote;
      $vote->user_id = $request->userid;
      $vote->post_id = $request->postid;
      $vote->value=-1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
  }

  public function upvoteComment(Request $request){
    if(commentvote::where('comment_id','=',$request->commentid)->where('user_id','=',$request->userid)->first()){
      $vote = commentvote::where('comment_id','=',$request->commentid)->where('user_id','=',$request->userid)->first();
      $vote->value=1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
    else{
      $vote = new commentvote;
      $vote->user_id = $request->userid;
      $vote->comment_id = $request->commentid;
      $vote->value=1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
  }

  public function downvoteComment(Request $request){
    if(commentvote::where('comment_id','=',$request->commentid)->where('user_id','=',$request->userid)->first()){
      $vote = commentvote::where('comment_id','=',$request->commentid)->where('user_id','=',$request->userid)->first();
      $vote->value=-1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
    else{
      $vote = new commentvote;
      $vote->user_id = $request->userid;
      $vote->comment_id = $request->commentid;
      $vote->value=-1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
  }

  public function upvoteReply(Request $request){
    if(replyvote::where('reply_id','=',$request->replyid)->where('user_id','=',$request->userid)->first()){
      $vote = replyvote::where('reply_id','=',$request->replyid)->where('user_id','=',$request->userid)->first();
      $vote->value=1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
    else{
      $vote = new replyvote;
      $vote->user_id = $request->userid;
      $vote->reply_id = $request->replyid;
      $vote->value=1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
  }

  public function downvoteReply(Request $request){
    if(replyvote::where('reply_id','=',$request->replyid)->where('user_id','=',$request->userid)->first()){
      $vote = replyvote::where('reply_id','=',$request->replyid)->where('user_id','=',$request->userid)->first();
      $vote->value=-1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
    else{
      $vote = new replyvote;
      $vote->user_id = $request->userid;
      $vote->reply_id = $request->replyid;
      $vote->value=-1;
      $vote->save();
      return Response::json(array('success'=>true,));
    }
  }



}
