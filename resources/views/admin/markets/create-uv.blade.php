<!-- admin layout -->
@extends('layouts.admin')


@section('content')
<!-- Create Form -->

<form action="{{url('/marketmoderator/adduv')}}" method="post">
{{csrf_field()}}


<!-- other infos -->
<span>Price : </span> <input type="text" name="price"> <br>
<span>Name : </span> <input type="text" name="name"> <br>
<span>Brand : </span> <input type="text" name="brand"> <br>
<span>Model : </span> <input type="text" name="model"> <br>
<span>Generation : </span> <input type="text" name="generation"> <br>
<span>CD Changer stacker : </span> <input type="text" name="cd_changer_stacker"> <br>
<span>Four wheel drive : </span> <input type="text" name="four_wheel_drive"> <br>
<span>Air Conditionning :  </span> <input type="text" name="air_conditionning"> <br>
<span>Aluminum wheels :  </span> <input type="text" name="aluminum_wheels"> <br>
<span>Bed Liner : </span> <input type="text" name="bed_liner"> <br>
<span>Captains chairs :  </span> <input type="text" name="captains_chairs"> <br>
<span>Cruise Control :  </span> <input type="text" name="cruise_control"> <br>
<span>Dual air conditionning : </span> <input type="text" name="dual_air_conditionning"> <br>
<span>Dual Power Seats : </span> <input type="text" name="dual_power_seats"> <br>
<span>Hard top convertible : </span> <input type="text" name="hard_top_convertible"> <br>
<span>Heated Seats : </span> <input type="text" name="heated_seats"> <br>
<span>leather Seats :  </span> <input type="text" name="leather_seats"> <br>
<span>Luggage roofrack : </span> <input type="text" name="luggage_roofrack"> <br>
<span>Speciality stero system : </span> <input type="text" name="speciality_stereo_system"> <br>
<span>Soft Top :  </span> <input type="text" name="soft_top"> <br>
<span>Manual transmission :  </span> <input type="text" name="manual_transmission"> <br>
<span>Navigation system : </span> <input type="text" name="navigation_system"> <br>
<span>Power door locks : </span> <input type="text" name="power_door_locks"> <br>
<span>Power seat : </span> <input type="text" name="power_seat"> <br>
<span>Power steering : </span> <input type="text" name="power_steering"> <br>
<span>Power sunroof : </span> <input type="text" name="power_sunroof"> <br>
<span>Power windows : </span> <input type="text" name="power_windows"> <br>
<span>Running boards :  </span> <input type="text" name="running_boards"> <br>
<span>Satelite Radio :  </span> <input type="text" name="satelite_radio"> <br>
<span>Snow Plow Package : </span> <input type="text" name="snow_plow_package"> <br>
<span>Remote Starter : </span> <input type="text" name="remote_starter"> <br>
<span>Theft deterrent alarm : </span> <input type="text" name="theft_deterrent_alarm"> <br>
<span>Theft recovery system : </span> <input type="text" name="theft_recovery_system"> <br>
<span>Third Row Seats :  </span> <input type="text" name="third_row_seats"> <br>
<span>tilt wheel : </span> <input type="text" name="tilt_wheel"> <br>
<span>tonneau cover bed cover :  </span> <input type="text" name="tonneau_cover_bed_cover"> <br>
<span>Towing Trailer Package : </span> <input type="text" name="towing_trailerpackage"> <br>
<span>Turbo diesel : </span> <input type="text" name="turbo_diesel"> <br>
<span>hybrid not flexfuel : </span> <input type="text" name="hybrid_not_flexfuel"> <br>
<span>Conversion Package : </span> <input type="text" name="conversion_package"> <br>
<span>Chrome Wheels 20 or larger : </span> <input type="text" name="chrome_wheels_20_or_larger"><br>
<span>Accident :  </span> <input type="text" name="accident"><br>
<span>Mileage : </span> <input type="text" name="mileage"><br>
<span>Year : </span> <input type="text" name="year">


<button type="submit" class="btn btn-dark"> Create </button>




</form>













@endsection
