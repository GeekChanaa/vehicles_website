<!-- Admin Navbar -->
@extends('layouts.admin')
@section('content')


<!-- Add Generation Form (possibility to add multiple Brands at once) -->
<form  action={{url('/admin/creategeneration')}}"" method="post">
  <span>Name : </span> <input type="text" name="name">
  <span>Brand : </span> <input type="text" name="brand">
  <span>Model : </span> <input type="text" name="model">
  <span>Engine :  </span> <input type="text" name="engine">
  <span>Doors :  </span> <input type="text" name="doors">
  <span>Power :  </span> <input type="text" name="power">
  <span>Maximum Speed :  </span> <input type="text" name="maximum_speed">
  <span>Acceleration from 0 to 100 km : </span> <input type="text" name="acceleration_0_100_kmh">
  <span>Acceleration from 0 to 200 km : </span> <input type="text" name="acceleration_0_200_kmh">
  <span>Acceleration from 0 to 300 km : </span> <input type="text" name="acceleration_0_300_kmh">
  <span>100km/h 0 :  </span> <input type="text" name="s100_kmh_0">
  <span>200km/h 0 :  </span> <input type="text" name="s200_kmh_0">
  <span>Fuel Tank Volume :  </span> <input type="text" name="fuel_tank_volume">
  <span>Adblue Tank : </span> <input type="text" name="adblue_tank">
  <span>Year of putting into production :  </span> <input type="text" name="year_putting_into_production">
  <span>Year of stopping production :  </span> <input type="text" name="year_stopping_production">
  <span>Coupe Type : </span> <input type="text" name="coupe_type">
  <span>Length :  </span> <input type="text" name="length">
  <span>Width :  </span> <input type="text" name="width">
  <span>Width with mirrors folded :  </span> <input type="text" name="width_with_mirrors_folded">
  <span>Width including mirrors :  </span> <input type="text" name="width_including_mirrors">
  <span>Height :  </span> <input type="text" name="height">
  <span>Wheelbase :  </span> <input type="text" name="wheelbase">
  <span>Front Track :  </span> <input type="text" name="front_track">
  <span>Rear Track : </span> <input type="text" name="rear_track">
  <span>Drag Coefficient :  </span> <input type="text" name="drag_coefficient">
  <span>Ride Height :  </span> <input type="text" name="ride_height">
  <span>Approach angle :  </span> <input type="text" name="approach_angle">
  <span>Departure Angle :  </span> <input type="text" name="departure_angle">
  <span>Ramp Angle :  </span> <input type="text" name="ramp_angle">
  <span>Climb Angle : </span> <input type="text" name="climb_angle">
  <span>Front Overhang : </span> <input type="text" name="front_overhang">
  <span>Rear Overhang : </span> <input type="text" name="rear_overhang">
  <span>Wading depth :  </span> <input type="text" name="wading_depth">
  <span>Minimum Volume luggage (trunk) : </span> <input type="text" name="minimum_volume_luggage_(trunk)">
  <span>Maximum volume luggage (trunk) : </span> <input type="text" name="maximum_volume_luggage_(trunk)">
  <span>Model Engine :  </span> <input type="text" name="model_engine">
  <span>Position Engine : </span> <input type="text" name="position_engine">
  <span>Engine displacement : </span> <input type="text" name="engine_displacement">
  <span>Maximum Engine speed : </span> <input type="text" name="maximum_engine_speed">
  <span>Torque :  </span> <input type="text" name="torque">
  <span>Fuel System : </span> <input type="text" name="fuel_system">
  <span>Turbine : </span> <input type="text" name="turbine">
  <span>Valvetrain : </span> <input type="text" name="valvetrain">
  <span>Position of cylinders : </span> <input type="text" name="position_of_cylinders">
  <span>Number of cylinders : </span> <input type="text" name="number_of_cylinders">
  <span>Cylinder bore : </span> <input type="text" name="cylinder_bore">
  <span>Piston stroke : </span> <input type="text" name="piston_stroke">
  <span>Compression ratio : </span> <input type="text" name="compression_ratio">
  <span>Number of valves per cylinder : </span> <input type="text" name="number_of_valves_per_cylinder">
  <span>Engine oil capacity : </span> <input type="text" name="engine_oil_capacity">
  <span>Coolant : </span> <input type="text" name="coolant">
  <span>Fuel Type :  </span> <input type="text" name="fuel_type">
  <span>Drive Wheel : </span> <input type="text" name="drive_wheel">
  <span>Number of Gears (automatic transmission) : </span> <input type="text" name="number_of_gears_(automatic_transmission)">
  <span>Number of Gears (manual transmission) : </span> <input type="text" name="number_of_gears_(manual_transmission)">
  <span>Front Suspension : </span> <input type="text" name="front_suspension">
  <span>Rear Suspension : </span> <input type="text" name="rear_suspension">
  <span>Front Brakes : </span> <input type="text" name="front_brakes">
  <span>Rear brakes : </span> <input type="text" name="rear_brakes">
  <span>ABS : </span> <input type="text" name="abs">
  <span>Steering type : </span> <input type="text" name="steering_type">
  <span>Power steering : </span> <input type="text" name="power_steering">
  <span>Minimum turning circle (turning diameter) : </span> <input type="text" name="minimum_turning_circle_(turning_diameter)">
  <span>Fuel consumption (economy) urban : </span> <input type="text" name="fuel_consumption_(economy)_urban">
  <span>Fuel consumption (economy) extra urban : </span> <input type="text" name="fuel_consumption_(economy)_extra_urban">
  <span>Fuel consumption (economy) combined : </span> <input type="text" name="fuel_consumption_(economy)_combined">
  <span>Emission standard : </span> <input type="text" name="emission_standard">
  <span>CO2 Emissions : </span> <input type="text" name="CO2_emissions">
  <span>Kerb weight :  </span> <input type="text" name="kerb_weight">
  <span>Max weight :  </span> <input type="text" name="max_weight">
  <span>Max roof load : </span> <input type="text" name="max_roof_load">
  <span>Permitted trailer load with brakes (8%) : </span> <input type="text" name="permitted_trailer_load_with_brakes_(8%)">
  <span>Permitted trailed load with brakes (12%) : </span> <input type="text" name="permitted_trailer_load_with_brakes_(12%)">
  <span>Permitted trailed load with brakes without brakes : </span> <input type="text" name="permitted_trailer_load_without_brakes">
  <span>Permitted towbar download : </span> <input type="text" name="permitted_towbar_download">
  <span>Tire size : </span> <input type="text" name="tire_size">
  <span>Wheel rims size : </span> <input type="text" name="wheel_rims_size">
  <span>Battery capacity : </span> <input type="text" name="battery_capacity">
  <span>All electric range : </span> <input type="text" name="all_electric_range">
  <span>Electric motor power : </span> <input type="text" name="electric_motor_power">
  <span>Electric motor torque : </span> <input type="text" name="electric_motor_torque">
  <span>ICE power : </span> <input type="text" name="ICE_power">
  <span>ICE torque : </span> <input type="text" name="ICE_torque">
  <span>Average energy consumption : </span> <input type="text" name="average_energy_consumption">
  <button type="submit" class="btn btn-danger"> Go </button>
</form>





<!-- Add the Logo And Images (multiple images possible too) of the generation (possibility to upload image or to write its name directly)-->






<!-- Add a DB file directly to the DB (with verifying) -->




@endsection
