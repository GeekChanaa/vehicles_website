<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\carwash;
use App\workshop;
use App\User;

class servicesdashboard extends Controller
{
    //Vars

    // list of Workshops

    protected $list_workshops;

    // List of Carwashes

    protected $list_carwashes;


    /* Statistic Vars */

    // Number of Carwashes

    protected $nbr_carwashes;

    // Number of Workshops

    protected $nbr_workshops;

    // Number of carwash owners

    protected $nbr_carwash_owners;

    // Number of workshop owners

    protected $nbr_workshop_owners;

    // Number of carwashes last day

    protected $nbr_carwashes_last_day;

    // Number of carwashes last week

    protected $nbr_carwashes_last_week;

    // Number of carwashes last month

    protected $nbr_carwashes_last_month;

    // Number of carwashes last year

    protected $nbr_carwashes_last_year;

    // Number of carwashes last 2nd month

    protected $nbr_carwashes_2nd_month;

    // Number of carwashes third last month

    protected $nbr_carwashes_3rd_month;

    // Number of carwashes forth last month

    protected $nbr_carwashes_4th_month;

    // Number of carwashes 5th last month

    protected $nbr_carwashes_5th_month;

    // Number of carwashes 6th last month

    protected $nbr_carwashes_6th_month;

    // Number of carwashes 7th last month

    protected $nbr_carwashes_7th_month;

    // Number of carwashes 8th last month

    protected $nbr_carwashes_8th_month;

    // Number of carwashes 9th last month

    protected $nbr_carwashes_9th_month;

    // Number of carwashes 10th last month

    protected $nbr_carwashes_10th_month;

    // Number of carwashes 11th last month

    protected $nbr_carwashes_11th_month;

    // Number of carwashes 12th last month

    protected $nbr_carwashes_12th_month;

    // Number of workshops last day

    protected $nbr_workshops_last_day;

    // Number of workshops last week

    protected $nbr_workshops_last_week;

    // Number of workshops last month

    protected $nbr_workshops_last_month;

    // Number of workshops last year

    protected $nbr_workshops_last_year;

    // Number of workshops last 2nd month

    protected $nbr_workshops_2nd_month;

    // Number of workshops third last month

    protected $nbr_workshops_3rd_month;

    // Number of workshops forth last month

    protected $nbr_workshops_4th_month;

    // Number of workshops 5th last month

    protected $nbr_workshops_5th_month;

    // Number of workshops 6th last month

    protected $nbr_workshops_6th_month;

    // Number of workshops 7th last month

    protected $nbr_workshops_7th_month;

    // Number of workshops 8th last month

    protected $nbr_workshops_8th_month;

    // Number of workshops 9th last month

    protected $nbr_workshops_9th_month;

    // Number of workshops 10th last month

    protected $nbr_workshops_10th_month;

    // Number of workshops 11th last month

    protected $nbr_workshops_11th_month;

    // Number of workshops 12th last month

    protected $nbr_workshops_12th_month;


    public function __construct(){
      $this->list_carwashes=carwash::all();
      $this->list_workshops=workshop::all();
  $this->nbr_carwashes=carwash::all()->count();
  $this->nbr_workshops=workshop::all()->count();
  $this->nbr_carwash_owners=User::all()->where('rank','=','carwashowner');
  $this->nbr_workshop_owners=User::all()->where('rank','=','workshopowner');
  $this->nbr_carwashes_last_day=carwash::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count();
  $this->nbr_carwashes_last_week=carwash::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count();
  $this->nbr_carwashes_last_month=carwash::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count();
  $this->nbr_carwashes_last_year=carwash::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count();
  $this->nbr_carwashes_2nd_month=carwash::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count();
  $this->nbr_carwashes_3rd_month=carwash::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count();
  $this->nbr_carwashes_4th_month=carwash::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count();
  $this->nbr_carwashes_5th_month=carwash::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count();
  $this->nbr_carwashes_6th_month=carwash::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count();
  $this->nbr_carwashes_7th_month=carwash::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count();
  $this->nbr_carwashes_8th_month=carwash::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count();
  $this->nbr_carwashes_9th_month=carwash::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count();
  $this->nbr_carwashes_10th_month=carwash::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count();
  $this->nbr_carwashes_11th_month=carwash::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count();
  $this->nbr_carwashes_12th_month=carwash::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count();
  $this->nbr_workshops_last_day=workshop::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count();
  $this->nbr_workshops_last_week=workshop::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count();
  $this->nbr_workshops_last_month=workshop::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count();
  $this->nbr_workshops_last_year=workshop::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count();
  $this->nbr_workshops_2nd_month=workshop::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count();
  $this->nbr_workshops_3rd_month=workshop::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count();
  $this->nbr_workshops_4th_month=workshop::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count();
  $this->nbr_workshops_5th_month=workshop::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count();
  $this->nbr_workshops_6th_month=workshop::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count();
  $this->nbr_workshops_7th_month=workshop::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count();
  $this->nbr_workshops_8th_month=workshop::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count();
  $this->nbr_workshops_9th_month=workshop::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count();
  $this->nbr_workshops_10th_month=workshop::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count();
  $this->nbr_workshops_11th_month=workshop::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count();
  $this->nbr_workshops_12th_month=workshop::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count();
    }

    public function carwashes(){
      $data=[
        'list_carwashes' => $this->list_carwashes,
      ];
      return view('admin.services.carwashes')->with($data);
    }

    public function workshops(){
      $data=[
        'list_workshops' => $this->list_workshops
      ];
      return view('admin.services.workshops')->with($data);
    }

    public function deleteworkshop(Request $request){
      $workshop = workshop::all()->where('id','=',$request->id)->first();
      $workshop->delete();
      return redirect()->back();
    }

    public function deletecarwash(Request $request){
      $carwash = carwash::all()->where('id','=',$request->id)->first();
      $carwash->delete();
      return redirect()->back();
    }
  }
