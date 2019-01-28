@extends('layouts.market')



@section('content')



<form class="" action="{{url('/createnewvehicle')}}" method="post">
  {{csrf_field()}}
  <label>Image File </label> <input type="text" name="imagefile"> <br>
  <label>Price </label> <input type="text" name="price"> <br>
  <label>Name </label> <input type="text" name="name"> <br>
  <label>Brand </label> <input type="text" name="brand"> <br>
  <label>Model </label> <input type="text" name="model"> <br>
  <label>Generation </label> <input type="text" name="generation"> <br>
  <label>CD Changer Stacker </label> <input type="text" name="cd_changer_stacker"> <br>
  <label>Four Wheel Drive (4x4) </label> <input type="text" name="four_wheel_drive"> <br>
  <label>Air Conditionning </label> <input type="text" name="air_conditionning"> <br>
  <label>aluminum_wheels </label> <input type="text" name="aluminum_wheels"> <br>
  <label>bed_liner </label> <input type="text" name="bed_liner"> <br>
  <label>captains_chairs </label> <input type="text" name="captains_chairs"> <br>
  <label>cruise_control </label> <input type="text" name="cruise_control"> <br>
  <label>dual_air_conditionning </label> <input type="text" name="dual_air_conditionning"> <br>
  <label>dual_power_seats </label> <input type="text" name="dual_power_seats"> <br>
  <label>hard_top_convertible </label> <input type="text" name="hard_top_convertible"> <br>
  <label>heated_seats </label> <input type="text" name="heated_seats"> <br>
  <label>leather_seats </label> <input type="text" name="leather_seats"> <br>
  <label>luggage_roofrack </label> <input type="text" name="luggage_roofrack"> <br>
  <label>specialty_stereo_system </label> <input type="text" name="specialty_stereo_system"> <br>
  <label>soft_top </label> <input type="text" name="soft_top"> <br>
  <label>manual_transmission </label> <input type="text" name="manual_transmission"> <br>
  <label>navigation_system </label> <input type="text" name="navigation_system"> <br>
  <label>power_door_locks </label> <input type="text" name="power_door_locks"> <br>
  <label>power_seat </label> <input type="text" name="power_seat"> <br>
  <label>power_steering </label> <input type="text" name="power_steering"> <br>
  <label>power_sunroof </label> <input type="text" name="power_sunroof"> <br>
  <label>power_windows </label> <input type="text" name="power_windows"> <br>
  <label>running_boards </label> <input type="text" name="running_boards"> <br>
  <label>satelite_radio </label> <input type="text" name="satelite_radio"> <br>
  <label>snow_plow_package </label> <input type="text" name="snow_plow_package"> <br>
  <label>remote_starter </label> <input type="text" name="remote_starter"> <br>
  <label>theft_deterrent_alarm </label> <input type="text" name="theft_deterrent_alarm"> <br>
  <label> theft_recovery_system</label> <input type="text" name="theft_recovery_system">
 <br>  <label>third_row_seats </label> <input type="text" name="third_row_seats"> <br>
  <label>tilt_wheel </label> <input type="text" name="tilt_wheel"> <br>
  <label>tonneau_cover_bed_cover </label> <input type="text" name="tonneau_cover_bed_cover"> <br>
  <label>towing_trailerpackage </label> <input type="text" name="towing_trailerpackage"> <br>
  <label>turbo_diesel </label> <input type="text" name="turbo_diesel"> <br>
  <label>hybrid_not_flexfuel </label> <input type="text" name="hybrid_not_flexfuel"> <br>
  <label>conversion_package </label> <input type="text" name="conversion_package"> <br>
  <label>chrome_wheels_20_or_larger </label> <input type="text" name="chrome_wheels_20_or_larger"> <br>

  <button class="btn btn-danger" type="submit">
</form>








@endsection
