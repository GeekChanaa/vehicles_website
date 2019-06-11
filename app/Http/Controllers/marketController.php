<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
use App\city;
use App\used_carpart_article;
use App\new_carpart_article;
use App\new_vehicle_article;
use App\used_vehicle_article;
use App\brand;
use App\vmodel;
use App\auto_part;
use App\favorite_ncp;
use App\favorite_ucp;
use App\favorite_uv;
use App\favorite_nv;
use App\report_nv;
use App\report_uv;
use App\report_ncp;
use App\report_ucp;
use Auth;
use Response;
use DB;

class marketController extends Controller
{



    // Getters Recent Articles
    public function getRecentNv(){
      return new_vehicle_article::orderBy('created_at','DESC')->limit(5)->get();
    }

    public function getRecentUv(){
      return used_vehicle_article::orderBy('created_at','DESC')->limit(5)->get();
    }

    public function getRecentNcp(){
      return new_carpart_article::orderBy('created_at','DESC')->limit(5)->get();
    }

    public function getRecentUcp(){
      return used_carpart_article::orderBy('created_at','DESC')->limit(5)->get();
    }

    // GETTERS FAVORITE ARTICLES
    public function getFavNv(){
      return favorite_nv::where('user_id','=',Auth::user()->id)->get();
    }

    public function getFavUv(){
      return favorite_uv::where('user_id','=',Auth::user()->id);
    }

    public function getFavNcp(){
      return favorite_ncp::where('user_id','=',Auth::user()->id);
    }

    public function getFavUcp(){
      return favorite_ucp::where('user_id','=',Auth::user()->id);
    }

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
      $list_brands = brand::all()->where('specialty','=','vehicles');
      $list_brands_cp = brand::all()->where('specialty','=','carparts');
      $list_models = vmodel::all();
      $countries = country::all();
      $cp_categories = auto_part::selectRaw('distinct category')->get();

      if(Auth::check()){
        $data=[
          'list_recentnv' => $this->getRecentNv(),
          'list_recentuv' => $this->getRecentUv(),
          'list_recentncp' => $this->getRecentNcp(),
          'list_recentucp' => $this->getRecentUcp(),
          'list_favnv' => $this->getFavNv(),
          'list_favuv' => $this->getFavUv(),
            'list_favncp' => $this->getFavNcp(),
            'list_favucp' => $this->getFavUcp(),
            'list_brands_cp' => $list_brands_cp,
            'list_brands' => $list_brands,
            'list_models' => $list_models,
            'cp_categories' => $cp_categories,
            'countries' => $countries,
          ];
        }
      else{
        $data=[
          'list_recentnv' => $this->getRecentNv(),
          'list_recentuv' => $this->getRecentUv(),
          'list_recentncp' => $this->getRecentNcp(),
          'list_recentucp' => $this->getRecentUcp(),
          'list_brands_cp' => $list_brands_cp,
          'list_brands' => $list_brands,
          'list_models' => $list_models,
          'cp_categories' => $cp_categories,
          'countries' => $countries,
          ];
      }
      return view('markets.index')->with($data);
    }

    public function search_nv(Request $request){
      $list_nv = new_vehicle_article::where('model','=',$request->model)->where('price','<',$request->max_price)->where('country','=',$request->country)->paginate(10);
      $data=[
        'list_nv' => $list_nv,
      ];
      return view('markets.newvehicles')->with($data);
    }

    public function search_uv(Request $request){
      $list_uv = used_vehicle_article::where('model','=',$request->model)->where('price','<',$request->max_price)->where('country','=',$request->country)->paginate(10);
      $data=[
        'list_uv' => $list_uv,
      ];
      return view('markets.usedvehicles')->with($data);
    }

    public function search_ncp(Request $request){
      $list_ncp = new_carpart_article::where('auto_part','=',$request->part)->where('country','=',$request->country)->paginate(10);
      $data=[
        'list_ncp' => $list_ncp,
      ];
      return view('markets.newcarparts')->with($data);
    }

    public function search_ucp(Request $request){
      $list_ucp = new_carpart_article::where('auto_part','=',$request->part)->where('country','=',$request->country)->paginate(10);
      $data=[
        'list_ucp' => $list_ucp,
      ];
      return view('markets.usedcarparts')->with($data);
    }

    /*
    *******************
    ADD TO FAVORITE FUNCTIONS
    *******************
    */
    public function addNvFav(Request $request){
      $fav = new favorite_nv;
      $fav->user_id = Auth::user()->id;
      $fav->article_id = $request->articleid;
      $fav->save();
      return Response::json(array('success'=>true,));
    }

    public function addUvFav(Request $request){
      $fav = new favorite_uv;
      $fav->user_id = Auth::user()->id;
      $fav->article_id = $request->articleid;
      $fav->save();
      return Response::json(array('success'=>true,));
    }

    public function addNcpFav(Request $request){
      $fav = new favorite_ncp;
      $fav->user_id = Auth::user()->id;
      $fav->article_id = $request->articleid;
      $fav->save();
      return Response::json(array('success'=>true,));
    }

    public function addUcpFav(Request $request){
      $fav = new favorite_ucp;
      $fav->user_id = Auth::user()->id;
      $fav->article_id = $request->articleid;
      $fav->save();
      return Response::json(array('success'=>true,));
    }

    /*
    *******************
    ADVANCED SEARCH ROUTES
    *******************
    */

    public function as_nv(){
      return view('markets.AdvancedSearch.NV');
    }

    public function as_uv(){
      return view('markets.AdvancedSearch.UV');
    }

    public function as_ncp(){
      return view('markets.AdvancedSearch.NCP');
    }

    public function as_ucp(){
      return view('markets.AdvancedSearch.UCP');
    }

    /*
    *******************
    DELETE FROM FAVORITE FUNCTIONS
    *******************
    */

    public function deleteNvFav(Request $request){
      $fav = favorite_nv::where('id','=',$request->id)->first();
      $fav->delete();
      return Response::json(array('success'=>true,));
    }

    public function deleteUvFav(Request $request){
      $fav = favorite_uv::where('id','=',$request->id)->first();
      $fav->delete();
      return Response::json(array('success'=>true,));
    }

    public function deleteNcpFav(Request $request){
      $fav = favorite_ncp::where('id','=',$request->id)->first();
      $fav->delete();
      return Response::json(array('success'=>true,));
    }

    public function deleteUcpFav(Request $request){
      $fav = favorite_ucp::where('id','=',$request->id)->first();
      $fav->delete();
      return Response::json(array('success'=>true,));
    }


    /*
    *******************
    REPORT ARTICLES FUNCTIONS
    *******************
    */

    public function reportNv(Request $request){
      $report = new report_nv;
      $report->user_id = Auth::user()->id;
      $report->article_id = $request->id;
      $report->save();
      return Response::json(array('success'=>true,));
    }

    public function reportUv(Request $request){
      $report = new report_uv;
      $report->user_id = Auth::user()->id;
      $report->article_id = $request->id;
      $report->save();
      return Response::json(array('success'=>true,));
    }

    public function reportNcp(Request $request){
      $report = new report_ncp;
      $report->user_id = Auth::user()->id;
      $report->article_id = $request->id;
      $report->save();
      return Response::json(array('success'=>true,));
    }

    public function reportUcp(Request $request){
      $report = new report_ucp;
      $report->user_id = Auth::user()->id;
      $report->article_id = $request->id;
      $report->save();
      return Response::json(array('success'=>true,));
    }

}
