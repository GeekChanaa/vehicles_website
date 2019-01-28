<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\new_carpart_article;
use App\new_vehicle_article;
use App\used_carpart_article;
use App\used_vehicle_article;

class marketdashboard extends Controller
{
    /* Lists Needed */

    //list new car parts

    protected $list_ncp;

    //list used car parts

    protected $list_ucp;

    //list used vehicles

    protected $list_uv;

    //list new vehicles

    protected $list_nv;

    /* Market Stats */

    //number of newcarpart articles

    protected $nbr_ncp_articles;

    //number of usedcarparts articles

    protected $nbr_ucp_articles;

    //number of usedvehicles articles

    protected $nbr_uv_articles;

    //number of newvehicles articles

    protected $nbr_nv_articles;

    /* New Vehicle Articles Stats */

    // nbr of recent articles today

    protected $nbr_recent_nv_today;

    // nbr of recent articles last week

    protected $nbr_recent_nv_last_week;

    // nbr of recent articles last month

    protected $nbr_recent_nv_last_month;

    // nbr of recent articles last year

    protected $nbr_recent_nv_last_year;

    // nbr of recent articles last 2nd month

    protected $nbr_recent_nv_last_2nd_month;

    // nbr of recent articles last 3rd month

    protected $nbr_recent_nv_last_3rd_month;

    // nbr of recent articles last 4th month

    protected $nbr_recent_nv_last_4th_month;

    // nbr of recent articles last 5th month

    protected $nbr_recent_nv_last_5th_month;

    // nbr of recent articles last 6th month

    protected $nbr_recent_nv_last_6th_month;

    // nbr of recent articles last 7th month

    protected $nbr_recent_nv_last_7th_month;

    // nbr of recent articles last 8th month

    protected $nbr_recent_nv_last_8th_month;

    // nbr of recent articles last 9th month

    protected $nbr_recent_nv_last_9th_month;

    // nbr of recent articles last 10th month

    protected $nbr_recent_nv_last_10th_month;

    // nbr of recent articles last 11th month

    protected $nbr_recent_nv_last_11th_month;

    // nbr of recent articles last 12th month

    protected $nbr_recent_nv_last_12th_month;

    /* Used vehicle articles */

    // nbr of recent articles today

    protected $nbr_recent_uv_today;

    // nbr of recent articles last week

    protected $nbr_recent_uv_last_week;

    // nbr of recent articles last month

    protected $nbr_recent_uv_last_month;

    // nbr of recent articles last year

    protected $nbr_recent_uv_last_year;

    // nbr of recent articles last 2nd month

    protected $nbr_recent_uv_last_2nd_month;

    // nbr of recent articles last 3rd month

    protected $nbr_recent_uv_last_3rd_month;

    // nbr of recent articles last 4th month

    protected $nbr_recent_uv_last_4th_month;

    // nbr of recent articles last 5th month

    protected $nbr_recent_uv_last_5th_month;

    // nbr of recent articles last 6th month

    protected $nbr_recent_uv_last_6th_month;

    // nbr of recent articles last 7th month

    protected $nbr_recent_uv_last_7th_month;

    // nbr of recent articles last 8th month

    protected $nbr_recent_uv_last_8th_month;

    // nbr of recent articles last 9th month

    protected $nbr_recent_uv_last_9th_month;

    // nbr of recent articles last 10th month

    protected $nbr_recent_uv_last_10th_month;

    // nbr of recent articles last 11th month

    protected $nbr_recent_uv_last_11th_month;

    // nbr of recent articles last 12th month

    protected $nbr_recent_uv_last_12th_month;

    /* New carpart articles */

    // nbr of recent articles today

    protected $nbr_recent_ncp_today;

    // nbr of recent articles last week

    protected $nbr_recent_ncp_last_week;

    // nbr of recent articles last month

    protected $nbr_recent_ncp_last_month;

    // nbr of recent articles last year

    protected $nbr_recent_ncp_last_year;

    // nbr of recent articles last 2nd month

    protected $nbr_recent_ncp_last_2nd_month;

    // nbr of recent articles last 3rd month

    protected $nbr_recent_ncp_last_3rd_month;

    // nbr of recent articles last 4th month

    protected $nbr_recent_ncp_last_4th_month;

    // nbr of recent articles last 5th month

    protected $nbr_recent_ncp_last_5th_month;

    // nbr of recent articles last 6th month

    protected $nbr_recent_ncp_last_6th_month;

    // nbr of recent articles last 7th month

    protected $nbr_recent_ncp_last_7th_month;

    // nbr of recent articles last 8th month

    protected $nbr_recent_ncp_last_8th_month;

    // nbr of recent articles last 9th month

    protected $nbr_recent_ncp_last_9th_month;

    // nbr of recent articles last 10th month

    protected $nbr_recent_ncp_last_10th_month;

    // nbr of recent articles last 11th month

    protected $nbr_recent_ncp_last_11th_month;

    // nbr of recent articles last 12th month

    protected $nbr_recent_ncp_last_12th_month;

    /* Used Carpart Articles */

    // nbr of recent articles today

    protected $nbr_recent_ucp_today;

    // nbr of recent articles last week

    protected $nbr_recent_ucp_last_week;

    // nbr of recent articles last month

    protected $nbr_recent_ucp_last_month;

    // nbr of recent articles last year

    protected $nbr_recent_ucp_last_year;

    // nbr of recent articles last 2nd month

    protected $nbr_recent_ucp_last_2nd_month;

    // nbr of recent articles last 3rd month

    protected $nbr_recent_ucp_last_3rd_month;

    // nbr of recent articles last 4th month

    protected $nbr_recent_ucp_last_4th_month;

    // nbr of recent articles last 5th month

    protected $nbr_recent_ucp_last_5th_month;

    // nbr of recent articles last 6th month

    protected $nbr_recent_ucp_last_6th_month;

    // nbr of recent articles last 7th month

    protected $nbr_recent_ucp_last_7th_month;

    // nbr of recent articles last 8th month

    protected $nbr_recent_ucp_last_8th_month;

    // nbr of recent articles last 9th month

    protected $nbr_recent_ucp_last_9th_month;

    // nbr of recent articles last 10th month

    protected $nbr_recent_ucp_last_10th_month;

    // nbr of recent articles last 11th month

    protected $nbr_recent_ucp_last_11th_month;

    // nbr of recent articles last 12th month

    protected $nbr_recent_ucp_last_12th_month;

    public function __construct(){
  $this->list_ncp = new_carpart_article::all() ;
  $this->list_ucp = used_carpart_article::all() ;
  $this->list_uv = used_vehicle_article::all();
  $this->list_nv = new_vehicle_article::all();
  $this->nbr_ncp_articles = new_carpart_article::all()->count();
  $this->nbr_ucp_articles = used_carpart_article::all()->count();
  $this->nbr_uv_articles = used_vehicle_article::all()->count();
  $this->nbr_nv_articles = new_vehicle_article::all()->count();
  $this->nbr_recent_nv_today = new_vehicle_article::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count();
  $this->nbr_recent_nv_last_week = new_vehicle_article::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count();
  $this->nbr_recent_nv_last_month = new_vehicle_article::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count();
  $this->nbr_recent_nv_last_year = new_vehicle_article::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count();
  $this->nbr_recent_nv_last_2nd_month = new_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count();
  $this->nbr_recent_nv_last_3rd_month = new_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count();
  $this->nbr_recent_nv_last_4th_month = new_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count();
  $this->nbr_recent_nv_last_5th_month = new_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count();
  $this->nbr_recent_nv_last_6th_month = new_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count();
  $this->nbr_recent_nv_last_7th_month = new_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count();
  $this->nbr_recent_nv_last_8th_month = new_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count();
  $this->nbr_recent_nv_last_9th_month = new_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count();
  $this->nbr_recent_nv_last_10th_month = new_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count();
  $this->nbr_recent_nv_last_11th_month = new_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count();
  $this->nbr_recent_nv_last_12th_month = new_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count();
  $this->nbr_recent_uv_today = used_vehicle_article::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count() ;
  $this->nbr_recent_uv_last_week = used_vehicle_article::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count() ;
  $this->nbr_recent_uv_last_month = used_vehicle_article::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count() ;
  $this->nbr_recent_uv_last_year = used_vehicle_article::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count() ;
  $this->nbr_recent_uv_last_2nd_month =  used_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count();
  $this->nbr_recent_uv_last_3rd_month =  used_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count();
  $this->nbr_recent_uv_last_4th_month =  used_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count();
  $this->nbr_recent_uv_last_5th_month =  used_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count();
  $this->nbr_recent_uv_last_6th_month =  used_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count();
  $this->nbr_recent_uv_last_7th_month =  used_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count();
  $this->nbr_recent_uv_last_8th_month =  used_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count();
  $this->nbr_recent_uv_last_9th_month =  used_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count();
  $this->nbr_recent_uv_last_10th_month =  used_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count();
  $this->nbr_recent_uv_last_11th_month =  used_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count();
  $this->nbr_recent_uv_last_12th_month =  used_vehicle_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count();
  $this->nbr_recent_ncp_today =new_carpart_article::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count() ;
  $this->nbr_recent_ncp_last_week =new_carpart_article::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count() ;
  $this->nbr_recent_ncp_last_month =new_carpart_article::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count() ;
  $this->nbr_recent_ncp_last_year =new_carpart_article::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count() ;
  $this->nbr_recent_ncp_last_2nd_month =  new_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count();
  $this->nbr_recent_ncp_last_3rd_month =  new_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count();
  $this->nbr_recent_ncp_last_4th_month =  new_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count();
  $this->nbr_recent_ncp_last_5th_month =  new_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count();
  $this->nbr_recent_ncp_last_6th_month =  new_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count();
  $this->nbr_recent_ncp_last_7th_month =  new_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count();
  $this->nbr_recent_ncp_last_8th_month =  new_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count();
  $this->nbr_recent_ncp_last_9th_month =  new_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count();
  $this->nbr_recent_ncp_last_10th_month =  new_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count();
  $this->nbr_recent_ncp_last_11th_month =  new_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count();
  $this->nbr_recent_ncp_last_12th_month =  new_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count();
  $this->nbr_recent_ucp_today = used_carpart_article::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count();
  $this->nbr_recent_ucp_last_week = used_carpart_article::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count();
  $this->nbr_recent_ucp_last_month = used_carpart_article::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count();
  $this->nbr_recent_ucp_last_year = used_carpart_article::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count();
  $this->nbr_recent_ucp_last_2nd_month =  used_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count();
  $this->nbr_recent_ucp_last_3rd_month =  used_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count();
  $this->nbr_recent_ucp_last_4th_month =  used_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count();
  $this->nbr_recent_ucp_last_5th_month =  used_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count();
  $this->nbr_recent_ucp_last_6th_month =  used_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count();
  $this->nbr_recent_ucp_last_7th_month =  used_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count();
  $this->nbr_recent_ucp_last_8th_month =  used_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count();
  $this->nbr_recent_ucp_last_9th_month =  used_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count();
  $this->nbr_recent_ucp_last_10th_month =  used_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count();
  $this->nbr_recent_ucp_last_11th_month =  used_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count();
  $this->nbr_recent_ucp_last_12th_month =  used_carpart_article::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count();
    }

    public function newcarpartsdashboard(){
      return view('admin.markets.newcarparts');
    }

    public function newvehiclesdashboard(){
      return view('admin.markets.newvehicles');
    }

    public function usedcarpartsdashboard(){
      return view('admin.markets.usedcarparts');
    }

    public function usedvehiclesdashboard(){
      return view('admin.markets.usedvehicles');
    }

    public function statistics(){
      $data = [
      'list_ncp' => $this->list_ncp,
      'list_ucp' => $this->list_ucp,
      'list_uv' => $this->list_uv,
      'list_nv' => $this->list_nv,
      'nbr_ncp_articles' => $this->nbr_ncp_articles,
      'nbr_ucp_articles' => $this->nbr_ucp_articles,
      'nbr_uv_articles' => $this->nbr_uv_articles,
      'nbr_nv_articles' => $this->nbr_nv_articles,
      'nbr_recent_nv_today' => $this->nbr_recent_nv_today,
      'nbr_recent_nv_last_week' => $this->nbr_recent_nv_last_week,
      'nbr_recent_nv_last_month' => $this->nbr_recent_nv_last_month,
      'nbr_recent_nv_last_year' => $this->nbr_recent_nv_last_year,
      'nbr_recent_nv_last_2nd_month' => $this->nbr_recent_nv_last_2nd_month,
      'nbr_recent_nv_last_3rd_month' => $this->nbr_recent_nv_last_3rd_month,
      'nbr_recent_nv_last_4th_month' => $this->nbr_recent_nv_last_4th_month,
      'nbr_recent_nv_last_5th_month' => $this->nbr_recent_nv_last_5th_month,
      'nbr_recent_nv_last_6th_month' => $this->nbr_recent_nv_last_6th_month,
      'nbr_recent_nv_last_7th_month' => $this->nbr_recent_nv_last_7th_month,
      'nbr_recent_nv_last_8th_month' => $this->nbr_recent_nv_last_8th_month,
      'nbr_recent_nv_last_9th_month' => $this->nbr_recent_nv_last_9th_month,
      'nbr_recent_nv_last_10th_month' => $this->nbr_recent_nv_last_10th_month,
      'nbr_recent_nv_last_11th_month' => $this->nbr_recent_nv_last_11th_month,
      'nbr_recent_nv_last_12th_month' => $this->nbr_recent_nv_last_12th_month,
      'nbr_recent_uv_today' => $this->nbr_recent_uv_today,
      'nbr_recent_uv_last_week' => $this->nbr_recent_uv_last_week,
      'nbr_recent_uv_last_month' => $this->nbr_recent_uv_last_month,
      'nbr_recent_uv_last_year' => $this->nbr_recent_uv_last_year,
      'nbr_recent_uv_last_2nd_month' => $this->nbr_recent_uv_last_2nd_month,
      'nbr_recent_uv_last_3rd_month' => $this->nbr_recent_uv_last_3rd_month,
      'nbr_recent_uv_last_4th_month' => $this->nbr_recent_uv_last_4th_month,
      'nbr_recent_uv_last_5th_month' => $this->nbr_recent_uv_last_5th_month,
      'nbr_recent_uv_last_6th_month' => $this->nbr_recent_uv_last_6th_month,
      'nbr_recent_uv_last_7th_month' => $this->nbr_recent_uv_last_7th_month,
      'nbr_recent_uv_last_8th_month' => $this->nbr_recent_uv_last_8th_month,
      'nbr_recent_uv_last_9th_month' => $this->nbr_recent_uv_last_9th_month,
      'nbr_recent_uv_last_10th_month' => $this->nbr_recent_uv_last_10th_month,
      'nbr_recent_uv_last_11th_month' => $this->nbr_recent_uv_last_11th_month,
      'nbr_recent_uv_last_12th_month' => $this->nbr_recent_uv_last_12th_month,
      'nbr_recent_ncp_today' => $this->nbr_recent_ncp_today,
      'nbr_recent_ncp_last_week' => $this->nbr_recent_ncp_last_week,
      'nbr_recent_ncp_last_month' => $this->nbr_recent_ncp_last_month,
      'nbr_recent_ncp_last_year' => $this->nbr_recent_ncp_last_year,
      'nbr_recent_ncp_last_2nd_month' => $this->nbr_recent_ncp_last_2nd_month,
      'nbr_recent_ncp_last_3rd_month' => $this->nbr_recent_ncp_last_3rd_month,
      'nbr_recent_ncp_last_4th_month' => $this->nbr_recent_ncp_last_4th_month,
      'nbr_recent_ncp_last_5th_month' => $this->nbr_recent_ncp_last_5th_month,
      'nbr_recent_ncp_last_6th_month' => $this->nbr_recent_ncp_last_6th_month,
      'nbr_recent_ncp_last_7th_month' => $this->nbr_recent_ncp_last_7th_month,
      'nbr_recent_ncp_last_8th_month' => $this->nbr_recent_ncp_last_8th_month,
      'nbr_recent_ncp_last_9th_month' => $this->nbr_recent_ncp_last_9th_month,
      'nbr_recent_ncp_last_10th_month' => $this->nbr_recent_ncp_last_10th_month,
      'nbr_recent_ncp_last_11th_month' => $this->nbr_recent_ncp_last_11th_month,
      'nbr_recent_ncp_last_12th_month' => $this->nbr_recent_ncp_last_12th_month,
      'nbr_recent_ucp_today' => $this->nbr_recent_ucp_today,
      'nbr_recent_ucp_last_week' => $this->nbr_recent_ucp_last_week,
      'nbr_recent_ucp_last_month' => $this->nbr_recent_ucp_last_month,
      'nbr_recent_ucp_last_year' => $this->nbr_recent_ucp_last_year,
      'nbr_recent_ucp_last_2nd_month' => $this->nbr_recent_ucp_last_2nd_month,
      'nbr_recent_ucp_last_3rd_month' => $this->nbr_recent_ucp_last_3rd_month,
      'nbr_recent_ucp_last_4th_month' => $this->nbr_recent_ucp_last_4th_month,
      'nbr_recent_ucp_last_5th_month' => $this->nbr_recent_ucp_last_5th_month,
      'nbr_recent_ucp_last_6th_month' => $this->nbr_recent_ucp_last_6th_month,
      'nbr_recent_ucp_last_7th_month' => $this->nbr_recent_ucp_last_7th_month,
      'nbr_recent_ucp_last_8th_month' => $this->nbr_recent_ucp_last_8th_month,
      'nbr_recent_ucp_last_9th_month' => $this->nbr_recent_ucp_last_9th_month,
      'nbr_recent_ucp_last_10th_month' => $this->nbr_recent_ucp_last_10th_month,
      'nbr_recent_ucp_last_11th_month' => $this->nbr_recent_ucp_last_11th_month,
      'nbr_recent_ucp_last_12th_month' => $this->nbr_recent_ucp_last_12th_month
      ];
      return view('admin.markets.statistics')->with($data);
    }
}
