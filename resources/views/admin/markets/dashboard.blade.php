<!-- Admin navbar (layout) -->
@extends('layouts.admin')

@section('content')

<!-- General Statistics -->




<!-- Routes to other Market Dashboards -->

  <div class="container mx-auto sections row">
    <div class="section row col-md-6 col-lg-3 ">
      <div class="m-section col-3 row" style="background:#519EF7">
        <ion-icon name="car" class="col-12 align-middle"></ion-icon>
        <h2 class="col-12">99</h2>
      </div>
      <div class="col-9">
        <a href="{{ url('/marketmoderator/newcarparts') }}" class="col-12">
          New Carparts
        </a>
        <a href="{{url('/marketmoderator/createncp')}}" class="add-btn"><ion-icon name="add"></ion-icon></a>
      </div>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="m-section col-3   row" style="background:#519EF7">
        <ion-icon name="car" class="col-12 align-middle"></ion-icon>
        <h2 class="col-12">99</h2>
      </div>
      <div class="col-9">
        <a href="{{ url('/marketmoderator/usedcarparts') }}" class="col-12">
          Used Carparts
        </a>
        <a href="{{url('/marketmoderator/createucp')}}" class="add-btn"><ion-icon name="add"></ion-icon></a>
      </div>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="m-section col-3 row" style="background:#519EF7">
        <ion-icon name="car" class="col-12 align-middle"></ion-icon>
        <h2 class="col-12">99</h2>
      </div>
      <div class="col-9 ">
        <a href="{{ url('/marketmoderator/newvehicles') }}" class="col-12">
          New Vehicles
        </a>
        <div style="width:100%;text-align:center">
          <a href="{{url('/marketmoderator/createnv')}}" class="add-btn"><ion-icon name="add"></ion-icon></a>
        </div>
      </div>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="m-section col-3  row" style="background:#519EF7">
        <ion-icon name="car" class="col-12 align-middle"></ion-icon>
        <h2 class="col-12">99</h2>
      </div>
      <div class="col-9  ">
        <a href="{{ url('/marketmoderator/usedvehicles') }}" class="col-12">
          New Carparts
        </a>
        <a href="{{url('/marketmoderator/createuv')}}" class="add-btn"><ion-icon name="add"></ion-icon></a>
      </div>
    </div>

  </div>
<section class="bg-light">
<div class="row">
  <a href="{{ url('/marketmoderator/statistics') }}" class="col-lg-3 btn btn-outline-danger"> Statistics </a>
  <!-- Route to Make A user Special ! -->
</div>
</section>




@endsection
