<!-- Market Layout -->
@extends('layouts.market')
@section('content')

<!-- Routes To other Routes -->

<section class="bg-light col-lg-12">

<div class="row col-lg-12">
  <a class="col-lg-3 btn btn-dark" href="{{ url('/market/usedcarpart') }}">Used Carparts </a>
  <a class="col-lg-3 btn btn-dark" href="{{ url('/market/newcarpart') }}">New Carparts </a>
  <a class="col-lg-3 btn btn-dark" href="{{ url('/market/usedvehicles') }}">Used Vehicles </a>
  <a class="col-lg-3 btn btn-dark" href="{{ url('/market/newvehicles') }}">New Vehicles </a>
</div>


</section>









@endsection
