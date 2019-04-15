<!-- Admin navbar (layout) -->
@extends('layouts.admin')

@section('content')

<!-- General Statistics -->




<!-- Routes to other Market Dashboards -->

  <div class="container mx-auto sections row">
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3 row" style="background:#519EF7">
        <ion-icon name="car" class="col-12 align-middle"></ion-icon>
        <h2 class="col-12">120</h2>
      </div>
      <a href="{{ url('/marketmoderator/newcarparts') }}" class="col-9">
        New Carparts
      </a>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3"  style="background:#488EE2">
        <ion-icon name="quote" class="align-middle"></ion-icon>
        <h2>120</h2>
      </div>
      <a href="{{ url('/marketmoderator/usedcarparts') }}" class="col-9">
        Used Carparts
      </a>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3" style="background:#3B78BD">
        <ion-icon name="hammer" class="align-middle"></ion-icon>
      </div>
      <a href="{{ url('/marketmoderator/newvehicles') }}" class="col-9">
        New Vehicles
      </a>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3" style="background:#30629F">
        <ion-icon name="school" class="align-middle"></ion-icon>
      </div>
      <a href="{{ url('/marketmoderator/usedvehicles') }}" class="col-9">
        Used Vehicles
      </a>
    </div>
  </div>
<section class="bg-light">
<div class="row">






</div>

<div class="row col-lg-12">
  <a href="{{url('/marketmoderator/createncp')}}" class="col-lg-3 btn btn-primary"> create new carpart </a>
  <a href="{{url('/marketmoderator/createucp')}}" class="col-lg-3 btn btn-primary"> create used carpart </a>
  <a href="{{url('/marketmoderator/createnv')}}" class="col-lg-3 btn btn-primary"> create new vehicle</a>
  <a href="{{url('/marketmoderator/createuv')}}" class="col-lg-3 btn btn-primary"> create used vehicle</a>
</div>

<div class="row">
  <a href="{{ url('/marketmoderator/statistics') }}" class="col-lg-3 btn btn-outline-danger"> Statistics </a>


  <!-- Route to Make A user Special ! -->


</div>
</section>




@endsection
