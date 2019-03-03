<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\workshop;
use App\carwash;
use Auth;

class servicesController extends Controller
{
    //
    public function index(){
      return view('services.index');
    }

    public function newcarwash(){
      return view('services.new_carwash');
    }

    public function newworkshop(){
      return view('services.new_workshop');
    }

    public function carwash_owner_interface(){
      return view('services.carwash_owner_interface');
    }

    public function workshop_owner_interface(){
      return view('services.workshop_owner_interface');
    }

    public function workshops(){
      return view('services.workshops');
    }

    public function carwashes(){
      return view('services.carwashes');
    }

    public function createcarwash(Request $request){
      $carwash = new carwash;
      $carwash->name=$request->name;
      $carwash->owner_id = Auth::user()->id;
      $carwash->save();
      return redirect()->back();
    }

    public function createworkshop(Request $request){
      $workshop = new workshop;
      $workshop->name=$request->name;
      $workshop->owner_id= Auth::user()->id;
      $workshop->save();
      return redirect()->back();
    }
}
