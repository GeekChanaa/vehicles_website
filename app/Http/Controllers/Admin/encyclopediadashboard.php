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
    }



    public function addbrand(){
      return view('admin.encyclopedia.addbrand');
    }



    public function addgeneration(){
      return view('admin.encyclopedia.addgeneration');
    }

    public function addvmodel(){
      return view('admin.encyclopedia.addmodel');
    }

    public function statistics(){
      return view('admin.encyclopedia.statistics');
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
}
