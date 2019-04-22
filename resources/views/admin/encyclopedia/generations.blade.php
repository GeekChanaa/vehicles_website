<!-- Admin Layout -->
@extends('layouts.admin')
@section('content')



<!-- Header For Page -->



<!-- Most Important Statistics -->
<section class="bg-light">
  <h1> Statistics </h1>
  <div class="row col-lg-12">
    <button class="btn btn-outline-danger">{{$rate_generation_by_model}} </button>
    <button class="btn btn-outline-danger">{{$nbr_generations}} </button>
  </div>
</section>


<!-- Listing of Generations -->
<section class="bg-light">
  <h1> Generations List </h1>
  <table>

  </table>
</section>



<!-- Important Statistics About Generations -->



@endsection
