<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
use App\reply;
use App\comment;
use App\community;
use App\reported_comment;
use App\reported_post;
use App\reported_reply;
use Response;
use DB;

class blogdashboard extends Controller
{


    /* Getters */

    public function List_Communities(){
      return community::all();
    }

    public function ListPosts(){
      return post::paginate(50);
    }

    public function ListComments(){
      return comment::paginate(50);
    }

    public function ListReplies(){
      return reply::paginate(50);
    }

    public function ListPostsByRecent(){
      return post::orderBy('created_at','DESC')->paginate(50);
    }

    public function ListPostsByUpvotes(){
      return post::orderBy('upvotes','DESC')->paginate(50);
    }

    public function ListPostsByDownvotes(){
      return post::orderBy('upvotes','ASC')->paginate(50);
    }

    public function ListCommunities(){
      return community::paginate(50);
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

    public function NbrCommunities(){
      return community::selectRaw('count(*) as sum')->get();
    }

    public function RatePostsByCommunity(){
      return $this->NbrPosts()['0']->sum/$this->NbrCommunities()['0']->sum;
    }

    public function RateCommentsByPost(){
      return $this->NbrComments()['0']->sum/$this->NbrPosts()['0']->sum;
    }

    public function RateRepliesByComment(){
      return $this->NbrReplies()['0']->sum/($this->NbrComments()['0']->sum+0.01);
    }

    /* MOST REPORTED AND REPORTING */

    public function MostReportedPosts(){
      return  DB::table('reported_posts')->select(DB::raw('sum(value) as total , post_id'))->groupBy('post_id')->take(5)->get();
    }

    public function MostReportedComments(){
      return  DB::table('reported_comments')->select(DB::raw('sum(value) as total , comment_id'))->groupBy('comment_id')->take(5)->get();
    }

    public function MostReportedReplies(){
      return  DB::table('reported_replies')->select(DB::raw('sum(value) as total , reply_id'))->groupBy('reply_id')->take(5)->get();
    }

    public function MostReportingPosts(){
      return  DB::table('reported_posts')->select(DB::raw('count(*) as nbr , user_id'))->groupBy('user_id')->take(5)->get();
    }

    public function MostReportingComments(){
      return  DB::table('reported_comments')->select(DB::raw('count(*) as nbr , user_id'))->groupBy('user_id')->take(5)->get();
    }

    public function MostReportingReplies(){
      return  DB::table('reported_replies')->select(DB::raw('count(*) as nbr , user_id'))->groupBy('user_id')->take(5)->get();
    }

    /* count of posts comments and replies */
    public function NbrRepliesByCommunity(Request $request){
      $posts = post::select('id')->where('community','=',$request->community)->get();
      $comments = comment::select('id')->whereIn('post_id',$posts)->get();
      $nbr_replies = reply::whereIn('comment_id',$comments)->count();
      return Response::json(array('success'=>true,'nbr_replies' => $nbr_replies,));
    }

    public function NbrRepliesByPost(Request $request){
      $comments = comment::select('id')->where('post_id','=',$request->postid)->get();
      $nbr_replies = reply::whereIn('comment_id',$comments)->count();
      return Response::json(array('success'=>true,'nbr_replies' => $nbr_replies,));
    }

    public function NbrRepliesByComment($id){

    }

    public function NbrCommentsByCommunity($id){

    }

    public function NbrCommentsByPost($id){

    }

    public function NbrPostsByCommunity($id){

    }

    // ARRAYS CONTAINING NUMBER OF POSTS COMMENTS AND REPLIES BY COMMUNITY
    public function ArrayPostsByCommunity(){
      $communities = community::all();
      foreach($communities as $community){
        $nbr[$community->title] = post::where('community','=',$community->title)->count();
      }
      return $nbr;
    }

    public function ArrayCommentsByCommunity(){
      $communities = community::all();
      foreach($communities as $community){
        $posts = post::select('id')->where('community','=',$community->title)->get();
        $nbr[$community->title] = comment::whereIn('post_id',$posts)->count();
      }
      return $nbr;
    }

    public function ArrayRepliesByCommunity(){
      $communities = community::all();
      foreach($communities as $community){
        $posts = post::select('id')->where('community','=',$community->title)->get();
        $comments = comment::select('id')->whereIn('post_id',$posts)->get();
        $nbr[$community->title] = reply::whereIn('comment_id',$comments)->count();
      }
      return $nbr;
    }

    /* STATISTICS BY DAY */
    public function getNumberPostsByDay(Request $request){
      $nbrr = post::all()->where('created_at','=',$request->date)->count();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNumberCommentsByDay(Request $request){
      $nbrr =  comment::all()->where('created_at','=',$request->date)->count();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNumberRepliesByDay(Request $request){
      $nbr = reply::all()->where('created_at','=',$request->date)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    /* STATISTICS BY MONTH */
    public function getNumberPostsByMonth(Request $request){
      $nbrr = post::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$request->month.' and year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNumberCommentsByMonth(Request $request){
      $nbrr = comment::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$request->month.' and year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNumberRepliesByMonth(Request $request){
      $nbrr = reply::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$request->month.' and year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    /* STATISTICS BY  YEAR */
    public function getNumberPostsByYear(Request $request){
      $nbrr = post::selectRaw('count(*) as sum')->whereRaw('year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNumberCommentsByYear(Request $request){
      $nbrr = comment::selectRaw('count(*) as sum')->whereRaw('year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNumberRepliesByYear(Request $request){
      $nbrr = reply::selectRaw('count(*) as sum')->whereRaw('year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
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
    'rate_posts_by_community' => $this->RatePostsByCommunity(),
    'rate_comments_by_post' => $this->RateCommentsByPost(),
    'rate_replies_by_comment' => $this->RateRepliesByComment(),
    'nbr_recent_replies_month' => $this->getStatisticsOfYear_replies(2019),
    'nbr_recent_posts_month' => $this->getStatisticsOfYear_posts(2019),
    'nbr_recent_comments_month' => $this->getStatisticsOfYear_comments(2019),
    'most_reported_posts' => $this->MostReportedPosts(),
    'most_reported_comments' => $this->MostReportedComments(),
    'most_reported_replies' => $this->MostReportedReplies(),
    'posts_mru' => $this->MostReportingPosts(),
    'comments_mru' => $this->MostReportingComments(),
    'replies_mru' => $this->MostReportingReplies(),
    'list_communities' => $this->List_Communities(),
    'posts_by_community_array' => $this->ArrayPostsByCommunity(),
    'comments_by_community_array' => $this->ArrayCommentsByCommunity(),
    'replies_by_community_array' => $this->ArrayRepliesByCommunity(),
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

    public function blogPostsByUpvotes(){
        $data=[
          'list_posts' => $this->ListPostsByUpvotes(),
          'list_comments' => $this->ListComments(),
          'list_replies' => $this->ListReplies()
        ];
        return view('admin.blog.posts')->with($data);
    }

    public function blogPostsByDownvotes(){
        $data=[
          'list_posts' => $this->ListPostsByDownvotes(),
          'list_comments' => $this->ListComments(),
          'list_replies' => $this->ListReplies()
        ];
        return view('admin.blog.posts')->with($data);
    }

    public function blogPostsByRecent(){
        $data=[
          'list_posts' => $this->ListPostsByRecent(),
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

    public function addcommunity(){
      return view('admin.blog.addcommunity');
    }

    public function communities(){
      return view('admin.blog.communities')->with('list_communities',$this->ListCommunities());
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
      $post->community = $request->community;
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

    public function searchCommunities(Request $request){
      $communities = community::where('title','like',$request->title.'%')->take(10)->get();
      return Response::json(array('success'=>true,'communities' => $communities,));
    }

    public function searchPosts(Request $request){
      $posts = post::where('title','like',$request->title.'%')->take(10)->get();
      return Response::json(array('success'=>true,'posts' => $posts,));
    }

    //FUNCTIONS ROUTING TO REPORTED POSTS COMMENTS AND REPLIES BY SOME USER
    public function reportedPosts($userid){
      $posts = post::where('user_id','=',$userid)->get();
      $data = [
        'list_posts' => $posts,
        'user_id' => $userid,
      ];
      return view('admin.blog.listing_reported.reportedposts')->with($data);
    }

    public function reportedComments($userid){
      $comments = comment::where('user_id','=',$userid)->get();
      $data = [
        'list_comments' => $comments,
        'user_id' => $userid,
      ];
      return view('admin.blog.listing_reported.reportedcomments')->with($data);
    }

    public function reportedReplies($userid){
      $replies = reply::where('user_id','=',$userid)->get();
      $data = [
        'list_replies' => $replies,
        'user_id' => $userid,
      ];
      return view('admin.blog.listing_reported.reportedreplies')->with($data);
    }

}
