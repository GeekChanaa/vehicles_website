<!-- Admin navbar (layout) -->
@extends('layouts.admin')

@section('content')

<!-- General Statistics -->




<!-- Routes to other Market Dashboards -->
<section class="content-wrapper">
  <div class="container-fluid e-container row">
    <div class="row col-12" style="justify-content:space-around;margin:1em 0">
      <div class="row col-lg-3 col-md-6 col-12">
          <div class="e-section">
            <ion-icon name="car"></ion-icon>
            <a href="{{ url('/marketmoderator/newcarparts') }}"> New Carparts </a>
            <a class="plus" href="{{url('/marketmoderator/createncp')}}"><ion-icon name="add"></ion-icon></a>
          </div>
      </div>
      <div class="row col-lg-3 col-md-6 col-12">
        <div class="e-section">
          <ion-icon name="car"></ion-icon>
          <a href="{{ url('/marketmoderator/usedcarparts') }}"> Used Carparts </a>
          <a class="plus" href="{{url('/marketmoderator/createucp')}}"><ion-icon name="add"></ion-icon></a>
        </div>
      </div>
      <div class="row col-lg-3 col-md-6 col-12">
        <div class="e-section">
          <ion-icon name="bug"></ion-icon>
          <a href="{{ url('/marketmoderator/newvehicles') }}"> New Vehicles </a>
          <a class="plus" href="{{url('/marketmoderator/createnv')}}"><ion-icon name="add"></ion-icon></a>
        </div>
      </div>
      <div class="row col-lg-3 col-md-6 col-12">
        <div class="e-section">
          <ion-icon name="bug"></ion-icon>
          <a href="{{ url('/marketmoderator/usedvehicles') }}"> New Vehicles </a>
          <a class="plus" href="{{url('/marketmoderator/createuv')}}"><ion-icon name="add"></ion-icon></a>
        </div>
      </div>
    </div>
<<<<<<< HEAD
    <div class="section row col-md-6 col-lg-3 ">
      <div class="m-section col-3  row" style="background:#519EF7">
        <ion-icon name="car" class="col-12 align-middle"></ion-icon>
        <h2 class="col-12">99</h2>
      </div>
      <div class="col-9  ">
        <a href="{{ url('/marketmoderator/usedvehicles') }}" class="col-12">
          Used Vehicles
        </a>
        <a href="{{url('/marketmoderator/createuv')}}" class="add-btn"><ion-icon name="add"></ion-icon></a>
=======
    <section class="bg-light" style="display:block;">
      <div class="col-12">
        <a href="{{ url('/marketmoderator/statistics') }}" class="col-lg-3 btn btn-outline-danger"> Statistics </a>
        <!-- Route to Make A user Special ! -->
>>>>>>> 0c5a2c530ca429a96266b7af2f3c1285af091bc7
      </div>
    </section>
</section>




@endsection
