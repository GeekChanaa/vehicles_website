<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
use App\city;
use App\used_carpart_article;
use App\new_carpart_article;
use App\new_vehicle_article;
use App\used_vehicle_article;
use DB;

class marketController extends Controller
{



    //Routes To Markets
    public function usedvehicles(){
      $list_uv = DB::table('used_vehicle_articles')->orderBy('created_at','desc')->paginate(10);
      $data=[
          'list_uv' => $list_uv,
      ];
      return view('markets.usedvehicles')->with($data);
    }
    public function newvehicles(){
      $list_nv = DB::table('new_vehicle_articles')->orderBy('created_at','desc')->paginate(10);
      $data=[
          'list_nv' => $list_nv,
      ];
      return view('markets.newvehicles')->with($data);
    }
    public function usedcarparts(){
      $list_ucp = DB::table('used_carpart_articles')->orderBy('created_at','desc')->paginate(10);
      $data=[
          'list_ucp' => $list_ucp,
      ];
      return view('markets.usedcarparts')->with($data);
    }
    public function newcarparts(){
      $list_ncp = DB::table('new_carpart_articles')->orderBy('created_at','desc')->paginate(10);
      $data=[
          'list_ncp' => $list_ncp,
      ];
      return view('markets.newcarparts')->with($data);
    }

    // Get Articles by id
    public function usedvehicle($id){
      $article = used_vehicle_article::where('id','=',$id)->first();
      return view('markets.usedvehicle')->with(['article'=>$article]);
    }

    public function newvehicle($id){
      $article = new_vehicle_article::where('id','=',$id)->first();
      return view('markets.newvehicle')->with(['article'=>$article]);
    }

    public function usedcarpart($id){
      $article = used_carpart_article::where('id','=',$id)->first();
      return view('markets.usedcarpart')->with(['article'=>$article]);
    }

    public function newcarpart($id){
      $article = new_carpart_article::where('id','=',$id)->first();
      return view('markets.newcarpart')->with(['article'=>$article]);
    }

    public function index(){
      return view('markets.index');
    }
}
