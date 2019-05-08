@extends('layouts.admin')
<!-- Admin Navbar (layout) -->
@section('content')
<!-- Most Important Statistics -->


<!-- Routes to other functionalities -->



<section class="content-wrapper">
  <div class="container-fluid e-container row">
    <div class="row col-12" style="justify-content:center;margin:1em 0">
      <div class="row col-lg-3 col-md-6 col-12" style="margin:0 .5em">
          <div class="e-section">
            <ion-icon name="car"></ion-icon>
            <a href="{{url('/servicesmoderator/carwashes')}}"> Carwashes </a>
            <a class="plus" href="{{url('/marketmoderator/createncp')}}"><ion-icon name="add"></ion-icon></a>
          </div>
      </div>
      <div class="row col-lg-3 col-md-6 col-12" style="margin:0 .5em">
        <div class="e-section">
          <ion-icon name="build"></ion-icon>
          <a href="{{url('/servicesmoderator/workshops')}}"> Workshops </a>
          <a class="plus" href="{{url('/marketmoderator/createncp')}}"><ion-icon name="add"></ion-icon></a>
        </div>
      </div>
    </div>
  </div>
</section>











@endsection
