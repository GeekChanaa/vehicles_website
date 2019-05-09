<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\new_vehicle_article;
use Auth;

/* New Vehicle Articles controller */


class nvaController extends Controller
{
  public function create(Request $request){
    $nvh = new new_vehicle_article;
    $nvh->user_id = Auth::user()->id;
    $nvh->imagefile = $request->imagefile ;
    $nvh->price = $request->price ;
    $nvh->name = $request->name ;
    $nvh->brand = $request->brand ;
    $nvh->model = $request->model ;
    $nvh->generation = $request->generation ;
    $nvh->cd_changer_stacker = $request->cd_changer_stacker ;
    $nvh->four_wheel_drive = $request->four_wheel_drive ;
    $nvh->air_conditionning = $request->air_conditionning ;
    $nvh->aluminum_wheels = $request->aluminum_wheels ;
    $nvh->bed_liner = $request->bed_liner ;
    $nvh->captains_chairs = $request->captains_chairs ;
    $nvh->cruise_control = $request->cruise_control ;
    $nvh->dual_air_conditionning = $request->dual_air_conditionning ;
    $nvh->dual_power_seats = $request->dual_power_seats ;
    $nvh->hard_top_convertible = $request->hard_top_convertible ;
    $nvh->heated_seats = $request->heated_seats ;
    $nvh->leather_seats = $request->leather_seats ;
    $nvh->luggage_roofrack = $request->luggage_roofrack ;
    $nvh->specialty_stereo_system = $request->specialty_stereo_system ;
    $nvh->soft_top = $request->soft_top ;
    $nvh->manual_transmission = $request->manual_transmission ;
    $nvh->navigation_system = $request->navigation_system ;
    $nvh->power_door_locks = $request->power_door_locks ;
    $nvh->power_seat = $request->power_seat ;
    $nvh->power_steering = $request->power_steering ;
    $nvh->power_sunroof = $request->power_sunroof ;
    $nvh->power_windows = $request->power_windows ;
    $nvh->running_boards = $request->running_boards ;
    $nvh->satelite_radio = $request->satelite_radio ;
    $nvh->snow_plow_package = $request->snow_plow_package ;
    $nvh->remote_starter = $request->remote_starter ;
    $nvh->theft_deterrent_alarm = $request->theft_deterrent_alarm ;
    $nvh->theft_recovery_system = $request->theft_recovery_system ;
    $nvh->third_row_seats = $request->third_row_seats ;
    $nvh->tilt_wheel = $request->tilt_wheel ;
    $nvh->tonneau_cover_bed_cover = $request->tonneau_cover_bed_cover ;
    $nvh->towing_trailerpackage = $request->towing_trailerpackage ;
    $nvh->turbo_diesel = $request->turbo_diesel ;
    $nvh->hybrid_not_flexfuel = $request->hybrid_not_flexfuel ;
    $nvh->conversion_package = $request->conversion_package ;
    $nvh->chrome_wheels_20_or_larger = $request->chrome_wheels_20_or_larger ;
    $nvh->save();
    $images = Input::file('pictures');
    $i = 0;
    foreach($images as $image){
      $i++;
      $image_name = $i.'.'. $image->getClientOriginalExtension();
      $image->storeAs('/public/brands/'.$nvh->id,$image_name);
    }

  }
    //
}
