<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\task;
use Auth;

class dashboard extends Controller
{


    // List of users
    protected function getUsers(){
      return User::paginate(20);
    }

    // List of Admins
    protected function getAdmins(){
      return User::where('rank','=','admin')->paginate(20);
    }

    // List of blog moderators
    protected function getBlogModerators(){
      return User::where('rank','=','blogm')->paginate(20);
    }

    // List of encyclopedia moderators
    protected function getEncyclopediaModerators(){
      return User::where('rank','=','encyclopediam')->paginate(20);
    }

    // List of market moderators
    protected function getMarketModerators(){
      return User::where('rank','=','marketm')->paginate(20);
    }

    // List of services moderators
    protected function getServicesModerators(){
      return User::where('rank','=','servicesm')->paginate(20);
    }

    /* USER STATS */

    // number of users
    protected function getNbrUsers(){
      User::selectRaw('count(*) as sum')->get();
    }

    // number of blog moderators
    protected function getNbrBlogModerators(){
      User::selectRaw('count(*) as sum')->whereRaw('rank = "blogm"')->get();
    }

    // number of encyclopedia moderators
    protected function getNbrEncyclopediaModerators(){
      User::selectRaw('count(*) as sum')->whereRaw('rank = "encyclopediam"')->get();
    }

    // number of market moderators
    protected function getNbrMarketModerators(){
      User::selectRaw('count(*) as sum')->whereRaw('rank = "marketm"')->get();
    }

    // number of admins
    protected function getNbrAdmins(){
      User::selectRaw('count(*) as sum')->whereRaw('rank = "admin"')->get();
    }

    // Number of users registered last year month by month
    protected function getStatisticsOfYear_Users($year){
      for($i=1;$i<13;$i++){
        $nbr_recent_users_month[$i] = $this->getStatisticsOfMonth_Users($year,$i) ;
      }
      return $nbr_recent_users_month;
    }

    // Number of users registered bye year and month
    protected function getStatisticsOfMonth_Users($year,$month){
      return User::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$month.' and year(created_at) ='.$year)->get();
    }

    //number of carwash owners

    protected $nbr_carwash_owners;

    //number of workshop owners

    protected $nbr_workshop_owners;


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
      $list_tasks = task::all();
      $list_done_tasks = task::all()->where('state','=','done');
      $list_undone_tasks = task::all()->where('state','=','undone');
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
    'list_users' => $this->getUsers(),
      ];
      return view('admin.users')->with($data);
    }

    public function statistics(){
      return view('admin.statistics');
    }

    public function blogindex(){
      $list_done_tasks = task::where('state','=','done')->where('section','=','Blog')->get();
      $list_undone_tasks = task::where('state','=','undone')->where('section','=','Blog')->get();
      $data=[
        'list_done_tasks' => $list_done_tasks,
        'list_undone_tasks' => $list_undone_tasks,
      ];
      return view('admin.blog.dashboard')->with($data);
    }

    public function commentsreplies(){
      return view('admin.blog.comments_replies');
    }


    public function blogmoderators(){
      return view('admin.blog.moderators');
    }

    public function encyclopediadashboard(){
      $list_done_tasks = task::where('state','=','done')->where('section','=','Encyclopedia')->get();
      $list_undone_tasks = task::where('state','=','undone')->where('section','=','Encyclopedia')->get();
      $data=[
        'list_done_tasks' => $list_done_tasks,
        'list_undone_tasks' => $list_undone_tasks,
      ];
      return view('admin.encyclopedia.dashboard')->with($data);
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
      $list_done_tasks = task::where('state','=','done')->where('section','=','Market')->get();
      $list_undone_tasks = task::where('state','=','undone')->where('section','=','Market')->get();

      $data=[
        'list_done_tasks' => $list_done_tasks,
        'list_undone_tasks' => $list_undone_tasks,
      ];
      return view('admin.markets.dashboard')->with($data);
    }

    public function servicesindex(){
      $list_done_tasks = task::where('state','=','done')->where('section','=','Services')->get();
      $list_undone_tasks = task::where('state','=','undone')->where('section','=','Services')->get();
      $data=[
        'list_done_tasks' => $list_done_tasks,
        'list_undone_tasks' => $list_undone_tasks,
      ];
      return view('admin.services.dashboard')->with($data);
    }

}
