<!-- Admin navbar (layout) -->
@extends('layouts.admin')
@section('content')

<!-- Most Important Statistics -->
<section class="bg-light">

<h1> Statistics </h1>

<div class="row col-lg-12">
  <button class="btn btn-outline-danger">
    Number of Articles (last day) : {{$nbr_recent_uv_today}}
  </button>
  <button class="btn btn-outline-danger">
    Number of Articles (last week) : {{$nbr_recent_uv_last_week}}
  </button>
  <button class="btn btn-outline-danger">
    Number of Articles (last month) : {{$nbr_recent_uv_last_month}}
  </button>
  <button class="btn btn-outline-danger">
    Number of Articles (last year) : {{$nbr_recent_uv_last_year}}
  </button>
</div>
<div class="row col-lg-12">
  <div> Last week added articles (by day) </div>
  <div>
    <canvas id="uv_chart_last_week"></canvas>
  </div>
  <div> Last week added articles (by month) </div>
  <div>
    <canvas id="uv_chart_last_year"></canvas>
  </div>
</div>

</section>




<!-- List of UsedVehicles by users (delete and update and add) -->
<section class="bg-light">

<div class="row col-lg-12">
  <table class="table table-striped table-dark">
    <th scope="col"> ID </th>
    <th scope="col"> User ID </th>
    <th scope="col"> Title </th>
    <th scope="col"> Date Added </th>
    <th scope="col"> Date Updated </th>
    <th scope="col"> Infos </th>
    @foreach($list_uv as $uv)
    <tr>
      <td> {{$uv->id}} </td>
      <td> {{$uv->user_id}}</td>
      <td> {{$uv->name}}</td>
      <td> {{$uv->created_at}}</td>
      <td> {{$uv->updated_at}}</td>
      <td>
        <form class="" action="{{url('/marketmoderator/deleteuv')}}" method="post">
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <input type="hidden" value="{{$uv->id}}" name="id">
          <button type="submit" class="btn btn-danger"> Delete </button>
        </form>
      </td>
      <td>
        <button class="btn btn-danger" data-toggle="modal" data-target="#info{{$uv->id}}"> Infos </button>
      </td>
    </tr>

    <!-- Modal: Car Infos -->
    <div class="modal fade" id="info{{$uv->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">{{$uv->name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{url('/marketmoderator/updateuv')}}">
              {{csrf_field()}}
              <input type="hidden" value="{{$uv->id}}" name="id">
              <span>Price : </span> <input type="text" name="price" value="{{$uv->price}}"> <br>
              <span>Name : </span> <input type="text" name="name" value="{{$uv->name}}"> <br>
              <span>Brand : </span> <input type="text" name="brand" value="{{$uv->brand}}"> <br>
              <span>Model : </span> <input type="text" name="model" value="{{$uv->model}}"> <br>
              <span>Generation : </span> <input type="text" name="generation" value="{{$uv->generation}}"> <br>
              <span>CD Changer stacker : </span> <input type="text" name="cd_changer_stacker" value="{{$uv->cd_changer_stacker}}"> <br>
              <span>Four wheel drive : </span> <input type="text" name="four_wheel_drive" value="{{$uv->four_wheel_drive}}"> <br>
              <span>Air Conditionning :  </span> <input type="text" name="air_conditionning" value="{{$uv->air_conditionning}}"> <br>
              <span>Aluminum wheels :  </span> <input type="text" name="aluminum_wheels" value="{{$uv->aluminum_wheels}}"> <br>
              <span>Bed Liner : </span> <input type="text" name="bed_liner" value="{{$uv->bed_liner}}"> <br>
              <span>Captains chairs :  </span> <input type="text" name="captains_chairs" value="{{$uv->captains_chairs}}"> <br>
              <span>Cruise Control :  </span> <input type="text" name="cruise_control" value="{{$uv->cruise_control}}"> <br>
              <span>Dual air conditionning : </span> <input type="text" name="dual_air_conditionning" value="{{$uv->dual_air_conditionning}}"> <br>
              <span>Dual Power Seats : </span> <input type="text" name="dual_power_seats" value="{{$uv->dual_power_seats}}"> <br>
              <span>Hard top convertible : </span> <input type="text" name="hard_top_convertible" value="{{$uv->hard_top_convertible}}"> <br>
              <span>Heated Seats : </span> <input type="text" name="heated_seats" value="{{$uv->heated_seats}}"> <br>
              <span>leather Seats :  </span> <input type="text" name="leather_seats" value="{{$uv->leather_seats}}"> <br>
              <span>Luggage roofrack : </span> <input type="text" name="luggage_roofrack" value="{{$uv->luggage_roofrack}}"> <br>
              <span>Speciality stero system : </span> <input type="text" name="speciality_stereo_system" value="{{$uv->speciality_stereo_system}}"> <br>
              <span>Soft Top :  </span> <input type="text" name="soft_top" value="{{$uv->soft_top}}"> <br>
              <span>Manual transmission :  </span> <input type="text" name="manual_transmission" value="{{$uv->manual_transmission}}"> <br>
              <span>Navigation system : </span> <input type="text" name="navigation_system" value="{{$uv->navigation_system}}"> <br>
              <span>Power door locks : </span> <input type="text" name="power_door_locks" value="{{$uv->power_door_locks}}"> <br>
              <span>Power seat : </span> <input type="text" name="power_seat" value="{{$uv->power_seat}}"> <br>
              <span>Power steering : </span> <input type="text" name="power_steering" value="{{$uv->power_steering}}"> <br>
              <span>Power sunroof : </span> <input type="text" name="power_sunroof" value="{{$uv->power_sunroof}}"> <br>
              <span>Power windows : </span> <input type="text" name="power_windows" value="{{$uv->power_windows}}"> <br>
              <span>Running boards :  </span> <input type="text" name="running_boards" value="{{$uv->running_boards}}"> <br>
              <span>Satelite Radio :  </span> <input type="text" name="satelite_radio" value="{{$uv->satelite_radio}}"> <br>
              <span>Snow Plow Package : </span> <input type="text" name="snow_plow_package" value="{{$uv->snow_plow_package}}"> <br>
              <span>Remote Starter : </span> <input type="text" name="remote_starter" value="{{$uv->remote_starter}}"> <br>
              <span>Theft deterrent alarm : </span> <input type="text" name="theft_deterrent_alarm" value="{{$uv->theft_deterrent_alarm}}"> <br>
              <span>Theft recovery system : </span> <input type="text" name="theft_recovery_system" value="{{$uv->theft_recovery_system}}"> <br>
              <span>Third Row Seats :  </span> <input type="text" name="third_row_seats" value="{{$uv->third_row_seats}}"> <br>
              <span>tilt wheel : </span> <input type="text" name="tilt_wheel" value="{{$uv->tilt_wheel}}"> <br>
              <span>tonneau cover bed cover :  </span> <input type="text" name="tonneau_cover_bed_cover" value="{{$uv->tonneau_cover_bed_cover}}"> <br>
              <span>Towing Trailer Package : </span> <input type="text" name="towing_trailerpackage" value="{{$uv->towing_trailerpackage}}"> <br>
              <span>Turbo diesel : </span> <input type="text" name="turbo_diesel" value="{{$uv->turbo_diesel}}"> <br>
              <span>hybrid not flexfuel : </span> <input type="text" name="hybrid_not_flexfuel" value="{{$uv->hybrid_not_flexfuel}}"> <br>
              <span>Conversion Package : </span> <input type="text" name="conversion_package" value="{{$uv->conversion_package}}"> <br>
              <span>Chrome Wheels 20 or larger : </span> <input type="text" name="chrome_wheels_20_or_larger" value="{{$uv->chrome_wheels_20_or_larger}}"><br>
              <span>Accident :  </span> <input type="text" name="accident" value="{{$uv->accident}}"><br>
              <span>Mileage : </span> <input type="text" name="mileage" value="{{$uv->mileage}}"><br>
              <span>Year : </span> <input type="text" name="year" value="{{$uv->year}}"><br>
              <button type="submit" class="btn btn-dark"> Update </button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </table>
</div>

</section>

<script>
var c2 = document.getElementById("uv_chart_last_year");
var replies_chart = new Chart(c2, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "Number of New Carparts",
      data :['{{$nbr_recent_uv_last_month}}','{{$nbr_recent_uv_last_2nd_month}}','{{$nbr_recent_uv_last_3rd_month}}','{{$nbr_recent_uv_last_4th_month}}','{{$nbr_recent_uv_last_5th_month}}','{{$nbr_recent_uv_last_6th_month}}','{{$nbr_recent_uv_last_7th_month}}','{{$nbr_recent_uv_last_8th_month}}','{{$nbr_recent_uv_last_9th_month}}','{{$nbr_recent_uv_last_10th_month}}','{{$nbr_recent_uv_last_11th_month}}','{{$nbr_recent_uv_last_12th_month}}'],
    }]
  },
});

var c1 = document.getElementById("uv_chart_last_week");
var replies_chart = new Chart(c1, {
  type : 'line',
  data : {
    labels : ["first day","second day","third day","forth day","fifth day","sixth day","seventh day"],
    datasets: [{
      label : "Number of New Carparts",
      data :['{{$nbr_recent_uv_today}}','{{$nbr_recent_uv_last_2nd_day}}','{{$nbr_recent_uv_last_3rd_day}}','{{$nbr_recent_uv_last_4th_day}}','{{$nbr_recent_uv_last_5th_day}}','{{$nbr_recent_uv_last_6th_day}}','{{$nbr_recent_uv_last_7th_day}}'],
    }]
  },
});
</script>


@endsection
