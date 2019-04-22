@extends('layouts.admin')
<!-- Admin Navbar (layout) -->
@section('content')
<!-- Most Important Statistics -->


<!-- Routes to other functionalities -->



<section>
  <div class="row col-lg-12 offset-lg-4">
    <h1> Routes To other dashboards  </h1>
  </div>
    <div class="s-container row col-12">
      <div class="s-section col-10 col-sm-5 col-md-4">
        <div class="upper-bg"></div>
        <ion-icon name="car"></ion-icon>
        <a href="{{url('/servicesmoderator/carwashes')}}"> Carwashes </a>
      </div>
      <div class="s-section col-10 col-sm-5 col-md-4">
        <div class="upper-bg"></div>
        <ion-icon name="build"></ion-icon>
        <a href="{{url('/servicesmoderator/workshops')}}"> Workshops </a>
      </div>
    </div>
</section>











@endsection
