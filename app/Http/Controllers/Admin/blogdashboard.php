<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
use App\reply;
use App\comment;

class blogdashboard extends Controller
{
    /* Blog posts comments and replies */

    // Posts list

    protected $list_posts;

    // Comments List

    protected $list_comments;

    // Replies List

    protected $list_replies;

    // Number Of Posts

    protected $nbr_posts;

    // Number Of Comments

    protected $nbr_comments;

    // Number of Replies

    protected $nbr_replies;

    // number of posts Last Day

    protected $nbr_posts_last_day;

    // number of posts last week

    protected $nbr_posts_last_week;

    // number of posts last month

    protected $nbr_posts_last_month;

    // number of posts last year

    protected $nbr_posts_last_year;

    // number of comments Last Day

    protected $nbr_comments_last_day;

    // number of comments last week

    protected $nbr_comments_last_week;

    // number of comments last month

    protected $nbr_comments_last_month;

    // number of comments last year

    protected $nbr_comments_last_year;

    // number of replies Last Day

    protected $nbr_replies_last_day;

    // number of replies last week

    protected $nbr_replies_last_week;

    // number of replies last month

    protected $nbr_replies_last_month;

    // number of replies last year

    protected $nbr_replies_last_year;

    // number of posts last 2nd month

    protected $nbr_posts_2nd_month;

    // number of posts last 3rd month

    protected $nbr_posts_3rd_month;

    // number of posts last 4th month

    protected $nbr_posts_4th_month;

    // number of posts last 5th month

    protected $nbr_posts_5th_month;

    // number of posts last 6th month

    protected $nbr_posts_6th_month;

    // number of posts last 7th month

    protected $nbr_posts_7th_month;

    // number of posts last 8th month

    protected $nbr_posts_8th_month;

    // number of posts last 9th month

    protected $nbr_posts_9th_month;

    // number of posts last 10th month

    protected $nbr_posts_10th_month;

    // number of posts last 11th month

    protected $nbr_posts_11th_month;

    // number of posts last 12th month

    protected $nbr_posts_12th_month;

    // number of comments last 2nd month

    protected $nbr_comments_2nd_month;

    // number of comments last 3rd month

    protected $nbr_comments_3rd_month;

    // number of comments last 4th month

    protected $nbr_comments_4th_month;

    // number of comments last 5th month

    protected $nbr_comments_5th_month;

    // number of comments last 6th month

    protected $nbr_comments_6th_month;

    // number of comments last 7th month

    protected $nbr_comments_7th_month;

    // number of comments last 8th month

    protected $nbr_comments_8th_month;

    // number of comments last 9th month

    protected $nbr_comments_9th_month;

    // number of comments last 10th month

    protected $nbr_comments_10th_month;

    // number of comments last 11th month

    protected $nbr_comments_11th_month;

    // number of comments last 12th month

    protected $nbr_comments_12th_month;

    // number replies last 2nd month

    protected $nbr_replies_2nd_month;

    // number replies last 3rd month

    protected $nbr_replies_3rd_month;

    // number replies last 4th month

    protected $nbr_replies_4th_month;

    // number replies last 5th month

    protected $nbr_replies_5th_month;

    // number replies last 6th month

    protected $nbr_replies_6th_month;

    // number replies last 7th month

    protected $nbr_replies_7th_month;

    // number replies last 8th month

    protected $nbr_replies_8th_month;

    // number replies last 9th month

    protected $nbr_replies_9th_month;

    // number replies last 10th month

    protected $nbr_replies_10th_month;

    // number replies last 11th month

    protected $nbr_replies_11th_month;

    // number replies last 12th month

    protected $nbr_replies_12th_month;






    /* Statistics by Sections */




    public function __construct(){
      $this->list_posts= post::all();
      $this->list_comments = comment::all();
      $this->list_replies = reply::all();
      $this->nbr_posts = post::all()->count();
      $this->nbr_comments = comment::all()->count();
      $this->nbr_replies = reply::all()->count();
      $this->nbr_posts_last_day = post::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count();
      $this->nbr_posts_last_week = post::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count();
      $this->nbr_posts_last_month = post::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count();
      $this->nbr_posts_last_year = post::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count();
      $this->nbr_comments_last_day = comment::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count();
      $this->nbr_comments_last_week = comment::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count();
      $this->nbr_comments_last_month = comment::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count();
      $this->nbr_comments_last_year = comment::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count();
      $this->nbr_replies_last_day = reply::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count();
      $this->nbr_replies_last_week = reply::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count();
      $this->nbr_replies_last_month = reply::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count();
      $this->nbr_replies_last_year = reply::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count();
      $this->nbr_posts_2nd_month = post::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count();
      $this->nbr_posts_3rd_month = post::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count();
      $this->nbr_posts_4th_month = post::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count();
      $this->nbr_posts_5th_month = post::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count();
      $this->nbr_posts_6th_month = post::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count();
      $this->nbr_posts_7th_month = post::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count();
      $this->nbr_posts_8th_month = post::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count();
      $this->nbr_posts_9th_month = post::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count();
      $this->nbr_posts_10th_month = post::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count();
      $this->nbr_posts_11th_month = post::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count();
      $this->nbr_posts_12th_month = post::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count();
      $this->nbr_comments_2nd_month = comment::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count();
      $this->nbr_comments_3rd_month = comment::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count();
      $this->nbr_comments_4th_month = comment::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count();
      $this->nbr_comments_5th_month = comment::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count();
      $this->nbr_comments_6th_month = comment::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count();
      $this->nbr_comments_7th_month = comment::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count();
      $this->nbr_comments_8th_month = comment::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count();
      $this->nbr_comments_9th_month = comment::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count();
      $this->nbr_comments_10th_month = comment::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count();
      $this->nbr_comments_11th_month = comment::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count();
      $this->nbr_comments_12th_month = comment::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count();
      $this->nbr_replies_2nd_month = reply::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count();
      $this->nbr_replies_3rd_month = reply::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count();
      $this->nbr_replies_4th_month = reply::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count();
      $this->nbr_replies_5th_month = reply::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count();
      $this->nbr_replies_6th_month = reply::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count();
      $this->nbr_replies_7th_month = reply::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count();
      $this->nbr_replies_8th_month = reply::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count();
      $this->nbr_replies_9th_month = reply::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count();
      $this->nbr_replies_10th_month = reply::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count();
      $this->nbr_replies_11th_month = reply::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count();
      $this->nbr_replies_12th_month = reply::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count();
    }




    public function statistics(){
      $data = [
        'list_posts' => $this->list_posts,
    'list_comments' => $this->list_comments,
    'list_replies' => $this->list_replies,
    'nbr_posts' => $this->nbr_posts,
    'nbr_comments' => $this->nbr_comments,
    'nbr_replies' => $this->nbr_replies,
    'nbr_posts_last_day' => $this->nbr_posts_last_day,
    'nbr_posts_last_week' => $this->nbr_posts_last_week,
    'nbr_posts_last_month' => $this->nbr_posts_last_month,
    'nbr_posts_last_year' => $this->nbr_posts_last_year,
    'nbr_comments_last_day' => $this->nbr_comments_last_day,
    'nbr_comments_last_week' => $this->nbr_comments_last_week,
    'nbr_comments_last_month' => $this->nbr_comments_last_month,
    'nbr_comments_last_year' => $this->nbr_comments_last_year,
    'nbr_replies_last_day' => $this->nbr_replies_last_day,
    'nbr_replies_last_week' => $this->nbr_replies_last_week,
    'nbr_replies_last_month' => $this->nbr_replies_last_month,
    'nbr_replies_last_year' => $this->nbr_replies_last_year,
    'nbr_posts_2nd_month' => $this->nbr_posts_2nd_month,
    'nbr_posts_3rd_month' => $this->nbr_posts_3rd_month,
    'nbr_posts_4th_month' => $this->nbr_posts_4th_month,
    'nbr_posts_5th_month' => $this->nbr_posts_5th_month,
    'nbr_posts_6th_month' => $this->nbr_posts_6th_month,
    'nbr_posts_7th_month' => $this->nbr_posts_7th_month,
    'nbr_posts_8th_month' => $this->nbr_posts_8th_month,
    'nbr_posts_9th_month' => $this->nbr_posts_9th_month,
    'nbr_posts_10th_month' => $this->nbr_posts_10th_month,
    'nbr_posts_11th_month' => $this->nbr_posts_11th_month,
    'nbr_posts_12th_month' => $this->nbr_posts_12th_month,
    'nbr_comments_2nd_month' => $this->nbr_comments_2nd_month,
    'nbr_comments_3rd_month' => $this->nbr_comments_3rd_month,
    'nbr_comments_4th_month' => $this->nbr_comments_4th_month,
    'nbr_comments_5th_month' => $this->nbr_comments_5th_month,
    'nbr_comments_6th_month' => $this->nbr_comments_6th_month,
    'nbr_comments_7th_month' => $this->nbr_comments_7th_month,
    'nbr_comments_8th_month' => $this->nbr_comments_8th_month,
    'nbr_comments_9th_month' => $this->nbr_comments_9th_month,
    'nbr_comments_10th_month' => $this->nbr_comments_10th_month,
    'nbr_comments_11th_month' => $this->nbr_comments_11th_month,
    'nbr_comments_12th_month' => $this->nbr_comments_12th_month,
    'nbr_replies_2nd_month' => $this->nbr_replies_2nd_month,
    'nbr_replies_3rd_month' => $this->nbr_replies_3rd_month,
    'nbr_replies_4th_month' => $this->nbr_replies_4th_month,
    'nbr_replies_5th_month' => $this->nbr_replies_5th_month,
    'nbr_replies_6th_month' => $this->nbr_replies_6th_month,
    'nbr_replies_7th_month' => $this->nbr_replies_7th_month,
    'nbr_replies_8th_month' => $this->nbr_replies_8th_month,
    'nbr_replies_9th_month' => $this->nbr_replies_9th_month,
    'nbr_replies_10th_month' => $this->nbr_replies_10th_month,
    'nbr_replies_11th_month' => $this->nbr_replies_11th_month,
    'nbr_replies_12th_month' => $this->nbr_replies_12th_month,
      ];
      return view('admin.blog.statistics')->with($data);
    }



}
