<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\createnvRequest;
use App\Http\Requests\createuvRequest;
use App\Http\Controllers\Controller;
use App\new_carpart_article;
use App\new_vehicle_article;
use App\used_carpart_article;
use App\used_vehicle_article;
use App\country;
use App\city;
use App\auto_part;
use App\brand;
use App\vmodel;
use Auth;
use Response;
use Storage;
use DB;


class marketdashboard extends Controller
{
    // Getter Countries :
    public function Countries(){
      return country::all();
    }

    // Getter Brands :
    public function getVehicleBrands(){
      return brand::where('specialty','=','vehicles')->get();
    }

    public function getCarpartBrands(){
      return brand::where('specialty','=','carparts')->get();
    }

    // Getter models :
    public function getVehicleModels(){
      return vmodel::all();
    }

    // Getters Articles by Date
    public function getUvByDay(Request $request){
      return used_vehicle_article::where('created_at','=',$request->date)->paginate(50);
    }

    public function getNvByDay(Request $request){
      return new_vehicle_article::where('created_at','=',$request->date)->paginate(50);
    }

    public function getUcpByDay(Request $request){
      return used_carpart_article::where('created_at','=',$request->date)->paginate(50);
    }

    public function getNcpByDay(Request $request){
      return new_carpart_article::where('created_at','=',$request->date)->paginate(50);
    }

    public function getUvByMonth(Request $request){
      return used_vehicle_article::whereRaw(' month(created_at) = '.$request->month.' and year(created_at) ='.$request->year)->paginate(50);
    }

    public function getNvByMonth(Request $request){
      return new_vehicle_article::whereRaw(' month(created_at) = '.$request->month.' and year(created_at) ='.$request->year)->paginate(50);
    }

    public function getUcpByMonth(Request $request){
      return used_carpart_article::whereRaw(' month(created_at) = '.$request->month.' and year(created_at) ='.$request->year)->paginate(50);
    }

    public function getNcpByMonth(Request $request){
      return new_carpart_article::whereRaw(' month(created_at) = '.$request->month.' and year(created_at) ='.$request->year)->paginate(50);
    }

    public function getUvByYear(Request $request){
      return used_vehicle_article::whereRaw('year(created_at) ='.$request->year)->paginate(50);
    }

    public function getNvByYear(Request $request){
      return new_vehicle_article::whereRaw('year(created_at) ='.$request->year)->paginate(50);
    }

    public function getUcpByYear(Request $request){
      return used_carpart_article::whereRaw('year(created_at) ='.$request->year)->paginate(50);
    }

    public function getNcpByYear(Request $request){
      return new_carpart_article::whereRaw('year(created_at) ='.$request->year)->paginate(50);
    }

    // GETTERS ARTICLES BY COUNTRY

    public function getUvByCountry($country){
      return used_vehicle_article::where('country','=',$country)->paginate(50);
    }

    public function getNvByCountry($country){
      return new_vehicle_article::where('country','=',$country)->paginate(50);
    }

    public function getUcpByCountry($country){
      return used_carpart_article::where('country','=',$country)->paginate(50);
    }

    public function getNcpByCountry($country){
      return new_carpart_article::where('country','=',$country)->paginate(50);
    }

    // Getters number of articles by date
    public function getNbrUvByDay(Request $request){
      $nbr = used_vehicle_article::all()->where('created_at','=',$request->date)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrNvByDay(Request $request){
      $nbr = new_vehicle_article::all()->where('created_at','=',$request->date)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrUcpByDay(Request $request){
      $nbr = used_carpart_article::all()->where('created_at','=',$request->date)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrNcpByDay(Request $request){
      $nbr = new_carpart_article::all()->where('created_at','=',$request->date)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrUvByMonth(Request $request){
      $nbrr = used_vehicle_article::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$request->month.' and year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrNvByMonth(Request $request){
      $nbrr = new_vehicle_article::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$request->month.' and year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrUcpByMonth(Request $request){
      $nbrr = used_carpart_article::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$request->month.' and year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrNcpByMonth(Request $request){
      $nbrr = new_carpart_article::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$request->month.' and year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrUvByYear(Request $request){
      $nbrr = used_vehicle_article::selectRaw('count(*) as sum')->whereRaw('year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));

    }

    public function getNbrNvByYear(Request $request){
      $nbrr = new_vehicle_article::selectRaw('count(*) as sum')->whereRaw('year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));

    }

    public function getNbrUcpByYear(Request $request){
      $nbrr = used_carpart_article::selectRaw('count(*) as sum')->whereRaw('year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));

    }

    public function getNbrNcpByYear(Request $request){
      $nbrr = new_carpart_article::selectRaw('count(*) as sum')->whereRaw('year(created_at) ='.$request->year)->get();
      $nbr = $nbrr[0]['sum'];
      return Response::json(array('success'=>true,'nbr' => $nbr,));

    }

    public function getNbrUvByBrand(Request $request){
      $nbr = used_vehicle_article::all()->where('brand','=',$request->brand)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrNvByBrand(Request $request){
      $nbr = new_vehicle_article::all()->where('brand','=',$request->brand)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrUcpByBrand(Request $request){
      $nbr = used_carpart_article::all()->where('brand','=',$request->brand)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrNcpByBrand(Request $request){
      $nbr = new_carpart_article::all()->where('brand','=',$request->brand)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrUvByModel(Request $request){
      $nbr = new_carpart_article::all()->where('model','=',$request->model)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrNvByModel(Request $request){
      $nbr = new_vehicle_article::all()->where('model','=',$request->model)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrUcpByModel(Request $request){
      $nbr = used_carpart_article::all()->where('model','=',$request->model)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function getNbrNcpByModel(Request $request){
      $nbr = new_carpart_article::all()->where('model','=',$request->model)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    // Function list Carpart Categories:
    public function CarpartCategories(){
      $categories = auto_part::selectRaw('distinct category')->get();
      return $categories;
    }

    public function NbrNCP_By_Category(){
      $categories=$this->CarpartCategories();
      for($i=0;$i<19;$i++)
      {
        $nbr_ncp_category[$categories[$i]['category']] = new_carpart_article::selectRaw('count(*) as sum')->whereRaw('category = \''.$categories[$i]['category'].'\'')->get();
      }
      return $nbr_ncp_category;
    }

    public function NbrUCP_By_Category(){
      $categories=$this->CarpartCategories();
      for($i=0;$i<19;$i++)
      {
        $nbr_ucp_category[$categories[$i]['category']] = used_carpart_article::selectRaw('count(*) as sum')->whereRaw('category = \''.$categories[$i]['category'].'\'')->get();
      }
      return $nbr_ucp_category;
    }

    /* FUNCTIONS FOR GETTING STATISTICS */

    public function getStatisticsOfYear_nv($year){
      for($i=1;$i<13;$i++){
        $nbr_recent_nv_month[$i] = $this->getStatisticsOfMonth_nv($year,$i) ;
      }
      return $nbr_recent_nv_month;
    }

    public function getStatisticsOfMonth_nv($year,$month){
      return new_vehicle_article::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$month.' and year(created_at) ='.$year)->get();
    }

    public function getStatisticsOfDay_nv($date){
      $nbr = new_vehicle_article::selectRaw('count(*) as sum')->whereRaw(' created_at = \''.$date.'\'')->get();
      return Response::json(array('success'=>true,'data'=>$nbr));
    }

    public function getStatisticsOfYear_uv($year){
      for($i=1;$i<13;$i++){
        $nbr_recent_uv_month[$i] = $this->getStatisticsOfMonth_uv($year,$i) ;
      }
      return $nbr_recent_uv_month;
    }

    public function getStatisticsOfMonth_uv($year,$month){
      return used_vehicle_article::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$month.' and year(created_at) ='.$year)->get();
    }

    public function getStatisticsOfDay_uv($date){
      $nbr=used_vehicle_article::selectRaw('count(*) as sum')->whereRaw(' created_at = \''.$date.'\'')->get();
      return Response::json(array('success'=>true,'data'=>$nbr));
    }

    public function getStatisticsOfYear_ncp($year){
      for($i=1;$i<13;$i++){
        $nbr_recent_ncp_month[$i] = $this->getStatisticsOfMonth_ncp($year,$i) ;
      }
      return $nbr_recent_ncp_month;
    }

    public function getStatisticsOfMonth_ncp($year,$month){
      return new_carpart_article::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$month.' and year(created_at) ='.$year)->get();
    }

    public function getStatisticsOfDay_ncp($date){
      $nbr = new_carpart_article::selectRaw('count(*) as sum')->whereRaw(' created_at = \''.$date.'\'')->get();
      return Response::json(array('success'=>true,'data'=>$nbr));
    }

    public function getStatisticsOfYear_ucp($year){
      for($i=1;$i<13;$i++){
        $nbr_recent_ucp_month[$i] = $this->getStatisticsOfMonth_ucp($year,$i) ;
      }
      return $nbr_recent_ucp_month;
    }

    public function getStatisticsOfMonth_ucp($year,$month){
      return used_carpart_article::selectRaw('count(*) as sum')->whereRaw(' month(created_at) = '.$month.' and year(created_at) ='.$year)->get();
    }

    public function getStatisticsOfDay_ucp($date){
      $nbr = used_carpart_article::selectRaw('count(*) as sum')->whereRaw(' created_at = \''.$date.'\'')->get();
      return Response::json(array('success'=>true,'data'=>$nbr));
    }

    /* ************************ GETTERS :  ************************ */

    // LIST OF BRAND NEW CARPART ARTICLES


    public function getListNewCarpartArticles(){
      return new_carpart_article::paginate(50);
    }

    // LIST OF NEW VEHICLE ARTICLES

    public function getListNewVehicleArticles(){
      return new_vehicle_article::paginate(50);
    }

    // LIST OF USED CARPART ARTICLES

    public function getListUsedCarpartArticles(){
      return used_carpart_article::paginate(50);
    }

    // LIST OF USED VEHICLE ARTICLES

    public function getListUsedVehicleArticles(){
      return used_vehicle_article::paginate(50);
    }

    // LIST OF BRAND NEW CARPART ARTICLES OF STATISTICS VIEW


    public function getListNewCarpartArticles_statistics(){
      return new_carpart_article::paginate(5);
    }

    // LIST OF NEW VEHICLE ARTICLES OF STATISTICS VIEW

    public function getListNewVehicleArticles_statistics(){
      return new_vehicle_article::paginate(5);
    }

    // LIST OF USED CARPART ARTICLES OF STATISTICS VIEW

    public function getListUsedCarpartArticles_statistics(){
      return used_carpart_article::paginate(5);
    }

    // LIST OF USED VEHICLE ARTICLES OF STATISTICS VIEW

    public function getListUsedVehicleArticles_statistics(){
      return used_vehicle_article::paginate(5);
    }

    // NUMBER OF BRAND NEW CARPART ARTICLES

    public function getNbrNewCarpartArticles(){
      return new_carpart_article::selectRaw('count(*) as sum')->get();
    }

    // NUMBER OF NEW VEHICLE ARTICLES

    public function getNbrNewVehicleArticles(){
      return new_vehicle_article::selectRaw('count(*) as sum')->get();
    }

    // NUMBER OF USED CARPART ARTICLES

    public function getNbrUsedCarpartArticles(){
      return used_carpart_article::selectRaw('count(*) as sum')->get();
    }

    // NUMBER OF USED VEHICLE ARTICLES

    public function getNbrUsedVehicleArticles(){
      return used_vehicle_article::selectRaw('count(*) as sum')->get();
    }







    public function NumberUcpInCountry($country){
      $nbr_ucp = used_carpart_article::selectRaw('count(*) as sum')->whereRaw('country = \''.$country.'\' ')->get();
      return $nbr_ucp['0']->sum;
    }

    // Table Of Number of ucp by country
    public function NumberUcpEveryCountry(){
      $list_countries = used_carpart_article::select('country')->distinct()->get();
      foreach($list_countries as $country){
              $nbr_ucp[$country['country']] = $this->NumberUcpInCountry($country['country']);
      }
      return $nbr_ucp;
    }

    public function NumberNcpInCountry($country){
      $nbr_ncp = new_carpart_article::selectRaw('count(*) as sum')->whereRaw('country = \''.$country.'\'')->get();
      return $nbr_ncp['0']->sum;
    }

    // Table Of Number of ncp by country
    public function NumberNcpEveryCountry(){
      $list_countries = new_carpart_article::select('country')->distinct()->get();
      foreach($list_countries as $country){
              $nbr_ncp[$country['country']] = $this->NumberNcpInCountry($country['country']);
      }
      return $nbr_ncp;
    }

    public function NumberUvInCountry($country){
      $nbr_uv = used_vehicle_article::selectRaw('count(*) as sum')->whereRaw('country = \''.$country.'\' ')->get();
      return $nbr_uv['0']->sum;
    }

    // Table Of Number of ncp by country
    public function NumberUvEveryCountry(){
      $list_countries = used_vehicle_article::select('country')->distinct()->get();
      foreach($list_countries as $country){
              $nbr_uv[$country['country']] = $this->NumberUvInCountry($country['country']);
      }
      return $nbr_uv;
    }

    public function NumberNvInCountry($country){
      $nbr_nv = new_vehicle_article::selectRaw('count(*) as sum')->whereRaw('country = \''.$country.'\' ')->get();
      return $nbr_nv['0']->sum;
    }

    // Table Of Number of ncp by country
    public function NumberNvEveryCountry(){
      $list_countries = new_vehicle_article::select('country')->distinct()->get();
      foreach($list_countries as $country){
              $nbr_nv[$country['country']] = $this->NumberNvInCountry($country['country']);
      }
      return $nbr_nv;
    }


    public function statistics(){
      $data = [
      'list_ncp' => $this->getListNewCarpartArticles_statistics(),
      'list_ucp' => $this->getListUsedCarpartArticles_statistics(),
      'list_uv' => $this->getListUsedVehicleArticles_statistics(),
      'list_nv' => $this->getListNewVehicleArticles_statistics(),
      'list_vbrands' => $this->getVehicleBrands(),
      'list_cpbrands' => $this->getCarpartBrands(),
      'list_vmodels' => $this->getVehicleModels(),
      'nbr_uv_country' => $this->NumberUvEveryCountry(),
      'nbr_nv_country' => $this->NumberNvEveryCountry(),
      'nbr_ucp_country' => $this->NumberUcpEveryCountry(),
      'nbr_ncp_country' => $this->NumberNcpEveryCountry(),
      'nbr_ncp_articles' => $this->getNbrNewCarpartArticles(),
      'nbr_ucp_articles' => $this->getNbrUsedCarpartArticles(),
      'nbr_uv_articles' => $this->getNbrUsedVehicleArticles(),
      'nbr_nv_articles' => $this->getNbrNewVehicleArticles(),
      'nbr_ncp_category' => $this->NbrNCP_By_Category(),
      'nbr_ucp_category' => $this->NbrUCP_By_Category(),
      'carpart_categories' => $this->CarpartCategories(),
      'nbr_recent_uv_month' => $this->getStatisticsOfYear_uv('2019'),
      'nbr_recent_ncp_month' => $this->getStatisticsOfYear_ncp('2019'),
      'nbr_recent_ucp_month' => $this->getStatisticsOfYear_ucp('2019'),
      'nbr_recent_nv_month' => $this->getStatisticsOfYear_nv('2019'),
      ];


      return view('admin.markets.statistics')->with($data);
    }

    public function createnv(){
      $countries = country::select('name')->get();
      $data=[
        'countries' => $countries,
      ];
      return view('admin.markets.create-nv')->with($data);
    }

    public function createuv(){
      $countries = country::select('name')->get();
      $data=[
        'countries' => $countries,
      ];
      return view('admin.markets.create-uv')->with($data);
    }

    public function createncp(){
      $countries = country::select('name')->get();
      $data=[
        'countries' => $countries,
      ];
      return view('admin.markets.create-ncp')->with($data);
    }

    public function createucp(){
      $countries = country::select('name')->get();
      $data=[
        'countries' => $countries,
      ];
      return view('admin.markets.create-ucp')->with($data);
    }

    public function addnv(createnvRequest $request){
      $nv = new new_vehicle_article;
      $nv->imagefile="ok";
      $nv->country = $request->country;
      $nv->city = $request->city;
      $nv->user_id = Auth::user()->id;
      $nv->price = $request->price;
      $nv->name = $request->name;
      $nv->brand = $request->brand;
      $nv->model = $request->model;
      $nv->generation = $request->generation;
      $nv->cd_changer_stacker = $request->cd_changer_stacker;
      $nv->four_wheel_drive = $request->four_wheel_drive;
      $nv->air_conditionning = $request->air_conditionning;
      $nv->aluminum_wheels = $request->aluminum_wheels;
      $nv->bed_liner = $request->bed_liner;
      $nv->captains_chairs = $request->captains_chairs;
      $nv->cruise_control = $request->cruise_control;
      $nv->dual_air_conditionning = $request->dual_air_conditionning;
      $nv->dual_power_seats = $request->dual_power_seats;
      $nv->hard_top_convertible = $request->hard_top_convertible;
      $nv->heated_seats = $request->heated_seats;
      $nv->leather_seats = $request->leather_seats;
      $nv->luggage_roofrack = $request->luggage_roofrack;
      $nv->_stereo_system = $request->speciality_stereo_system;
      $nv->soft_top = $request->soft_top;
      $nv->manual_transmission = $request->manual_transmission;
      $nv->navigation_system = $request->navigation_system;
      $nv->power_door_locks = $request->power_door_locks;
      $nv->power_seat = $request->power_seat;
      $nv->power_steering = $request->power_steering;
      $nv->power_windows = $request->power_windows;
      $nv->power_sunroof = $request->power_sunroof;
      $nv->running_boards = $request->running_boards;
      $nv->satelite_radio = $request->satelite_radio;
      $nv->snow_plow_package = $request->snow_plow_package;
      $nv->remote_starter = $request->remote_starter;
      $nv->theft_deterrent_alarm = $request->theft_deterrent_alarm;
      $nv->theft_recovery_system = $request->theft_recovery_system;
      $nv->third_row_seats = $request->third_row_seats;
      $nv->tilt_wheel = $request->tilt_wheel;
      $nv->tonneau_cover_bed_cover = $request->tonneau_cover_bed_cover;
      $nv->towing_trailerpackage = $request->towing_trailerpackage;
      $nv->turbo_diesel = $request->turbo_diesel;
      $nv->hybrid_not_flexfuel = $request->hybrid_not_flexfuel;
      $nv->conversion_package = $request->conversion_package;
      $nv->chrome_wheels_20_or_larger = $request->chrome_wheels_20_or_larger;
      $nv->save();
      $pictures = $request->pictures;
      $i = 0;
      foreach($request->pictures as $image){
        $i++;
        $image_name = $i.'.'. $image->getClientOriginalExtension();
        $image->storeAs('/public/market/Newvehicles/'.$nv->id.'nv/',$image_name);
      }
      return redirect()->back();
    }

    public function addncp(Request $request){
      $ncp = new new_carpart_article;
      $ncp->name = $request->name;
      $ncp->auto_part = $request->part;
      $ncp->country = $request->country;
      $ncp->city = $request->city;
      $ncp->brand = $request->brand;
      $ncp->category = $request->category;
      $ncp->compatible_cars = $request->compatible_cars;
      $ncp->description = $request->description;
      $ncp->user_id = Auth::user()->id;
      $ncp->save();
      $image = $request->image;
      $image_name = $ncp->id.'.'.$image->getClientOriginalExtension();
      $image->storeAs('/public/market/Newcarparts/',$image_name);
      return redirect()->back();
    }

    public function adducp(Request $request){
      $ucp = new used_carpart_article;
      $ucp->name = $request->name;
      $ucp->country = $request->country;
      $ucp->city = $request->city;
      $ucp->brand = $request->brand;
      $ucp->category = $request->category;
      $ucp->compatible_cars = $request->compatible_cars;
      $ucp->description = $request->description;
      $ucp->user_id = Auth::user()->id;
      $ucp->save();
      $image = $request->image;
      $image_name = $ucp->id.'.'.$image->getClientOriginalExtension();
      $image->storeAs('/public/market/Usedcarparts/',$image_name);
      return redirect()->back();
    }

    public function deleteucp(Request $request){
      $ucp = used_carpart_article::all()->where('id','=',$request->id)->first();
      Storage::delete('public/market/Newcarparts/'.$request->id.'.png');
      $ucp->delete();
      return redirect()->back();
    }

    public function deletencp(Request $request){
      $ncp = new_carpart_article::all()->where('id','=',$request->id)->first();

      $ncp->delete();
      return redirect()->back();
    }

    public function updatencp(Request $request){
      $ncp = new_carpart_article::all()->where('id','=',$request->id)->first();
      $ncp->name = $request->name;
      $ncp->brand = $request->brand;
      $ncp->category = $request->category;
      $ncp->compatible_cars = $request->compatible_cars;
      $ncp->description = $request->description;
      $ncp->save();
      return redirect()->back();
    }

    public function updateucp(Request $request){
      $ucp = used_carpart_article::all()->where('id','=',$request->id)->first();
      $ucp->name = $request->name;
      $ucp->brand = $request->brand;
      $ucp->category = $request->category;
      $ucp->compatible_cars = $request->compatible_cars;
      $ucp->description = $request->description;
      $ucp->save();
      return redirect()->back();
      }

    public function adduv(createuvRequest $request){
      $nv = new used_vehicle_article;
      $nv->imagefile="ok";
      $nv->country = $request->country;
      $nv->city = $request->city;
      $nv->user_id = Auth::user()->id;
      $nv->price = $request->price;
      $nv->name = $request->name;
      $nv->brand = $request->brand;
      $nv->model = $request->model;
      $nv->generation = $request->generation;
      $nv->cd_changer_stacker = $request->cd_changer_stacker;
      $nv->four_wheel_drive = $request->four_wheel_drive;
      $nv->air_conditionning = $request->air_conditionning;
      $nv->aluminum_wheels = $request->aluminum_wheels;
      $nv->bed_liner = $request->bed_liner;
      $nv->captains_chairs = $request->captains_chairs;
      $nv->cruise_control = $request->cruise_control;
      $nv->dual_air_conditionning = $request->dual_air_conditionning;
      $nv->dual_power_seats = $request->dual_power_seats;
      $nv->hard_top_convertible = $request->hard_top_convertible;
      $nv->heated_seats = $request->heated_seats;
      $nv->leather_seats = $request->leather_seats;
      $nv->luggage_roofrack = $request->luggage_roofrack;
      $nv->_stereo_system = $request->speciality_stereo_system;
      $nv->soft_top = $request->soft_top;
      $nv->manual_transmission = $request->manual_transmission;
      $nv->navigation_system = $request->navigation_system;
      $nv->power_door_locks = $request->power_door_locks;
      $nv->power_seat = $request->power_seat;
      $nv->power_steering = $request->power_steering;
      $nv->power_windows = $request->power_windows;
      $nv->power_sunroof = $request->power_sunroof;
      $nv->running_boards = $request->running_boards;
      $nv->satelite_radio = $request->satelite_radio;
      $nv->snow_plow_package = $request->snow_plow_package;
      $nv->remote_starter = $request->remote_starter;
      $nv->theft_deterrent_alarm = $request->theft_deterrent_alarm;
      $nv->theft_recovery_system = $request->theft_recovery_system;
      $nv->third_row_seats = $request->third_row_seats;
      $nv->tilt_wheel = $request->tilt_wheel;
      $nv->tonneau_cover_bed_cover = $request->tonneau_cover_bed_cover;
      $nv->towing_trailerpackage = $request->towing_trailerpackage;
      $nv->turbo_diesel = $request->turbo_diesel;
      $nv->hybrid_not_flexfuel = $request->hybrid_not_flexfuel;
      $nv->conversion_package = $request->conversion_package;
      $nv->chrome_wheels_20_or_larger = $request->chrome_wheels_20_or_larger;
      $nv->accident = $request->accident;
      $nv->mileage = $request->mileage;
      $nv->year = $request->year;
      $nv->save();
      $pictures = $request->pictures;
      $i = 0;
      foreach($request->pictures as $image){
        $i++;
        $image_name = $i.'.'. $image->getClientOriginalExtension();
        $image->storeAs('/public/market/Usedvehicles/'.$nv->id.'uv/',$image_name);
      }
      return redirect()->back();
    }


    // UPDATING Used Vehicle Article
    public function updateuv(Request $request){
      $nv = used_vehicle_article::all()->where('id','=',$request->id)->first();
      $nv->price = $request->price;
      $nv->name = $request->name;
      $nv->brand = $request->brand;
      $nv->model = $request->model;
      $nv->generation = $request->generation;
      $nv->cd_changer_stacker = $request->cd_changer_stacker;
      $nv->four_wheel_drive = $request->four_wheel_drive;
      $nv->air_conditionning = $request->air_conditionning;
      $nv->aluminum_wheels = $request->aluminum_wheels;
      $nv->bed_liner = $request->bed_liner;
      $nv->captains_chairs = $request->captains_chairs;
      $nv->cruise_control = $request->cruise_control;
      $nv->dual_air_conditionning = $request->dual_air_conditionning;
      $nv->dual_power_seats = $request->dual_power_seats;
      $nv->hard_top_convertible = $request->hard_top_convertible;
      $nv->heated_seats = $request->heated_seats;
      $nv->leather_seats = $request->leather_seats;
      $nv->luggage_roofrack = $request->luggage_roofrack;
      $nv->_stereo_system = $request->speciality_stereo_system;
      $nv->soft_top = $request->soft_top;
      $nv->manual_transmission = $request->manual_transmission;
      $nv->navigation_system = $request->navigation_system;
      $nv->power_door_locks = $request->power_door_locks;
      $nv->power_seat = $request->power_seat;
      $nv->power_steering = $request->power_steering;
      $nv->power_windows = $request->power_windows;
      $nv->power_sunroof = $request->power_sunroof;
      $nv->running_boards = $request->running_boards;
      $nv->satelite_radio = $request->satelite_radio;
      $nv->snow_plow_package = $request->snow_plow_package;
      $nv->remote_starter = $request->remote_starter;
      $nv->theft_deterrent_alarm = $request->theft_deterrent_alarm;
      $nv->theft_recovery_system = $request->theft_recovery_system;
      $nv->third_row_seats = $request->third_row_seats;
      $nv->tilt_wheel = $request->tilt_wheel;
      $nv->tonneau_cover_bed_cover = $request->tonneau_cover_bed_cover;
      $nv->towing_trailerpackage = $request->towing_trailerpackage;
      $nv->turbo_diesel = $request->turbo_diesel;
      $nv->hybrid_not_flexfuel = $request->hybrid_not_flexfuel;
      $nv->conversion_package = $request->conversion_package;
      $nv->chrome_wheels_20_or_larger = $request->chrome_wheels_20_or_larger;
      $nv->accident = $request->accident;
      $nv->mileage = $request->mileage;
      $nv->year = $request->year;
      $nv->save();
      return redirect()->back();
    }


    // UPDATE New Vehicle Article
    public function updatenv(Request $request){
      $nv = new_vehicle_article::all()->where('id','=',$request->id)->first();
      $nv->price = $request->price;
      $nv->name = $request->name;
      $nv->brand = $request->brand;
      $nv->model = $request->model;
      $nv->generation = $request->generation;
      $nv->cd_changer_stacker = $request->cd_changer_stacker;
      $nv->four_wheel_drive = $request->four_wheel_drive;
      $nv->air_conditionning = $request->air_conditionning;
      $nv->aluminum_wheels = $request->aluminum_wheels;
      $nv->bed_liner = $request->bed_liner;
      $nv->captains_chairs = $request->captains_chairs;
      $nv->cruise_control = $request->cruise_control;
      $nv->dual_air_conditionning = $request->dual_air_conditionning;
      $nv->dual_power_seats = $request->dual_power_seats;
      $nv->hard_top_convertible = $request->hard_top_convertible;
      $nv->heated_seats = $request->heated_seats;
      $nv->leather_seats = $request->leather_seats;
      $nv->luggage_roofrack = $request->luggage_roofrack;
      $nv->_stereo_system = $request->speciality_stereo_system;
      $nv->soft_top = $request->soft_top;
      $nv->manual_transmission = $request->manual_transmission;
      $nv->navigation_system = $request->navigation_system;
      $nv->power_door_locks = $request->power_door_locks;
      $nv->power_seat = $request->power_seat;
      $nv->power_steering = $request->power_steering;
      $nv->power_windows = $request->power_windows;
      $nv->power_sunroof = $request->power_sunroof;
      $nv->running_boards = $request->running_boards;
      $nv->satelite_radio = $request->satelite_radio;
      $nv->snow_plow_package = $request->snow_plow_package;
      $nv->remote_starter = $request->remote_starter;
      $nv->theft_deterrent_alarm = $request->theft_deterrent_alarm;
      $nv->theft_recovery_system = $request->theft_recovery_system;
      $nv->third_row_seats = $request->third_row_seats;
      $nv->tilt_wheel = $request->tilt_wheel;
      $nv->tonneau_cover_bed_cover = $request->tonneau_cover_bed_cover;
      $nv->towing_trailerpackage = $request->towing_trailerpackage;
      $nv->turbo_diesel = $request->turbo_diesel;
      $nv->hybrid_not_flexfuel = $request->hybrid_not_flexfuel;
      $nv->conversion_package = $request->conversion_package;
      $nv->chrome_wheels_20_or_larger = $request->chrome_wheels_20_or_larger;
      $nv->save();
      return redirect()->back();
    }

    public function deleteuv(Request $request){
      $uv = used_vehicle_article::all()->where('id','=',$request->id)->first();
      $uv->delete();
      Storage::deleteDirectory('public/market/Usedvehicles/'.$request->id.'uv');
      return redirect()->back();
    }

    public function deletenv(Request $request){
      $nv = new_vehicle_article::all()->where('id','=',$request->id)->first();
      Storage::deleteDirectory('public/market/Newvehicles/'.$request->id.'nv');
      $nv->delete();
      return redirect()->back();
    }

    /******
    ******
    ******
    ******
    ******
      ROUTES TO FILTERS AND ORDERINGS
    ******
    ******
    ******
    ******
    ******/
    public function newcarpartsdashboard(){
      $data=[
        'list_countries' => $this->Countries(),
        'list_ncp' => $this->getListNewCarpartArticles(),
        'nbr_recent_ncp_month' => $this->getStatisticsOfYear_ncp('2019'),
        'nbr_ncp_articles' => $this->getNbrNewCarpartArticles(),
      ];
      return view('admin.markets.newcarparts')->with($data);
    }

    public function newcarpartsbyday(Request $request){
      $data=[
        'list_countries' => $this->Countries(),
        'list_ncp' => $this->getNcpByDay($request),
        'nbr_recent_ncp_month' => $this->getStatisticsOfYear_ncp('2019'),
        'nbr_ncp_articles' => $this->getNbrNewCarpartArticles(),
      ];
      return view('admin.markets.newcarparts')->with($data);
    }

    public function newcarpartsbymonth(Request $request){
      $data=[
        'list_countries' => $this->Countries(),
        'list_ncp' => $this->getNcpByMonth($request),
        'nbr_recent_ncp_month' => $this->getStatisticsOfYear_ncp('2019'),
        'nbr_ncp_articles' => $this->getNbrNewCarpartArticles(),
      ];
      return view('admin.markets.newcarparts')->with($data);
    }

    public function newcarpartsbyyear(Request $request){
      $data=[
        'list_countries' => $this->Countries(),
        'list_ncp' => $this->getNcpByYear($request),
        'nbr_recent_ncp_month' => $this->getStatisticsOfYear_ncp('2019'),
        'nbr_ncp_articles' => $this->getNbrNewCarpartArticles(),
      ];
      return view('admin.markets.newcarparts')->with($data);
    }

    public function newcarpartsbycountry($country){
      $data=[
        'list_countries' => $this->Countries(),
        'list_ncp' => $this->getNcpByCountry($country),
        'nbr_recent_ncp_month' => $this->getStatisticsOfYear_ncp('2019'),
        'nbr_ncp_articles' => $this->getNbrNewCarpartArticles(),
      ];
      return view('admin.markets.newcarparts')->with($data);
    }

    // NEW VEHICLE ARTICLES SORTING AND FILTERING

    public function newvehiclesdashboard(){
      $data = [
        'list_countries' => $this->Countries(),
        'list_nv' => $this->getListNewVehicleArticles(),
        'nbr_nv_articles' => $this->getNbrNewVehicleArticles(),
        'nbr_recent_nv_month' => $this->getStatisticsOfYear_nv('2019'),
      ];
      return view('admin.markets.newvehicles')->with($data);
    }

    public function newvehiclesbyday(Request $request){
      $data = [
        'list_countries' => $this->Countries(),
        'list_nv' => $this->getNvByDay($request),
        'nbr_nv_articles' => $this->getNbrNewVehicleArticles(),
        'nbr_recent_nv_month' => $this->getStatisticsOfYear_nv('2019'),
      ];
      return view('admin.markets.newvehicles')->with($data);
    }

    public function newvehiclesbymonth(Request $request){
      $data = [
        'list_countries' => $this->Countries(),
        'list_nv' => $this->getNvByMonth($request),
        'nbr_nv_articles' => $this->getNbrNewVehicleArticles(),
        'nbr_recent_nv_month' => $this->getStatisticsOfYear_nv('2019'),
      ];
      return view('admin.markets.newvehicles')->with($data);
    }

    public function newvehiclesbyyear(Request $request){
      $data = [
        'list_countries' => $this->Countries(),
        'list_nv' => $this->getNvByYear($request),
        'nbr_nv_articles' => $this->getNbrNewVehicleArticles(),
        'nbr_recent_nv_month' => $this->getStatisticsOfYear_nv('2019'),
      ];
      return view('admin.markets.newvehicles')->with($data);
    }

    public function newvehiclesbycountry($country){
      $data = [
        'list_countries' => $this->Countries(),
        'list_nv' => $this->getNvByCountry($country),
        'nbr_nv_articles' => $this->getNbrNewVehicleArticles(),
        'nbr_recent_nv_month' => $this->getStatisticsOfYear_nv('2019'),
      ];
      return view('admin.markets.newvehicles')->with($data);
    }

    // USED CARPART ARTICLES SORTING AND FILTERING

    public function usedcarpartsdashboard(){
      $data=[
        'list_countries' => $this->Countries(),
        'list_ucp' => $this->getListUsedCarpartArticles(),
        'nbr_ucp_articles' => $this->getNbrUsedCarpartArticles(),
        'nbr_recent_ucp_month' => $this->getStatisticsOfYear_ucp('2019'),
      ];
      return view('admin.markets.usedcarparts')->with($data);
    }

    public function usedcarpartsbyday(Request $request){
      $data=[
        'list_countries' => $this->Countries(),
        'list_ucp' => $this->getUcpByDay($request),
        'nbr_ucp_articles' => $this->getNbrUsedCarpartArticles(),
        'nbr_recent_ucp_month' => $this->getStatisticsOfYear_ucp('2019'),
      ];
      return view('admin.markets.usedcarparts')->with($data);
    }

    public function usedcarpartsbymonth(Request $request){
      $data=[
        'list_countries' => $this->Countries(),
        'list_ucp' => $this->getUcpByMonth($request),
        'nbr_ucp_articles' => $this->getNbrUsedCarpartArticles(),
        'nbr_recent_ucp_month' => $this->getStatisticsOfYear_ucp('2019'),
      ];
      return view('admin.markets.usedcarparts')->with($data);
    }

    public function usedcarpartsbyyear(Request $request){
      $data=[
        'list_countries' => $this->Countries(),
        'list_ucp' => $this->getUcpByYear($request),
        'nbr_ucp_articles' => $this->getNbrUsedCarpartArticles(),
        'nbr_recent_ucp_month' => $this->getStatisticsOfYear_ucp('2019'),
      ];
      return view('admin.markets.usedcarparts')->with($data);
    }

    public function usedcarpartsbycountry($country){
      $data=[
        'list_countries' => $this->Countries(),
        'list_ucp' => $this->getUcpByCountry($country),
        'nbr_ucp_articles' => $this->getNbrUsedCarpartArticles(),
        'nbr_recent_ucp_month' => $this->getStatisticsOfYear_ucp('2019'),
      ];
      return view('admin.markets.usedcarparts')->with($data);
    }

    // USED VEHICLE ARTICLES SORTING AND FILTERING

    public function usedvehiclesdashboard(){
      $data=[
        'list_countries' => $this->Countries(),
        'list_uv' => $this->getListUsedVehicleArticles(),
        'nbr_uv_articles' => $this->getNbrUsedVehicleArticles(),
        'nbr_recent_uv_month' => $this->getStatisticsOfYear_uv('2019'),
      ];
      return view('admin.markets.usedvehicles')->with($data);
    }

    public function usedvehiclesbyday(Request $request){
      $data=[
        'list_countries' => $this->Countries(),
        'list_uv' => $this->getUvByDay($request),
        'nbr_uv_articles' => $this->getNbrUsedVehicleArticles(),
        'nbr_recent_uv_month' => $this->getStatisticsOfYear_uv('2019'),
      ];
      return view('admin.markets.usedvehicles')->with($data);
    }

    public function usedvehiclesbymonth(Request $request){
      $data=[
        'list_countries' => $this->Countries(),
        'list_uv' => $this->getUvByMonth($request),
        'nbr_uv_articles' => $this->getNbrUsedVehicleArticles(),
        'nbr_recent_uv_month' => $this->getStatisticsOfYear_uv('2019'),
      ];
      return view('admin.markets.usedvehicles')->with($data);
    }

    public function usedvehiclesbyyear(Request $request){
      $data=[
        'list_countries' => $this->Countries(),
        'list_uv' => $this->getUvByYear($request),
        'nbr_uv_articles' => $this->getNbrUsedVehicleArticles(),
        'nbr_recent_uv_month' => $this->getStatisticsOfYear_uv('2019'),
      ];
      return view('admin.markets.usedvehicles')->with($data);
    }

    public function usedvehiclesbycountry($country){
      $data=[
        'list_countries' => $this->Countries(),
        'list_uv' => $this->getUvByCountry($country),
        'nbr_uv_articles' => $this->getNbrUsedVehicleArticles(),
        'nbr_recent_uv_month' => $this->getStatisticsOfYear_uv('2019'),
      ];
      return view('admin.markets.usedvehicles')->with($data);
    }

    // Number of articles by brand
    public function NbrNvByBrand(Request $request){
      $nbr = new_vehicle_article::all()->where('brand','=',$request->brand)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function NbrUvByBrand(Request $request){
      $nbr = used_vehicle_article::all()->where('brand','=',$request->brand)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function NbrNcpByBrand(Request $request){
      $nbr = new_carpart_article::all()->where('brand','=',$request->brand)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }

    public function NbrUcpByBrand(Request $request){
      $nbr = used_carpart_article::all()->where('brand','=',$request->brand)->count();
      return Response::json(array('success'=>true,'nbr' => $nbr,));
    }




}
