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
use App\reported_post;
use App\reported_comment;
use App\reported_reply;
use App\community;
use App\community_membership;
use App\User;
use Response;

class forumController extends Controller
{

  /*
  *******************
  ROUTING FUNCTIONS
  *******************
  */

  public function new_community(){
    return view('blog.create_community');
  }



  public function createpost(Request $request){
    $post = new post;
    $post->title = $request->title;
    $post->user_id = Auth::user()->id;
    $post->content = $request->content;
    $post->community = $request->community;
    $post->save();
    return redirect()->back();
  }

  public function new_post($community){

    return view('blog.new_post')->with(['community'=>$community]);
  }

  public function index(){
    // Listing of all Communities
    $list_communities = community::all();

    return view('blog.index')->with('list_communities',$list_communities);
  }

  public function newpost(){
    $list_communities = community::all();
    return view('blog.newpost')->with('list_communities',$list_communities);
  }

 public function community($community){
   if(community::all()->where('title','=',$community)->first()){
     $list_posts = post::where('community','=',$community)->with('comments','comments.replies')->paginate(15);
     $list_replies = reply::paginate(15);
     $data=[
       'list_posts' => $list_posts,
       'list_replies' => $list_replies,
       'community' => $community
     ];
     return view('blog.community')->with($data);
   }
   return view('blog.community_not_found')->with(['community' => $community]);

 }

 public function post($community,$postid){
   if(community::all()->where('title','=',$community)->first()){
     $list_comments = comment::all()->where('post_id','=',$postid);
     $list_replies = reply::all()->whereIn('comment_id',$list_comments);
     $data=[
       'list_comments' => $list_comments,
       'list_replies' => $list_replies
     ];
     return view('blog.post')->with($data);
   }
   return view('blog.community_not_found')->with(['community' => $community]);


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
    // IF there is already a vote
    if(postvote::where('post_id','=',$request->postid)->where('user_id','=',$request->userid)->first()){
      $vote = postvote::where('post_id','=',$request->postid)->where('user_id','=',$request->userid)->first();
      if($vote->value == -1){
        $post = post::where('id','=',$request->postid)->first();
        $post->upvotes = $post->upvotes+2;
        $post->save();
        $vote->value=1;
        $vote->save();
        return Response::json(array('success'=>true,));
      }
      // Error if there is already an upvote
      else{
        return Response::json(array('message'=>'you can\'t vote 2 times sorry!',));
      }
    }
      $vote = new postvote;
      $vote->user_id = $request->userid;
      $vote->post_id = $request->postid;
      $vote->value=1;
      $post = post::where('id','=',$request->postid)->first();
      $post->upvotes = $post->upvotes+1;
      $post->save();
      $vote->save();
      return Response::json(array('success'=>true,));
  }

  public function downvotePost(Request $request){
    // IF there is already a upvote
    if(postvote::where('post_id','=',$request->postid)->where('user_id','=',$request->userid)->first()){
      $vote = postvote::where('post_id','=',$request->postid)->where('user_id','=',$request->userid)->first();
      if($vote->value == 1){
        $post = post::where('id','=',$request->postid)->first();
        $post->upvotes = $post->upvotes-2;
        $post->save();
        $vote->value=-1;
        $vote->save();
        return Response::json(array('success'=>true,));
      }
      // Error if there is already an upvote
      else{
        return Response::json(array('message'=>'you can\'t downvote 2 times sorry!',));
      }
    }
      $vote = new postvote;
      $vote->user_id = $request->userid;
      $vote->post_id = $request->postid;
      $vote->value=-1;
      $post = post::where('id','=',$request->postid)->first();
      $post->upvotes = $post->upvotes-1;
      $post->save();
      $vote->save();
      return Response::json(array('success'=>true,));
  }

  public function upvoteComment(Request $request){
    // IF there is already a downvote
    if(commentvote::where('comment_id','=',$request->commentid)->where('user_id','=',$request->userid)->first()){
      $vote = commentvote::where('comment_id','=',$request->commentid)->where('user_id','=',$request->userid)->first();
      if($vote->value == -1){
        $comment = comment::where('id','=',$request->commentid)->first();
        $comment->upvotes = $comment->upvotes+2;
        $comment->save();
        $vote->value=1;
        $vote->save();
        return Response::json(array('success'=>true,));
      }
      // Error if there is already an upvote
      else{
        return Response::json(array('message'=>'you can\'t vote 2 times sorry!',404));
      }
    }
      $vote = new commentvote;
      $vote->user_id = $request->userid;
      $vote->comment_id = $request->commentid;
      $vote->value=1;
      $comment = comment::where('id','=',$request->commentid)->first();
      $comment->upvotes = $comment->upvotes+1;
      $comment->save();
      $vote->save();
      return Response::json(array('success'=>true,));
  }

  public function downvoteComment(Request $request){
    // IF there is already a downvote
    if(commentvote::where('comment_id','=',$request->commentid)->where('user_id','=',$request->userid)->first()){
      $vote = commentvote::where('comment_id','=',$request->commentid)->where('user_id','=',$request->userid)->first();
      if($vote->value == 1){
        $comment = comment::where('id','=',$request->commentid)->first();
        $comment->upvotes = $comment->upvotes-2;
        $comment->save();
        $vote->value=-1;
        $vote->save();
        return Response::json(array('success'=>true,));
      }
      // Error if there is already an upvote
      else{
        return Response::json(array('message'=>'you can\'t downvote 2 times sorry!',404));
      }
    }
      $vote = new commentvote;
      $vote->user_id = $request->userid;
      $vote->comment_id = $request->commentid;
      $vote->value=-1;
      $comment = comment::where('id','=',$request->commentid)->first();
      $comment->upvotes = $comment->upvotes-1;
      $comment->save();
      $vote->save();
      return Response::json(array('success'=>true,));
  }

  public function upvoteReply(Request $request){
    // IF there is already a downvote
    if(replyvote::where('reply_id','=',$request->replyid)->where('user_id','=',$request->userid)->first()){
      $vote = replyvote::where('reply_id','=',$request->replyid)->where('user_id','=',$request->userid)->first();
      if($vote->value == -1){
        $reply = reply::where('id','=',$request->replyid)->first();
        $reply->upvotes = $reply->upvotes+2;
        $reply->save();
        $vote->value=1;
        $vote->save();
        return Response::json(array('success'=>true,));
      }
      // Error if there is already an upvote
      else{
        return Response::json(array('message'=>'you can\'t vote 2 times sorry!',404));
      }
    }
      $vote = new commentvote;
      $vote->user_id = $request->userid;
      $vote->reply_id = $request->replyid;
      $vote->value=1;
      $comment = comment::where('id','=',$request->commentid)->first();
      $comment->upvotes = $comment->upvotes+1;
      $comment->save();
      $vote->save();
      return Response::json(array('success'=>true,));
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

  /*
  *******************
  REPORT FUNCTIONS
  *******************
  */

  public function reportPost(Request $request){
    $report = new reported_post;
    $report->user_id = $request->userid;
    $report->post_id = $request->postid;
    $report->save();
    return Response::json(array('success'=>true,));
  }

  public function reportComment(Request $request){
    $report = new reported_comment;
    $report->user_id = $request->userid;
    $report->comment_id = $request->commentid;
    $report->save();
    return Response::json(array('success'=>true,));
  }

  public function reportReply(Request $request){
    $report = new reported_reply;
    $report->user_id = $request->userid;
    $report->reply_id = $request->replyid;
    $report->save();
    return Response::json(array('success'=>true,));
  }


  /*
  *******************
  COMMUNITY FUNCTIONS
  *******************
  */

  // CREATING COMMUNITY FUNCTION
  public function createcommunity(Request $request){
    $community = new community;
    $community->title = $request->title;
    $community->admin_id = Auth::user()->id;
    $community->category = $request->category;
    $community->private = 0;
    $community->save();
    return redirect()->back();
  }

  // JOIN COMMUNITY
  public function joinCommunity(Request $request){
    $membership = new community_membership;
    $com = community::where('title','=',$request->community)->first();
    $membership->community_id = $com->id;
    $membership->member_id = $request->userid;
    $membership->save();
    return Response::json(array('success'=>true,));
  }

  // COMMUNITY INTERFACE
  public function communityInterface($community){
    $com = community::where('title','=',$community)->first();
    $members_ids = community_membership::select('member_id')->where('community_id','=',$com->id)->get();
    $members = User::whereIn('id',$members_ids)->get();
    $data=[
      'community' => $com,
      'list_members' => $members,
    ];
    return view('blog.community_interface')->with($data);
  }

  // BAN MEMBER FROM COMMUNITY
  public function banMember(Request $request){
    $membership = community_membership::where('member_id','=',$request->memberid)->where('community_id','=',$request->communityid)->first();
    $membership->delete();
    return Response::json(array('success'=>true,));
  }

  // DELETE COMMUNITY FUNCTION
  public function deleteCommunity(Request $request){
    $community = community::where('id','=',$request->id)->first();
    $community->delete();
    return redirect('/blog');
  }

  
}
