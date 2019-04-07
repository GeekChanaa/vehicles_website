<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\brand;
use App\generation;
use App\technology;
use App\vmodel;

class encyclopediadashboard extends Controller
{
    //Vars :


    // List Of brands

    protected $list_brands;

    // List of vmodels

    protected $list_vmodels;

    // List of generations

    protected $list_generations;





    // List of Technology

    protected $list_technologies;



    /* Statistics Variables */

    // Number of brands

    protected $nbr_brands;

    // Number of vmodels

    protected $nbr_vmodels;

    // Number of generations

    protected $nbr_generations;

    // Number of last day created brands

    protected $nbr_brands_last_day;

    // number of last week created brands

    protected $nbr_brands_last_week;

    // Number of last month created brands

    protected $nbr_brands_last_month;

    // Number of 2nd last month created brands

    protected $nbr_brands_last_2nd_month;

    // Number of 3rd last month created brands

    protected $nbr_brands_last_3rd_month;

    // Number of 4th last month created brands

    protected $nbr_brands_last_4th_month;

    // Number of 5th last month created brands

    protected $nbr_brands_last_5th_month;

    // Number of 6th last month created brands

    protected $nbr_brands_last_6th_month;

    // Number of 7th last month created brands

    protected $nbr_brands_last_7th_month;

    // Number of 8th last month created brands

    protected $nbr_brands_last_8th_month;

    // Number of 9th last month created brands

    protected $nbr_brands_last_9th_month;

    // Number of 10th last month created brands

    protected $nbr_brands_last_10th_month;

    // Number of 11th last month created brands

    protected $nbr_brands_last_11th_month;

    // Number of 12th last month created brands

    protected $nbr_brands_last_12th_month;

    // Number of last year created brands

    protected $nbr_brands_last_year;

    // Number of last day created vmodels

    protected $nbr_vmodels_last_day;

    // Number of last week created vmodels

    protected $nbr_vmodels_last_week;

    // Number of last month created vmodels

    protected $nbr_vmodels_last_month;

    // Number of second last month created vmodels

    protected $nbr_vmodels_2nd_last_month;

    // Number of third last month created vmodels

    protected $nbr_vmodels_3rd_last_month;

    // Number of 4th last month created vmodels

    protected $nbr_vmodels_4th_last_month;

    // Number of 5th last month created vmodels

    protected $nbr_vmodels_5th_last_month;

    // Number of 6th last month created vmodels

    protected $nbr_vmodels_6th_last_month;

    // Number of 7th last month created vmodels

    protected $nbr_vmodels_7th_last_month;

    // Number of 8th last month created vmodels

    protected $nbr_vmodels_8th_last_month;

    // Number of 9th last month created vmodels

    protected $nbr_vmodels_9th_last_month;

    // Number of 10th last month created vmodels

    protected $nbr_vmodels_10th_last_month;

    // Number of 11th last month created vmodels

    protected $nbr_vmodels_11th_last_month;

    // Number of 12th last month created vmodels

    protected $nbr_vmodels_12th_last_month;

    // Number of last year created vmodels

    protected $nbr_vmodels_last_year;

    // Number of last day created generations

    protected $nbr_generations_last_day;

    // Number of last week created generations

    protected $nbr_generations_last_week;

    // Number of last month created generations

    protected $nbr_generations_last_month;

    // Number of last second month created generations

    protected $nbr_generations_2nd_last_month;

    // Number of third last month created generations

    protected $nbr_generations_3rd_last_month;

    // Number of 4th last month created generations

    protected $nbr_generations_4th_last_month;

    // Number of 5th last month created generations

    protected $nbr_generations_5th_last_month;

    // Number of 6th last month created generations

    protected $nbr_generations_6th_last_month;

    // Number of 7th last month created generations

    protected $nbr_generations_7th_last_month;

    // Number of 8th last month created generations

    protected $nbr_generations_8th_last_month;

    // Number of 9th last month created generations

    protected $nbr_generations_9th_last_month;

    // Number of 10th last month created generations

    protected $nbr_generations_10th_last_month;

    // Number of 11th last month created generations

    protected $nbr_generations_11th_last_month;

    // Number of 12th last month created generations

    protected $nbr_generations_12th_last_month;

    // Number of last year created generations

    protected $nbr_generations_last_year;




    // Number of technologies

    protected $nbr_technologies;



    public function __construct(){
      $this->list_brands=brand::all();
      $this->list_vmodels=vmodel::all();
      $this->list_generations=generation::all();
      $this->list_technologies=technology::all();
      $this->nbr_brands=brand::all()->count();
      $this->nbr_vmodels=vmodel::all()->count();
      $this->nbr_generations=generation::all()->count();
      $this->nbr_technologies=technology::all()->count();
      $this->nbr_brands_last_day=brand::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count() ;
      $this->nbr_brands_last_week=brand::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count() ;
      $this->nbr_brands_last_month=brand::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count() ;
      $this->nbr_brands_last_2nd_month=brand::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count() ;
      $this->nbr_brands_last_3rd_month=brand::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count() ;
      $this->nbr_brands_last_4th_month=brand::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count() ;
      $this->nbr_brands_last_5th_month=brand::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count() ;
      $this->nbr_brands_last_6th_month=brand::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count() ;
      $this->nbr_brands_last_7th_month=brand::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count() ;
      $this->nbr_brands_last_8th_month=brand::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count() ;
      $this->nbr_brands_last_9th_month=brand::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count() ;
      $this->nbr_brands_last_10th_month=brand::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count() ;
      $this->nbr_brands_last_11th_month=brand::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count() ;
      $this->nbr_brands_last_12th_month=brand::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count() ;
      $this->nbr_brands_last_year=brand::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count() ;
      $this->nbr_vmodels_last_day=vmodel::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count() ;
      $this->nbr_vmodels_last_week=vmodel::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count() ;
      $this->nbr_vmodels_last_month=vmodel::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count() ;
      $this->nbr_vmodels_2nd_last_month=vmodel::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count() ;
      $this->nbr_vmodels_3rd_last_month=vmodel::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count() ;
      $this->nbr_vmodels_4th_last_month=vmodel::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count() ;
      $this->nbr_vmodels_5th_last_month=vmodel::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count() ;
      $this->nbr_vmodels_6th_last_month=vmodel::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count() ;
      $this->nbr_vmodels_7th_last_month=vmodel::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count() ;
      $this->nbr_vmodels_8th_last_month=vmodel::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count() ;
      $this->nbr_vmodels_9th_last_month=vmodel::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count() ;
      $this->nbr_vmodels_10th_last_month=vmodel::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count() ;
      $this->nbr_vmodels_11th_last_month=vmodel::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count() ;
      $this->nbr_vmodels_12th_last_month=vmodel::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count() ;
      $this->nbr_vmodels_last_year=vmodel::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count() ;
      $this->nbr_generations_last_day=generation::all()->where('created_at','<','DATEADD(dd, -1, GETDATE())')->count() ;
      $this->nbr_generations_last_week=generation::all()->where('created_at','<','DATEADD(dd, -7, GETDATE())')->count() ;
      $this->nbr_generations_last_month=generation::all()->where('created_at','<','DATEADD(mm, -1, GETDATE())')->count() ;
      $this->nbr_generations_2nd_last_month=generation::whereRaw('created_at < DATE_ADD(NOW(),Interval -1 month) and created_at > DATE_ADD(NOW(),Interval -2 month)')->count() ;
      $this->nbr_generations_3rd_last_month=generation::whereRaw('created_at < DATE_ADD(NOW(),Interval -2 month) and created_at > DATE_ADD(NOW(),Interval -3 month)')->count() ;
      $this->nbr_generations_4th_last_month=generation::whereRaw('created_at < DATE_ADD(NOW(),Interval -3 month) and created_at > DATE_ADD(NOW(),Interval -4 month)')->count() ;
      $this->nbr_generations_5th_last_month=generation::whereRaw('created_at < DATE_ADD(NOW(),Interval -4 month) and created_at > DATE_ADD(NOW(),Interval -5 month)')->count() ;
      $this->nbr_generations_6th_last_month=generation::whereRaw('created_at < DATE_ADD(NOW(),Interval -5 month) and created_at > DATE_ADD(NOW(),Interval -6 month)')->count() ;
      $this->nbr_generations_7th_last_month=generation::whereRaw('created_at < DATE_ADD(NOW(),Interval -6 month) and created_at > DATE_ADD(NOW(),Interval -7 month)')->count() ;
      $this->nbr_generations_8th_last_month=generation::whereRaw('created_at < DATE_ADD(NOW(),Interval -7 month) and created_at > DATE_ADD(NOW(),Interval -8 month)')->count() ;
      $this->nbr_generations_9th_last_month=generation::whereRaw('created_at < DATE_ADD(NOW(),Interval -8 month) and created_at > DATE_ADD(NOW(),Interval -9 month)')->count() ;
      $this->nbr_generations_10th_last_month=generation::whereRaw('created_at < DATE_ADD(NOW(),Interval -9 month) and created_at > DATE_ADD(NOW(),Interval -10 month)')->count() ;
      $this->nbr_generations_11th_last_month=generation::whereRaw('created_at < DATE_ADD(NOW(),Interval -10 month) and created_at > DATE_ADD(NOW(),Interval -11 month)')->count() ;
      $this->nbr_generations_12th_last_month=generation::whereRaw('created_at < DATE_ADD(NOW(),Interval -11 month) and created_at > DATE_ADD(NOW(),Interval -12 month)')->count() ;
      $this->nbr_generations_last_year=generation::all()->where('created_at','<','DATEADD(yy, -1, GETDATE())')->count() ;
    }



    public function addbrand(){
      return view('admin.encyclopedia.addbrand');
    }



    public function addgeneration(){
      return view('admin.encyclopedia.addgeneration');
    }

    public function addvmodel(){
      $data=[
        'list_brands' => $this->list_brands,
      ];
      return view('admin.encyclopedia.addmodel')->with($data);
    }

    public function statistics(){
      $data=[
        'nbr_brands' => $this->nbr_brands ,
    'nbr_vmodels' => $this->nbr_vmodels ,
    'nbr_generations' => $this->nbr_generations ,
    'nbr_brands_last_day' => $this->nbr_brands_last_day ,
    'nbr_brands_last_week' => $this->nbr_brands_last_week ,
    'nbr_brands_last_month' => $this->nbr_brands_last_month ,
    'nbr_brands_last_2nd_month' => $this->nbr_brands_last_2nd_month ,
    'nbr_brands_last_3rd_month' => $this->nbr_brands_last_3rd_month ,
    'nbr_brands_last_4th_month' => $this->nbr_brands_last_4th_month ,
    'nbr_brands_last_5th_month' => $this->nbr_brands_last_5th_month ,
    'nbr_brands_last_6th_month' => $this->nbr_brands_last_6th_month ,
    'nbr_brands_last_7th_month' => $this->nbr_brands_last_7th_month ,
    'nbr_brands_last_8th_month' => $this->nbr_brands_last_8th_month ,
    'nbr_brands_last_9th_month' => $this->nbr_brands_last_9th_month ,
    'nbr_brands_last_10th_month' => $this->nbr_brands_last_10th_month ,
    'nbr_brands_last_11th_month' => $this->nbr_brands_last_11th_month ,
    'nbr_brands_last_12th_month' => $this->nbr_brands_last_12th_month ,
    'nbr_brands_last_year' => $this->nbr_brands_last_year ,
    'nbr_vmodels_last_day' => $this->nbr_vmodels_last_day ,
    'nbr_vmodels_last_week' => $this->nbr_vmodels_last_week ,
    'nbr_vmodels_last_month' => $this->nbr_vmodels_last_month ,
    'nbr_vmodels_2nd_last_month' => $this->nbr_vmodels_2nd_last_month ,
    'nbr_vmodels_3rd_last_month' => $this->nbr_vmodels_3rd_last_month ,
    'nbr_vmodels_4th_last_month' => $this->nbr_vmodels_4th_last_month ,
    'nbr_vmodels_5th_last_month' => $this->nbr_vmodels_5th_last_month ,
    'nbr_vmodels_6th_last_month' => $this->nbr_vmodels_6th_last_month ,
    'nbr_vmodels_7th_last_month' => $this->nbr_vmodels_7th_last_month ,
    'nbr_vmodels_8th_last_month' => $this->nbr_vmodels_8th_last_month ,
    'nbr_vmodels_9th_last_month' => $this->nbr_vmodels_9th_last_month ,
    'nbr_vmodels_10th_last_month' => $this->nbr_vmodels_10th_last_month ,
    'nbr_vmodels_11th_last_month' => $this->nbr_vmodels_11th_last_month ,
    'nbr_vmodels_12th_last_month' => $this->nbr_vmodels_12th_last_month ,
    'nbr_vmodels_last_year' => $this->nbr_vmodels_last_year ,
    'nbr_generations_last_day' => $this->nbr_generations_last_day ,
    'nbr_generations_last_week' => $this->nbr_generations_last_week ,
    'nbr_generations_last_month' => $this->nbr_generations_last_month ,
    'nbr_generations_2nd_last_month' => $this->nbr_generations_2nd_last_month ,
    'nbr_generations_3rd_last_month' => $this->nbr_generations_3rd_last_month ,
    'nbr_generations_4th_last_month' => $this->nbr_generations_4th_last_month ,
    'nbr_generations_5th_last_month' => $this->nbr_generations_5th_last_month ,
    'nbr_generations_6th_last_month' => $this->nbr_generations_6th_last_month ,
    'nbr_generations_7th_last_month' => $this->nbr_generations_7th_last_month ,
    'nbr_generations_8th_last_month' => $this->nbr_generations_8th_last_month ,
    'nbr_generations_9th_last_month' => $this->nbr_generations_9th_last_month ,
    'nbr_generations_10th_last_month' => $this->nbr_generations_10th_last_month ,
    'nbr_generations_11th_last_month' => $this->nbr_generations_11th_last_month ,
    'nbr_generations_12th_last_month' => $this->nbr_generations_12th_last_month ,
    'nbr_generations_last_year' => $this->nbr_generations_last_year ,
      ];
      return view('admin.encyclopedia.statistics')->with($data);
    }

    public function editors(){
      return view('admin.encyclopedia.editors');
    }

    public function moderators(){
      return view('admin.encyclopedia.moderators');
    }


    // Listing of models
    public function brands(){
      $list_brands = $this->list_brands;
      return view('admin.encyclopedia.brands')->with('list_brands',$list_brands);
    }


    // Listing Of Models
    public function models(){

      return view('admin.encyclopedia.models')->with('list_models',$this->list_vmodels);
    }


    // Listing Of generations
    public function generations(){
      return view('admin.encyclopedia.generations');
    }

    // Delete Model Function

    public function deletebrand(Request $request){
      $brand = brand::all()->where('id','=',$request->id)->first();
      $brand->delete();
      return redirect()->back();
    }

    public function deletevmodel(Request $request){
      $vmodel = vmodel::all()->where('id','=',$request->id)->first();
      $vmodel->delete();
      return redirect()->back();
    }

    public function modifyvmodel(Request $request){
      $vmodel = vmodel::all()->where('id','=',$request->id)->first();
      $vmodel->name = $request->name;
      $vmodel->brand = $request->brand;
      $vmodel->description = $request->description;
      $vmodel->save();
      return redirect()->back();
    }

    public function modifybrand(Request $request){
      $brand=brand::all()->where('id','=',$request->id)->first();
      $brand->name = $request->name;
      $brand->year_foundation = $request->year_foundation;
      $brand->CEO = $request->CEO;
      $brand->headquarters = $request->headquarters;
      $brand->website = $request->website;
      $brand->production_output = $request->production_output;
      $brand->nbr_of_employees = $request->nbr_of_employees;
      $brand->description = $request->description;
      $brand->save();
      return redirect()->back();
    }
}
