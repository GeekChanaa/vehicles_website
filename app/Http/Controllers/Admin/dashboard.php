<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\todolist;
use App\User;
use Auth;

class dashboard extends Controller
{


    // List of users

    protected $list_users;

    // List of Admins

    protected $list_admins;

    // List of blog moderators

    protected $list_blog_moderators;

    // List of encyclopedia moderators

    protected $list_encyclopedia_moderators;

    // List of market moderators

    protected $list_market_moderators;

    // List of services moderators

    protected $list_services_moderators;

    /* USER STATS */

    // number of users

    protected $nbr_users ;

    // number of blog moderators

    protected $nbr_blogm ;

    // number of encyclopedia moderators

    protected $nbr_encyclopediam ;

    // number of market moderators

    protected $nbr_marketm ;

    // number of admins

    protected $nbr_admins ;

    // number of recent users today

    protected $nbr_recent_users_today ;

    // number of recent users last week

    protected $nbr_recent_users_last_week ;

    //number of recent users last month

    protected $nbr_recent_users_last_month ;

    //number of recent users last second month

    protected $nbr_recent_users_last_2nd_month;

    //number of recent users last third month

    protected $nbr_recent_users_last_3rd_month;

    //number of recent users last forth month

    protected $nbr_recent_users_last_4th_month;

    //number of recent users last fifth month

    protected $nbr_recent_users_last_5th_month;

    //number of recent users last sixth month

    protected $nbr_recent_users_last_6th_month;

    //number of recent users last seventh month

    protected $nbr_recent_users_last_7th_month;

    //number of recent users last eighth month

    protected $nbr_recent_users_last_8th_month;

    //number of recent users last nineth month

    protected $nbr_recent_users_last_9th_month;

    //number of recent users last tenth month

    protected $nbr_recent_users_last_10th_month;

    //number of recent users last eleventh month

    protected $nbr_recent_users_last_11th_month;

    //number of recent users last twelveth month

    protected $nbr_recent_users_last_12th_month;

    //number of recent users last year

    protected $nbr_recent_users_last_year ;

    //number of carwash owners

    protected $nbr_carwash_owners;

    //number of workshop owners

    protected $nbr_workshop_owners;



    public function __construct(){

      $this->list_users = user::all();

      $this->list_admins = user::all()->where('rank' , '=' , 'admin') ;

      $this->list_blog_moderators = user::all()->where('rank' , '=' , 'blogm') ;

      $this->list_encyclopedia_moderators = user::all()->where('rank' , '=' , 'encyclopediam') ;

      $this->list_market_moderators = user::all()->where('rank' , '=' , 'marketm');

      $this->list_services_moderators = user::all()->where('rank' , '=' , 'servicesm');

      $this->nbr_users = user::all()->count() ;

      $this->nbr_blogm = user::all()->where('rank' , '=' , 'blogm')->count();

      $this->nbr_encyclopediam = user::all()->where('rank' , '=' , 'encyclopediam')->count();

      $this->nbr_marketm = user::all()->where('rank', '=' ,'marketm')->count();

      $this->nbr_admins = user::all()->where('rank' , '=' , 'admin')->count();

      $this->nbr_recent_users_today = user::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count();

      $this->nbr_recent_users_last_week = user::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count();

      $this->nbr_recent_users_last_month = user::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count();

      $this->nbr_recent_users_last_2nd_month = user::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count();

      $this->nbr_recent_users_last_3rd_month = user::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count();

      $this->nbr_recent_users_last_4th_month = user::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count();

      $this->nbr_recent_users_last_5th_month = user::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count();

      $this->nbr_recent_users_last_6th_month = user::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count();

      $this->nbr_recent_users_last_7th_month = user::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count();

      $this->nbr_recent_users_last_8th_month = user::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count();

      $this->nbr_recent_users_last_9th_month = user::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count();

      $this->nbr_recent_users_last_10th_month = user::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count();

      $this->nbr_recent_users_last_11th_month = user::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count();

      $this->nbr_recent_users_last_12th_month = user::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count();

      $this->nbr_recent_users_last_year = user::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count();

      $this->nbr_carwash_owners = user::all()->where('rank','=','carwashowner');

      $this->nbr_workshop_owners = user::all()->where('rank','=','workshopowner');

    }

    // function number of users in a country
    public function NumberUsersInCountry($country){
      $nbr_users = User::all()->where('country','=',$country)->count();
      return $nbr_users;
    }

    // Table Of Number of users by country
    public function NumberUsersEveryCountry(){
      $list_countries = User::select('country')->distinct()->get();
      foreach($list_countries as $country){
              $nbr_users[$country['country']] = $this->NumberUsersInCountry($country['country']);
      }
      return $nbr_users;
    }

    public function index(){
      $nbr_users_by_country = $this->NumberUsersEveryCountry();
      $list_tasks = todolist::all();
      $list_done_tasks = todolist::all()->where('state','=','done');
      $list_undone_tasks = todolist::all()->where('state','=','undone');
      $data=[
        'nbr_users_by_country' => $nbr_users_by_country,
        'list_tasks' => $list_tasks,
        'list_done_tasks' => $list_done_tasks,
        'list_undone_tasks' => $list_undone_tasks,
      ];
      return view('admin.dashboard')->with($data);
    }

    public function users(){
      $data = [
    'list_users' => $this->list_users ,
    'list_admins' => $this->list_admins ,
    'list_blog_moderators' => $this->list_blog_moderators ,
    'list_encyclopedia_moderators' => $this->list_encyclopedia_moderators ,
    'list_market_moderators' => $this->list_market_moderators ,
    'list_services_moderators' => $this->list_services_moderators ,
    'nbr_users' => $this->nbr_users ,
    'nbr_blogm' => $this->nbr_blogm ,
    'nbr_encyclopediam' => $this->nbr_encyclopediam ,
    'nbr_marketm' => $this->nbr_marketm ,
    'nbr_admins' => $this->nbr_admins ,
    'nbr_recent_users_today' => $this->nbr_recent_users_today ,
    'nbr_recent_users_last_week' => $this->nbr_recent_users_last_week ,
    'nbr_recent_users_last_month' => $this->nbr_recent_users_last_month ,
    'nbr_recent_users_last_2nd_month' => $this->nbr_recent_users_last_2nd_month ,
    'nbr_recent_users_last_3rd_month' => $this->nbr_recent_users_last_3rd_month ,
    'nbr_recent_users_last_4th_month' => $this->nbr_recent_users_last_4th_month ,
    'nbr_recent_users_last_5th_month' => $this->nbr_recent_users_last_5th_month ,
    'nbr_recent_users_last_6th_month' => $this->nbr_recent_users_last_6th_month ,
    'nbr_recent_users_last_7th_month' => $this->nbr_recent_users_last_7th_month ,
    'nbr_recent_users_last_8th_month' => $this->nbr_recent_users_last_8th_month ,
    'nbr_recent_users_last_9th_month' => $this->nbr_recent_users_last_9th_month ,
    'nbr_recent_users_last_10th_month' => $this->nbr_recent_users_last_10th_month ,
    'nbr_recent_users_last_11th_month' => $this->nbr_recent_users_last_11th_month ,
    'nbr_recent_users_last_12th_month' => $this->nbr_recent_users_last_12th_month ,
    'nbr_recent_users_last_year' => $this->nbr_recent_users_last_year ,
    'nbr_carwash_owners' => $this->nbr_carwash_owners ,
    'nbr_workshop_owners' => $this->nbr_workshop_owners ,
      ];
      return view('admin.users')->with($data);
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

    public function servicesindex(){
      return view('admin.services.dashboard');
    }

}
