<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\brand;
use App\country;
use App\generation;
use App\technology;
use App\vmodel;

class encyclopediadashboard extends Controller
{

    // ################### GETTERS ################### //

    public function ListModels(){
      return vmodel::paginate(50);
    }

    public function ListBrands(){
      return brand::paginate(50);
    }

    public function ListGenerations(){
      return generation::paginate(50);
    }

    public function getListVehicleBrands(){
      return brand::all()->where('specialty','=','vehicles');
    }

    public function getListCarpartBrands(){
      return brand::all()->where('specialty','=','carparts');
    }

    public function getNbrBrands(){
      return brand::all()->count();
    }

    public function getNbrModels(){
      return vmodel::all()->count();
    }

    public function getNbrGenerations(){
      return generation::all()->count();
    }

    public function getNbrVehicleBrands(){
      return brand::all()->where('specialty','=','vehicles')->count();
    }

    public function getNbrCarpartBrands(){
      return brand::all()->where('specialty','=','carparts')->count();
    }






    public function statistics(){
      $data=[
        'list_brands' => brand::orderBy('name', 'desc')->paginate(15),
        'list_models' => vmodel::paginate(15),
        'list_generations' => generation::paginate(15),
        'nbr_brands' => $this->getNbrBrands(),
        'nbr_models' => $this->getNbrModels(),
        'nbr_generations' => $this->getNbrGenerations(),
        'rate_models_per_brand' => $this->getNbrModels()/$this->getNbrBrands(),
        'rate_generations_per_model' => $this->getNbrGenerations()/$this->getNbrModels(),
        'rate_generations_per_brand' => $this->getNbrGenerations()/$this->getNbrBrands(),
      ];
      return view('admin.encyclopedia.statistics')->with($data);
    }



    public function addvmodel(){
      $data=[
        'list_brands' => $this->getListBrands(),
      ];
      return view('admin.encyclopedia.addmodel')->with($data);
    }


    public function getBrandsOfCountry($country){
      $brands = brand::all()->where('headquarters','=',$country);
      return $brands;
    }

    public function uploadLogo(Request $request){
      $image = $request->file('imagef');
      $image_name = $request->name . '.' . $image->getClientOriginalExtension();
      $image->storeAs('/public/brands',$image_name);
      return redirect()->back();
    }

    // Listing of Brands
    public function brands(){
      $data=[
        'list_brands' => $this->ListBrands(),
        'nbr_brands' => $this->getNbrBrands(),
        'nbr_vehicle_brands' => $this->getNbrVehicleBrands(),
        'nbr_carpart_brands' => $this->getNbrCarpartBrands(),
      ];
      return view('admin.encyclopedia.brands')->with($data);
    }


    // Listing Of Models
    public function models(){
      $data=[
        'list_models' => $this->ListModels(),
        'nbr_vmodels' => $this->getNbrModels(),
        'rate_vmodels_by_brand' => $this->getNbrModels()/($this->getNbrBrands()),
      ];
      return view('admin.encyclopedia.models')->with($data);
    }


    // Listing Of generations
    public function generations(){
      $rate_generation_by_model = $this->getNbrGenerations()/($this->getNbrModels()+0.1);
      $data=['rate_generation_by_model' => $rate_generation_by_model,
        'nbr_generations' => $this->getNbrGenerations(),
        'list_generations' => $this->ListGenerations()
      ];
      return view('admin.encyclopedia.generations')->with($data);
    }

    public function addgeneration(){

      $data=[
        'list_brands' => $this->getListVehicleBrands(),
        'list_models' => $this->getListModels(),
      ];
      return view('admin.encyclopedia.addgeneration')->with($data);
    }

    public function editors(){
      return view('admin.encyclopedia.editors');
    }

    public function moderators(){
      return view('admin.encyclopedia.moderators');
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

    public function createBrand(Request $request){

      $brand = new brand;
      $brand->name = $request->name ;
      $brand->year_foundation = $request->year_foundation ;
      $brand->headquarters = $request->headquarters ;
      $brand->CEO = $request->CEO ;
      $brand->website = $request->website ;
      $brand->production_output = $request->production_output ;
      $brand->revenue = $request->revenue ;
      $brand->net_income = $request->net_income ;
      $brand->nbr_of_employees = $request->nbr_of_employees ;
      $brand->description = $request->description ;
      $brand->specialty = $request->specialty ;
      $brand->save();

      $image = $request->file('imagef');
      $image_name = $brand->name . '.' . $image->getClientOriginalExtension();
      $image->storeAs('/public/brands',$image_name);
      return redirect()->back();
      }

    public function addbrand(){
      $countries = country::select('name')->get();
      $data=[
        'countries' => $countries,
      ];
      return view('admin.encyclopedia.addbrand')->with($data);
    }

}
