<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\generation ;

class generationsController extends Controller
{
    //
    public function create(Request $request){
      $generation = new generation ;
      $generation->name = $request->name ;
      $generation->name = $request->name ;
      $generation->brand = $request->brand ;
      $generation->model = $request->model ;
      $generation->engine = $request->engine ;
      $generation->doors = $request->doors ;
      $generation->power = $request->power ;
      $generation->gearbox = 'automatic' ;
      $generation->maximum_speed = $request->maximum_speed ;
      $generation->acceleration_0_100_km_h = $request->acceleration_0_100_kmh ;
      $generation->acceleration_0_200_km_h = $request->acceleration_0_200_kmh ;
      $generation->acceleration_0_300_km_h = $request->acceleration_0_300_kmh ;
      $generation->fuel_tank_volume = $request->fuel_tank_volume ;
      $generation->adblue_tank = $request->adblue_tank ;
      $generation->year_putting_into_production = $request->year_putting_into_production ;
      $generation->year_stopping_production = $request->year_stopping_production ;
      $generation->coupe_type = $request->coupe_type ;
      $generation->length = $request->length ;
      $generation->width = $request->width ;
      $generation->width_with_mirrors_folded = $request->width_with_mirrors_folded ;
      $generation->width_including_mirrors = $request->width_including_mirrors ;
      $generation->height = $request->height ;
      $generation->wheelbase = $request->wheelbase ;
      $generation->front_track = $request->front_track ;
      $generation->rear_track = $request->rear_track ;
      $generation->drag_coefficient = $request->drag_coefficient ;
      $generation->ride_height = $request->ride_height ;
      $generation->approach_angle = $request->approach_angle ;
      $generation->departure_angle = $request->departure_angle ;
      $generation->ramp_angle = $request->ramp_angle ;
      $generation->climb_angle = $request->climb_angle ;
      $generation->front_overhang = $request->front_overhang ;
      $generation->rear_overhang = $request->rear_overhang ;
      $generation->wading_depth = $request->wading_depth ;
      $generation->minimum_volume_luggage = $request->minimum_volume_luggage_trunk ;
      $generation->maximum_volume_luggage = $request->maximum_volume_luggage_trunk ;
      $generation->model_engine = $request->model_engine ;
      $generation->position_engine = $request->position_engine ;
      $generation->engine_displacement = $request->engine_displacement ;
      $generation->maximum_engine_speed = $request->maximum_engine_speed ;
      $generation->torque = $request->torque ;
      $generation->fuel_system = $request->fuel_system ;
      $generation->turbine = $request->turbine ;
      $generation->valvetrain = $request->valvetrain ;
      $generation->position_of_cylinders = $request->position_of_cylinders ;
      $generation->number_of_cylinders = $request->number_of_cylinders ;
      $generation->cylinder_bore = $request->cylinder_bore ;
      $generation->piston_stroke = $request->piston_stroke ;
      $generation->compression_ratio = $request->compression_ratio ;
      $generation->number_of_valves_per_cylinder = $request->number_of_valves_per_cylinder ;
      $generation->engine_oil_capacity = $request->engine_oil_capacity ;
      $generation->coolant = $request->coolant ;
      $generation->fuel_type = $request->fuel_type ;
      $generation->drive_wheel = $request->drive_wheel ;
      $generation->number_of_gears_automatic_transmission = $request->number_of_gears_automatic_transmission ;
      $generation->number_of_gears_manual_transmission = $request->number_of_gears_manual_transmission ;
      $generation->front_suspension = $request->front_suspension ;
      $generation->rear_suspension = $request->rear_suspension ;
      $generation->front_brakes = $request->front_brakes ;
      $generation->rear_brakes = $request->rear_brakes ;
      $generation->abs = $request->abs ;
      $generation->steering_type = $request->steering_type ;
      $generation->power_steering = $request->power_steering ;
      $generation->minimum_turning_circle_turning_diameter = $request->minimum_turning_circle_turning_diameter ;
      $generation->fuel_consumption_economy_urban = $request->fuel_consumption_economy_urban ;
      $generation->fuel_consumption_economy_extra_urban = $request->fuel_consumption_economy_extra_urban ;
      $generation->fuel_consumption_economy_combined = $request->fuel_consumption_economy_combined ;
      $generation->emission_standard = $request->emission_standard ;
      $generation->CO2_emissions = $request->CO2_emissions ;
      $generation->kerb_weight = $request->kerb_weight ;
      $generation->max_weight = $request->max_weight ;
      $generation->max_roof_load = $request->max_roof_load ;
      $generation->permitted_trailer_load_with_brakes_8percent = $request->permitted_trailer_load_with_brakes_8percent ;
      $generation->permitted_trailer_load_with_brakes_12percent = $request->permitted_trailer_load_with_brakes_12percent ;
      $generation->permitted_trailer_load_without_brakes = $request->permitted_trailer_load_without_brakes ;
      $generation->permitted_towbar_download = $request->permitted_towbar_download ;
      $generation->tire_size = $request->tire_size ;
      $generation->wheel_rims_size = $request->wheel_rims_size ;
      $generation->battery_capacity = $request->battery_capacity ;
      $generation->all_electric_range = $request->all_electric_range ;
      $generation->electric_motor_power = $request->electric_motor_power ;
      $generation->electric_motor_torque = $request->electric_motor_torque ;
      $generation->ICE_power = $request->ICE_power ;
      $generation->ICE_torque = $request->ICE_torque ;
      $generation->average_energy_consumption = $request->average_energy_consumption ;
      $generation->save();

      // Image Files :
      $image = $request->file('image_front');
      $image_name = 'front.' . $image->getClientOriginalExtension();
      $image->storeAs('/public/generations/'.$generation->id,$image_name);

      $image = $request->file('image_side');
      $image_name = 'side.' . $image->getClientOriginalExtension();
      $image->storeAs('/public/generations/'.$generation->id,$image_name);

      $image = $request->file('image_rear');
      $image_name = 'rear.' . $image->getClientOriginalExtension();
      $image->storeAs('/public/generations'.'/'.$generation->id,$image_name);

      return redirect()->back();
    }
}
