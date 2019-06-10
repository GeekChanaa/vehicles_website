<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
use App\reply;
use App\comment;
use App\section;

class blogdashboard extends Controller
{


    /* Getters */
    public function ListPosts(){
      return post::paginate(50);
    }

    public function ListComments(){
      return comment::paginate(50);
    }

    public function ListReplies(){
      return reply::paginate(50);
    }

    public function ListPosts_statistics(){
      return post::paginate(5);
    }

    public function ListComments_statistics(){
      return comment::paginate(5);
    }

    public function ListReplies_statistics(){
      return reply::paginate(5);
    }

    public function NbrPosts(){
      return post::selectRaw('count(*) as sum')->get();
    }

    public function NbrComments(){
      return comment::selectRaw('count(*) as sum')->get();
    }

    public function NbrReplies(){
      return reply::selectRaw('count(*) as sum')->get();
    }

    public function NbrSections(){
      return section::selectRaw('count(*) as sum')->get();
    }

    public function RatePostsBySection(){
      return $this->NbrPosts()['0']->sum/$this->NbrSections()['0']->sum;
    }

    public function RateCommentsByPost(){
      return $this->NbrComments()['0']->sum/$this->NbrPosts()['0']->sum;
    }

    public function RateRepliesByComment(){
      return $this->NbrReplies()['0']->sum/($this->NbrComments()['0']->sum+0.01);
    }

    /* STATISTICS BY YEAR AND MONTH */
    public function getStatisticsOfMonth_posts($year,$month){
      return post::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$month.' and year(created_at) ='.$year)->get();
    }

    public function getStatisticsOfYear_posts($year){
      for($i=1;$i<13;$i++){
        $nbr_recent_posts_month[$i] = $this->getStatisticsOfMonth_posts($year,$i) ;
      }
      return $nbr_recent_posts_month;
    }

    public function getStatisticsOfMonth_comments($year,$month){
      return comment::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$month.' and year(created_at) ='.$year)->get();
    }

    public function getStatisticsOfYear_comments($year){
      for($i=1;$i<13;$i++){
        $nbr_recent_comments_month[$i] = $this->getStatisticsOfMonth_comments($year,$i) ;
      }
      return $nbr_recent_comments_month;
    }

    public function getStatisticsOfMonth_replies($year,$month){
      return reply::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$month.' and year(created_at) ='.$year)->get();
    }

    public function getStatisticsOfYear_replies($year){
      for($i=1;$i<13;$i++){
        $nbr_recent_replies_month[$i] = $this->getStatisticsOfMonth_replies($year,$i) ;
      }
      return $nbr_recent_replies_month;
    }

    /* Statistics by Sections */
    public function statistics(){
      $data = [
    'list_posts' => $this->ListPosts_statistics(),
    'list_comments' => $this->ListComments_statistics(),
    'list_replies' => $this->ListReplies_statistics(),
    'nbr_posts' => $this->NbrPosts(),
    'nbr_comments' => $this->NbrComments(),
    'nbr_replies' => $this->NbrReplies(),
    'rate_posts_by_section' => $this->RatePostsBySection(),
    'rate_comments_by_post' => $this->RateCommentsByPost(),
    'rate_replies_by_comment' => $this->RateRepliesByComment(),
    'nbr_recent_replies_month' => $this->getStatisticsOfYear_replies(2019),
    'nbr_recent_posts_month' => $this->getStatisticsOfYear_posts(2019),
    'nbr_recent_comments_month' => $this->getStatisticsOfYear_comments(2019),
      ];
      return view('admin.blog.statistics')->with($data);
    }



    public function blogposts(){
      $data=[
        'list_posts' => $this->ListPosts(),
        'list_comments' => $this->ListComments(),
        'list_replies' => $this->ListReplies()
      ];
      return view('admin.blog.posts')->with($data);
    }

    public function deletepost(Request $request){
      $post = post::all()->where('id','=',$request->id)->first();
      $post->delete();
      return redirect()->back();
    }

    public function addpost(){
      return view('admin.blog.addpost');
    }

    public function addsection(){
      return view('admin.blog.addsection');
    }

    public function sections(){
      return view('admin.blog.sections')->with('list_sections',$this->list_sections);
    }

    public function deletecomment(Request $request){
      $comment = comment::all()->where('id','=',$request->comid)->first();
      $comment->delete();
      return redirect()->back();
    }

    public function deletereply(Request $request){
      $reply = reply::all()->where('id','=',$request->replyid)->first();
      $reply->delete();
      return redirect()->back();
    }

    public function modifyreply(Request $request){
      $reply = reply::all()->where('id','=',$request->id)->first();
      $reply->content = $request->content;
      $reply->save();
      return redirect()->back();
    }

    public function modifypost(Request $request){
      $post = post::all()->where('id','=',$request->id)->first();
      $post->title = $request->title;
      $post->section = $request->section;
      $post->content = $request->content;
      $post->rating = $request->rating;
      $post->save();
      return redirect()->back();
    }


    public function deletePostAjax(Request $request){
      $post = post::all()->where('id','=',$request->id)->first();
      $post->delete();
    }

    public function deleteCommentAjax(Request $request){
      $comment = comment::all()->where('id','=',$request->id)->first();
      $comment->delete();
    }

    public function deleteReplyAjax(Request $request){
      $reply = reply::all()->where('id','=',$request->id)->first();
      $reply->delete();
    }

}
