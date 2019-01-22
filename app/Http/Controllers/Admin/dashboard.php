<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\todolist;

class dashboard extends Controller
{


    /* USER STATS */

    // number of users

    // number of subscribed users last month

    // number of subscribed users last week

    // number of subscribed users last year

    // number of subscribed users last 15 days

    // number of admins

    // number of blog moderators

    // number of editors

    // number of encyclopedia moderators

    // number of market moderators

    // number of services moderators





    public function __construct(){

    }



    public function index(){
      $list_tasks = todolist::all();
      return view('admin.dashboard')->with('list_tasks' , $list_tasks);
    }

    public function users(){
      return view('admin.users');
    }

    public function statistics(){
      return view('admin.statistics');
    }

    public function blogindex(){
      return view('admin.blog.dashboard');
    }

    public function commentsreplies(){
      return view('admin.blog.comments_replies');
    }

    public function blogstatistics(){
      return view('admin.blog.statistics');
    }

    public function blogposts(){
      return view('admin.blog.posts');
    }

    public function blogmoderators(){
      return view('admin.blog.moderators');
    }

    public function encyclopediadashboard(){
      return view('admin.encyclopedia.dashboard');
    }

    public function encyclopediamoderators(){
      return view('admin.encyclopedia.moderators');
    }

    public function editors(){
      return view('admin.encyclopedia.editors');
    }



    public function articles(){
      return view('admin.encyclopedia.articles');
    }

    public function marketindex(){
      return view('admin.markets.dashboard');
    }


}
