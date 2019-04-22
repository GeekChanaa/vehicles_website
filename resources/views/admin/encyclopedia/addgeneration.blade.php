<!-- Admin Navbar -->
@extends('layouts.admin')
@section('content')


<!-- Add Generation Form (possibility to add multiple Brands at once) -->
<form  action="{{url('/admin/creategeneration')}}" method="post">
  <span class="add-generation-sp">Name : </span> <input class="add-generation-inp" type="text" name="name">
  <span class="add-generation-sp">Brand : </span> <select class="add-generation-inp" name="brand">
    @foreach($list_brands as $brand)
    <option> {{$brand->name}} </option>
    @endforeach
   </select>
  <span class="add-generation-sp">Model : </span>
  <select class="add-generation-inp" name="model">
    @foreach($list_models as $model)
    <option> {{$model->name}} </option>
    @endforeach
  </select>
  <span class="add-generation-sp">Engine :  </span> <input class="add-generation-inp" type="text" name="engine">
  <span class="add-generation-sp">Doors (including trunk) :  </span> <input class="add-generation-inp" type="text" name="doors">
  <span class="add-generation-sp">Power :  </span> <input class="add-generation-inp" type="text" name="power">
  <span class="add-generation-sp">Maximum Speed :  </span> <input class="add-generation-inp" type="text" name="maximum_speed">
  <span class="add-generation-sp">Acceleration from 0 to 100 km : </span> <input class="add-generation-inp" type="text" name="acceleration_0_100_kmh">
  <span class="add-generation-sp">Acceleration from 0 to 200 km : </span> <input class="add-generation-inp" type="text" name="acceleration_0_200_kmh">
  <span class="add-generation-sp">Acceleration from 0 to 300 km : </span> <input class="add-generation-inp" type="text" name="acceleration_0_300_kmh">
  <span class="add-generation-sp">100km/h 0 :  </span> <input class="add-generation-inp" type="text" name="s100_kmh_0">
  <span class="add-generation-sp">200km/h 0 :  </span> <input class="add-generation-inp" type="text" name="s200_kmh_0">
  <span class="add-generation-sp">Fuel Tank Volume :  </span> <input class="add-generation-inp" type="text" name="fuel_tank_volume">
  <span class="add-generation-sp">Adblue Tank : </span> <input class="add-generation-inp" type="text" name="adblue_tank">
  <span class="add-generation-sp">Year of putting into production :  </span> <input class="add-generation-inp" type="text" name="year_putting_into_production">
  <span class="add-generation-sp">Year of stopping production :  </span> <input class="add-generation-inp" type="text" name="year_stopping_production">
  <span class="add-generation-sp">Coupe Type : </span> <input class="add-generation-inp" type="text" name="coupe_type">
  <span class="add-generation-sp">Length :  </span> <input class="add-generation-inp" type="text" name="length">
  <span class="add-generation-sp">Width :  </span> <input class="add-generation-inp" type="text" name="width">
  <span class="add-generation-sp">Width with mirrors folded :  </span> <input class="add-generation-inp" type="text" name="width_with_mirrors_folded">
  <span class="add-generation-sp">Width including mirrors :  </span> <input class="add-generation-inp" type="text" name="width_including_mirrors">
  <span class="add-generation-sp">Height :  </span> <input class="add-generation-inp" type="text" name="height">
  <span class="add-generation-sp">Wheelbase :  </span> <input class="add-generation-inp" type="text" name="wheelbase">
  <span class="add-generation-sp">Front Track :  </span> <input class="add-generation-inp" type="text" name="front_track">
  <span class="add-generation-sp">Rear Track : </span> <input class="add-generation-inp" type="text" name="rear_track">
  <span class="add-generation-sp">Drag Coefficient :  </span> <input class="add-generation-inp" type="text" name="drag_coefficient">
  <span class="add-generation-sp">Ride Height :  </span> <input class="add-generation-inp" type="text" name="ride_height">
  <span class="add-generation-sp">Approach angle :  </span> <input class="add-generation-inp" type="text" name="approach_angle">
  <span class="add-generation-sp">Departure Angle :  </span> <input class="add-generation-inp" type="text" name="departure_angle">
  <span class="add-generation-sp">Ramp Angle :  </span> <input class="add-generation-inp" type="text" name="ramp_angle">
  <span class="add-generation-sp">Climb Angle : </span> <input class="add-generation-inp" type="text" name="climb_angle">
  <span class="add-generation-sp">Front Overhang : </span> <input class="add-generation-inp" type="text" name="front_overhang">
  <span class="add-generation-sp">Rear Overhang : </span> <input class="add-generation-inp" type="text" name="rear_overhang">
  <span class="add-generation-sp">Wading depth :  </span> <input class="add-generation-inp" type="text" name="wading_depth">
  <span class="add-generation-sp">Minimum Volume luggage (trunk) : </span> <input class="add-generation-inp" type="text" name="minimum_volume_luggage_(trunk)">
  <span class="add-generation-sp">Maximum volume luggage (trunk) : </span> <input class="add-generation-inp" type="text" name="maximum_volume_luggage_(trunk)">
  <span class="add-generation-sp">Model Engine :  </span> <input class="add-generation-inp" type="text" name="model_engine">

  <span class="add-generation-sp">Position Engine : </span>
  <select class="add-generation-inp" name="position_engine">
    <option value=">Not specified">Not specified </option>
    <option value=">Middle, transversely">Middle, transversely </option>
    <option value=">Middle, longitudinal">Middle, longitudinal </option>
    <option value=">Rear, transversely">Rear, transversely </option>
    <option value=">Rear, longitudinal">Rear, longitudinal </option>
    <option value=">Front, transversely">Front, transversely </option>
    <option value=">Front, longitudinal">Front, longitudinal </option>
  </select>

  <span class="add-generation-sp">Engine displacement : </span> <input class="add-generation-inp" type="text" name="engine_displacement">
  <span class="add-generation-sp">Maximum Engine speed : </span> <input class="add-generation-inp" type="text" name="maximum_engine_speed">
  <span class="add-generation-sp">Torque :  </span> <input class="add-generation-inp" type="text" name="torque">
  <span class="add-generation-sp">Fuel System : </span>
  <select class="add-generation-inp" name="fuel_system">
    <option value="Not Specified">Not Specified </option>
    <option value="Hybrid">Hybrid </option>
    <option value="Diesel - Standard diesel injection (SDI)">Diesel - Standard diesel injection (SDI) </option>
    <option value="Diesel Commonrail">Diesel Commonrail </option>
    <option value="Carburettor">Carburettor </option>
    <option value="Mono-point injection">Mono-point injection </option>
    <option value="Direct-injection">Direct-injection </option>
    <option value="Multi-point injection">Multi-point injection </option>
    <option value="Pump-nozzle (Unit Injector)">Pump-nozzle (Unit Injector) </option>
    <option value="Direct injection / Multi-point injection">Direct injection / Multi-point injection </option>

  </select>
  <span class="add-generation-sp">Turbine : </span>
  <select class="add-generation-inp" name="turbine">
    <option value="Not Specified">Not Specified </option>
    <option value="Turbocharger / Intercooler">Turbocharger / Intercooler </option>
    <option value="Mechanical supercharging (Compressor)">Mechanical supercharging (Compressor) </option>
    <option value="Turbocharger">Turbocharger </option>
    <option value="Twin-Turbo">Twin-Turbo </option>
    <option value="BiTurbo">BiTurbo </option>
    <option value="Twin-power turbo">Twin-power turbo </option>
    <option value="Turbocharging / Mechanical supercharging (Compressor)">Turbocharging / Mechanical supercharging (Compressor) </option>
    <option value="4 Turbochargers">4 Turbochargers </option>
    <option value="Twin-Turbo / e-Turbocharger">Twin-Turbo / e-Turbocharger </option>
  </select>
  <span class="add-generation-sp">Valvetrain : </span> <input class="add-generation-inp" type="text" name="valvetrain">

  <span class="add-generation-sp">Position of cylinders : </span>
  <select class="add-generation-inp" name="position_of_cylinders">
    <option value="Not Specified">Not Specified </option>
    <option value="V engine">V engine </option>
    <option value="W engine">W engine </option>
    <option value="Boxer">Boxer </option>
    <option value="Rotary (Wankel">Rotary (Wankel)</option>
    <option value="Online">Online </option>
  </select>

  <span class="add-generation-sp">Number of cylinders : </span> <input class="add-generation-inp" type="text" name="number_of_cylinders">
  <span class="add-generation-sp">Cylinder bore : </span> <input class="add-generation-inp" type="text" name="cylinder_bore">
  <span class="add-generation-sp">Piston stroke : </span> <input class="add-generation-inp" type="text" name="piston_stroke">
  <span class="add-generation-sp">Compression ratio : </span> <input class="add-generation-inp" type="text" name="compression_ratio">
  <span class="add-generation-sp">Number of valves per cylinder : </span> <input class="add-generation-inp" type="text" name="number_of_valves_per_cylinder">
  <span class="add-generation-sp">Engine oil capacity : </span> <input class="add-generation-inp" type="text" name="engine_oil_capacity">
  <span class="add-generation-sp">Coolant : </span> <input class="add-generation-inp" type="text" name="coolant">
  <span class="add-generation-sp">Fuel Type :
  </span> <select class="add-generation-inp" name="fuel_type">
    <option value="Not Specified">Not Specified"</option>
    <option value="Petrol">Petrol"</option>
    <option value="Diesel">Diesel"</option>
    <option value="Mixture of two stroke engines">Mixture of two stroke engines"</option>
    <option value="Petrol / LPG">Petrol / LPG"</option>
    <option value="Petrol / CNG">Petrol / CNG"</option>
    <option value="Electricity">Electricity"</option>
    <option value="Hybrid - petrol / electricity">Hybrid - petrol / electricity"</option>
    <option value="Hybrid - diesel / electricity">Hybrid - diesel / electricity"</option>
    <option value="Petrol / Ethanol - E85">Petrol / Ethanol - E85"</option>
    <option value="Hybrid - petrol / Ethanol - E85 / Electricity">Hybrid - petrol / Ethanol - E85 / Electricity"</option>
    <option value="Hydrogen">Hydrogen"</option>
    <option value="Hydrogen / Electricity">Hydrogen / Electricity"</option>
  </select>
  <span class="add-generation-sp">Drive Wheel : </span>
  <select class="add-generation-inp" name="drive_wheel">
    <option>Not Specified </option>
    <option>Rear Wheel Drive </option>
    <option>Front Wheel Drive </option>
    <option>All Wheel Drive (4x4) </option>
  </select>
  <span class="add-generation-sp">Number of Gears (automatic transmission) : </span> <input class="add-generation-inp" type="text" name="number_of_gears_(automatic_transmission)">
  <span class="add-generation-sp">Number of Gears (manual transmission) : </span> <input class="add-generation-inp" type="text" name="number_of_gears_(manual_transmission)">
  <span class="add-generation-sp">Front Suspension : </span>
  <select class="add-generation-inp" name="front_suspension">
    <option value="Co McPherson strut">Co McPherson strut </option>
    <option value="McPherson">McPherson </option>
    <option value="The depreciated rack">The depreciated rack </option>
    <option value="Helical spring">Helical spring </option>
    <option value="Hydrolic Elements">Hydrolic Elements </option>
    <option value="Hydro pneumatic element">Hydro pneumatic element </option>
    <option value="Double wishbone">Double wishbone </option>
    <option value="Dependent, spring from antiroll">Dependent, spring from antiroll </option>
    <option value="Multi-link suspension">Multi-link suspension </option>
    <option value="Inclined Lever">Inclined Lever </option>
    <option value="Independent multi-link">Independent multi-link </option>
    <option value="Independent type McPherson">Independent type McPherson </option>
    <option value="Independent torsion bar, double wishbone">Independent torsion bar, double wishbone </option>
    <option value="Independent, spring">Independent, spring </option>
    <option value="Independent, Spring McPherson, with stabilizer">Independent, Spring McPherson, with stabilizer </option>
    <option value="One-piece beam bridge">One-piece beam bridge </option>
    <option value="Several levers and rods">Several levers and rods </option>
    <option value="Pneumatic elastic element">Pneumatic elastic element </option>
    <option value="Rotary Fist">Rotary Fist </option>
    <option value="Suspension with traction connecting levers">Suspension with traction connecting levers </option>
    <option value="Spring-loaded rack">Spring-loaded rack </option>
    <option value="Wishbone">Wishbone </option>
    <option value="Transverse stabilizer">Transverse stabilizer </option>
    <option value="Trailing">Trailing </option>
    <option value="The spring">The spring </option>
    <option value="Torsion">Torsion </option>
  </select>

  <span class="add-generation-sp">Rear Suspension : </span>
  <select class="add-generation-inp" name="rear_suspension">
      <option value="The depreciated rack">The depreciated rack </option>
      <option value="Helical spring">Helical spring </option>
      <option value="Hydraulic elements">Hydraulic elements </option>
      <option value="Hydro-pneumatic element">Hydro-pneumatic element </option>
      <option value="Double wishbone">Double wishbone </option>
      <option value="dependent spring suspension">dependent spring suspension </option>
      <option value="dependent spring suspension with transverse steering rod">dependent spring suspension with transverse steering rod </option>
      <option value="Dependent, multi-link spring with telescopic shock absorbers">Dependent, multi-link spring with telescopic shock absorbers </option>
      <option value="conditional suspension of two longitudinal semi-elliptic leaf springs">conditional suspension of two longitudinal semi-elliptic leaf springs </option>
      <option value="McPherson">McPherson </option>
      <option value="Multi-link independent">Multi-link independent </option>
      <option value="Inclined Lever">Inclined Lever </option>
      <option value="Threaded twist beam">Threaded twist beam </option>
      <option value="independent torsion suspension">independent torsion suspension </option>
      <option value="Independent on trapezoidal lever">Independent on trapezoidal lever </option>
      <option value="Independent, spring">Independent, spring </option>
      <option value="Independent, spring multi-link with stabilizer">Independent, spring multi-link with stabilizer </option>
      <option value="One-piece beam bridge">One-piece beam bridge </option>
      <option value="Several levers and rods">Several levers and rods </option>
      <option value="Pneumatic suspension">Pneumatic suspension </option>
      <option value="Pneumatic elastic element">Pneumatic elastic element </option>
      <option value="Rotary Fist">Rotary Fist </option>
      <option value="Suspension De-Dion">Suspension De-Dion </option>
      <option value="Suspension with traction connecting levers">Suspension with traction connecting levers </option>
      <option value="Spring-loaded rack">Spring-loaded rack </option>
      <option value="Semi-dependent beam with stabilizer lateral stability">Semi-dependent beam with stabilizer lateral stability </option>
      <option value="Semi-dependent on the trailing arm with transverse torsion shaft">Semi-dependent on the trailing arm with transverse torsion shaft </option>
      <option value="Semi-independent, spring">Semi-independent, spring </option>
      <option value="Wishbone">Wishbone </option>
      <option value="Transverse stabilizer">Transverse stabilizer </option>
      <option value="Trailing">Trailing </option>
      <option value="The spring">The spring </option>
      <option value="Coil spring">Coil spring </option>
      <option value="Torsion">Torsion </option>
      <option value="Elastic beam">Elastic beam </option>
  </select>

  <span class="add-generation-sp">Front Brakes : </span>
  <select class="add-generation-inp" name="front_brakes">
    <option value="Not Specified">Not Specified </option>
    <option value="Drum">Drum </option>
    <option value="Disc">Disc </option>
    <option value="Ventilated discs">Ventilated discs </option>
  </select>

  <span class="add-generation-sp">Rear brakes : </span>
  <select class="add-generation-inp" name="rear_brakes">
    <option value="Not Specified">Not Specified </option>
    <option value="Drum">Drum </option>
    <option value="Disc">Disc </option>
    <option value="Ventilated discs">Ventilated discs </option>
  </select>

  <span class="add-generation-sp">ABS : </span> <input class="add-generation-inp" type="text" name="abs">
  <span class="add-generation-sp">Steering type : </span>
  <select class="add-generation-inp" type="text" name="steering_type">
    <option value="Not specified ">Not specified </option>
    <option value="Cone worm with recirculation balls">Cone worm with recirculation balls </option>
    <option value="Worm-reduction unit">Worm-reduction unit </option>
    <option value="Steering rack">Steering rack </option>
  </select>
  <span class="add-generation-sp">Power steering : </span> <input class="add-generation-inp" type="text" name="power_steering">
  <span class="add-generation-sp">Minimum turning circle (turning diameter) : </span> <input class="add-generation-inp" type="text" name="minimum_turning_circle_(turning_diameter)">
  <span class="add-generation-sp">Fuel consumption (economy) urban : </span> <input class="add-generation-inp" type="text" name="fuel_consumption_(economy)_urban">
  <span class="add-generation-sp">Fuel consumption (economy) extra urban : </span> <input class="add-generation-inp" type="text" name="fuel_consumption_(economy)_extra_urban">
  <span class="add-generation-sp">Fuel consumption (economy) combined : </span> <input class="add-generation-inp" type="text" name="fuel_consumption_(economy)_combined">
  <span class="add-generation-sp">Emission standard : </span> <input class="add-generation-inp" type="text" name="emission_standard">
  <span class="add-generation-sp">CO2 Emissions : </span> <input class="add-generation-inp" type="text" name="CO2_emissions">
  <span class="add-generation-sp">Kerb weight :  </span> <input class="add-generation-inp" type="text" name="kerb_weight">
  <span class="add-generation-sp">Max weight :  </span> <input class="add-generation-inp" type="text" name="max_weight">
  <span class="add-generation-sp">Max roof load : </span> <input class="add-generation-inp" type="text" name="max_roof_load">
  <span class="add-generation-sp">Permitted trailer load with brakes (8%) : </span> <input class="add-generation-inp" type="text" name="permitted_trailer_load_with_brakes_(8%)">
  <span class="add-generation-sp">Permitted trailed load with brakes (12%) : </span> <input class="add-generation-inp" type="text" name="permitted_trailer_load_with_brakes_(12%)">
  <span class="add-generation-sp">Permitted trailed load with brakes without brakes : </span> <input class="add-generation-inp" type="text" name="permitted_trailer_load_without_brakes">
  <span class="add-generation-sp">Permitted towbar download : </span> <input class="add-generation-inp" type="text" name="permitted_towbar_download">
  <span class="add-generation-sp">Tire size : </span> <input class="add-generation-inp" type="text" name="tire_size">
  <span class="add-generation-sp">Wheel rims size : </span> <input class="add-generation-inp" type="text" name="wheel_rims_size">
  <span class="add-generation-sp">Battery capacity : </span> <input class="add-generation-inp" type="text" name="battery_capacity">
  <span class="add-generation-sp">All electric range : </span> <input class="add-generation-inp" type="text" name="all_electric_range">
  <span class="add-generation-sp">Electric motor power : </span> <input class="add-generation-inp" type="text" name="electric_motor_power">
  <span class="add-generation-sp">Electric motor torque : </span> <input class="add-generation-inp" type="text" name="electric_motor_torque">
  <span class="add-generation-sp">ICE power : </span> <input class="add-generation-inp" type="text" name="ICE_power">
  <span class="add-generation-sp">ICE torque : </span> <input class="add-generation-inp" type="text" name="ICE_torque">
  <span class="add-generation-sp">Average energy consumption : </span class="add-generation-sp"> <input class="add-generation-inp" type="text" name="average_energy_consumption">
  <button type="submit" class="btn btn-danger"> Go </button>
</form>





<!-- Add the Logo And Images (multiple images possible too) of the generation (possibility to upload image or to write its name directly)-->






<!-- Add a DB file directly to the DB (with verifying) -->




@endsection
