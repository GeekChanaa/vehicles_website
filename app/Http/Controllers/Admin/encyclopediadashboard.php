<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\brand;
use App\model;
use App\generation;
use App\new;
use App\technology;

class encyclopediadashboard extends Controller
{
    //Vars :


    // List Of brands

    protected $list_brands;

    // List of Models

    protected $list_models;

    // List of generations

    protected $list_generations;

    // List of News

    protected $list_news;

    // List of Technology

    protected $list_technologies;



    /* Statistics Variables */

    // Number of brands

    protected $nbr_brands;

    // Number of models

    protected $nbr_models;

    // Number of generations

    protected $nbr_generations;

    // Number of News

    protected $nbr_news;

    // Number of technologies

    protected $nbr_technologies;



    public function __construct(){
      $this->list_brands=brand::all();
      $this->list_models=model::all();
      $this->list_generations=generation::all();
      $this->list_news=new::all();
      $this->list_technologies=techonology::all();
      $this->nbr_brands=brand::all()->count();
      $this->nbr_models=model::all()->count();
      $this->nbr_generations=generation::all()->count();
      $this->nbr_news=new::all()->count();
      $this->nbr_technologies=techonology::all()->count();
    }



    public function addbrand(){
      return view('admin.encyclopedia.addbrand');
    }

    public function addgeneration(){
      return view('admin.encyclopedia.addgeneration');
    }

    public function addmodel(){
      return view('admin.encyclopedia.addmodel');
    }
}
