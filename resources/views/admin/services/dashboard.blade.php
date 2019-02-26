@extends('layouts.admin')
<!-- Admin Navbar (layout) -->
@section('content')
<!-- Most Important Statistics -->


<!-- Routes to other functionalities -->



<section>
  <div class="row col-lg-12 offset-lg-4">
    <h1> Routes To other dashboards  </h1>
  </div>
  <div class="row col-lg-12">
    <div class="row col-lg-12">

      <a class="col-lg-4 offset-lg-1 btn btn-danger" href="{{url('/servicesmoderator/carwashes')}}"> Carwashes </a>
      <a class="col-lg-4 offset-lg-1 btn btn-danger" href="{{url('/servicesmoderator/workshops')}}"> Workshops </a>
    </div>
</section>











@endsection
