<!-- Admin navbar (layout) -->
@extends('layouts.admin')
@section('content')

<!-- Most Important Statistics -->
<section class="bg-light">

<h1> Statistics </h1>

<div class="row col-lg-12">
  <button class="btn btn-outline-danger">
    Number of Articles : {{$nbr_nv_articles['0']->sum}}
  </button>

</div>
<div class="row col-lg-12">
  <div> Number Of Articles By Year </div>
  <div>
    <canvas id="nv_chart_last_year"></canvas>
  </div>
</div>

</section>




<!-- List of NewVehicles by users (delete and update and add) -->
<section class="bg-light">

<div class="row col-lg-12">
  <table class="table table-striped table-dark">
    <th scope="col"> ID </th>
    <th scope="col"> User ID </th>
    <th scope="col"> Title </th>
    <th scope="col"> Date Added </th>
    <th scope="col"> Date Updated </th>
    <th scope="col"> Update </th>
    <th scope="col"> Delete </th>
    @foreach($list_nv as $nv)
    <tr>
      <td> {{$nv->id}} </td>
      <td> {{$nv->user_id}} </td>
      <td> {{$nv->name}} </td>
      <td> {{$nv->created_at}} </td>
      <td> {{$nv->updated_at}} </td>
      <td>
        <form class="" action="{{url('/marketmoderator/deletenv')}}" method="post">
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <input type="hidden" name="id" value="{{$nv->id}}">
          <button class="btn btn-danger" type="submit"> Delete </button>
        </form>
      </td>
      <td><button class="btn btn-danger" data-toggle="modal" data-target="#info{{$nv->id}}"> Infos </button></td>
    </tr>
    <div class="modal fade" id="info{{$nv->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="s">{{$nv->name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{url('/marketmoderator/updatenv')}}">
              {{csrf_field()}}
              <input type="hidden" value="{{$nv->id}}" name="id" value="{{$nv->id}}">
              <span>Price : </span> <input type="text" name="price" value="{{$nv->price}}"> <br>
              <span>Name : </span> <input type="text" name="name" value="{{$nv->name}}"> <br>
              <span>Brand : </span> <input type="text" name="brand" value="{{$nv->brand}}"> <br>
              <span>Model : </span> <input type="text" name="model" value="{{$nv->model}}"> <br>
              <span>Generation : </span> <input type="text" name="generation" value="{{$nv->generation}}"> <br>
              <span>CD Changer stacker : </span> <input type="text" name="cd_changer_stacker" value="{{$nv->cd_changer_stacker}}"> <br>
              <span>Four wheel drive : </span> <input type="text" name="four_wheel_drive" value="{{$nv->four_wheel_drive}}"> <br>
              <span>Air Conditionning :  </span> <input type="text" name="air_conditionning" value="{{$nv->air_conditionning}}"> <br>
              <span>Aluminum wheels :  </span> <input type="text" name="aluminum_wheels" value="{{$nv->aluminum_wheels}}"> <br>
              <span>Bed Liner : </span> <input type="text" name="bed_liner" value="{{$nv->bed_liner}}"> <br>
              <span>Captains chairs :  </span> <input type="text" name="captains_chairs" value="{{$nv->captains_chairs}}"> <br>
              <span>Cruise Control :  </span> <input type="text" name="cruise_control" value="{{$nv->cruise_control}}"> <br>
              <span>Dual air conditionning : </span> <input type="text" name="dual_air_conditionning" value="{{$nv->dual_air_conditionning}}"> <br>
              <span>Dual Power Seats : </span> <input type="text" name="dual_power_seats" value="{{$nv->dual_power_seats}}"> <br>
              <span>Hard top convertible : </span> <input type="text" name="hard_top_convertible" value="{{$nv->hard_top_convertible}}"> <br>
              <span>Heated Seats : </span> <input type="text" name="heated_seats" value="{{$nv->heated_seats}}"> <br>
              <span>leather Seats :  </span> <input type="text" name="leather_seats" value="{{$nv->leather_seats}}"> <br>
              <span>Luggage roofrack : </span> <input type="text" name="luggage_roofrack" value="{{$nv->luggage_roofrack}}"> <br>
              <span>Speciality stero system : </span> <input type="text" name="speciality_stereo_system" value="{{$nv->speciality_stereo_system}}"> <br>
              <span>Soft Top :  </span> <input type="text" name="soft_top" value="{{$nv->soft_top}}"> <br>
              <span>Manual transmission :  </span> <input type="text" name="manual_transmission" value="{{$nv->manual_transmission}}"> <br>
              <span>Navigation system : </span> <input type="text" name="navigation_system" value="{{$nv->navigation_system}}"> <br>
              <span>Power door locks : </span> <input type="text" name="power_door_locks" value="{{$nv->power_door_locks}}"> <br>
              <span>Power seat : </span> <input type="text" name="power_seat" value="{{$nv->power_seat}}"> <br>
              <span>Power steering : </span> <input type="text" name="power_steering" value="{{$nv->power_steering}}"> <br>
              <span>Power sunroof : </span> <input type="text" name="power_sunroof" value="{{$nv->power_sunroof}}"> <br>
              <span>Power windows : </span> <input type="text" name="power_windows" value="{{$nv->power_windows}}"> <br>
              <span>Running boards :  </span> <input type="text" name="running_boards" value="{{$nv->running_boards}}"> <br>
              <span>Satelite Radio :  </span> <input type="text" name="satelite_radio" value="{{$nv->satelite_radio}}"> <br>
              <span>Snow Plow Package : </span> <input type="text" name="snow_plow_package" value="{{$nv->snow_plow_package}}"> <br>
              <span>Remote Starter : </span> <input type="text" name="remote_starter" value="{{$nv->remote_starter}}"> <br>
              <span>Theft deterrent alarm : </span> <input type="text" name="theft_deterrent_alarm" value="{{$nv->theft_deterrent_alarm}}"> <br>
              <span>Theft recovery system : </span> <input type="text" name="theft_recovery_system" value="{{$nv->theft_recovery_system}}"> <br>
              <span>Third Row Seats :  </span> <input type="text" name="third_row_seats" value="{{$nv->third_row_seats}}"> <br>
              <span>tilt wheel : </span> <input type="text" name="tilt_wheel" value="{{$nv->tilt_wheel}}"> <br>
              <span>tonneau cover bed cover :  </span> <input type="text" name="tonneau_cover_bed_cover" value="{{$nv->tonneau_cover_bed_cover}}"> <br>
              <span>Towing Trailer Package : </span> <input type="text" name="towing_trailerpackage" value="{{$nv->towing_trailerpackage}}"> <br>
              <span>Turbo diesel : </span> <input type="text" name="turbo_diesel" value="{{$nv->turbo_diesel}}"> <br>
              <span>hybrid not flexfuel : </span> <input type="text" name="hybrid_not_flexfuel" value="{{$nv->hybrid_not_flexfuel}}"> <br>
              <span>Conversion Package : </span> <input type="text" name="conversion_package" value="{{$nv->conversion_package}}"> <br>
              <span>Chrome Wheels 20 or larger : </span> <input type="text" name="chrome_wheels_20_or_larger" value="{{$nv->chrome_wheels_20_or_larger}}"><br>

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
<div> {{$list_nv->links()}} </div>
</section>

<script>
var c2 = document.getElementById("nv_chart_last_year");
var replies_chart = new Chart(c2, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "Number of New Carparts",
      data :['{{$nbr_recent_nv_month['1']['0']->sum}}','{{$nbr_recent_nv_month['2']['0']->sum}}','{{$nbr_recent_nv_month['3']['0']->sum}}','{{$nbr_recent_nv_month['4']['0']->sum}}','{{$nbr_recent_nv_month['5']['0']->sum}}','{{$nbr_recent_nv_month['6']['0']->sum}}','{{$nbr_recent_nv_month['7']['0']->sum}}','{{$nbr_recent_nv_month['8']['0']->sum}}','{{$nbr_recent_nv_month['9']['0']->sum}}','{{$nbr_recent_nv_month['10']['0']->sum}}','{{$nbr_recent_nv_month['11']['0']->sum}}','{{$nbr_recent_nv_month['12']['0']->sum}}'],
    }]
  },
});

</script>

@endsection
