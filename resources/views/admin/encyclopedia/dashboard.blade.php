<!-- Admin navbar (layout) -->
@extends('layouts.admin')


@section('content')


<!-- Most Important Statistics -->



<!-- Routes to other functionalities -->
<section>
  <div class="row col-lg-12 offset-lg-4">
    <h1> Routes To other dashboards  </h1>
  </div>
  <div class="row col-lg-12">
    <div class="row col-lg-12">
      <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/editor/addbrand')}}"> Add brand </a>
      <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/editor/addgeneration')}}"> Add Generation </a>
      <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/editor/addmodel')}}"> Add Model </a>
    </div>
    <div class="row col-lg-12">
      <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/encyclopediamoderator/articles')}}"> Articles </a>
      <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/editor/editors')}}"> Editors </a>
      <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/encyclopediamoderator/moderators')}}"> Moderators </a>
    </div>
    <div class="row col-lg-12">
      <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/encyclopediamoderator/statistics')}}"> Statistics </a>
      <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/encyclopediamoderator/brands')}}"> Brands </a>
      <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/encyclopediamoderator/models')}}"> Models </a>
    </div>
    <div class="row col-lg-12">
      <a class="col-lg-3 offset-lg-5 btn btn-primary" href="{{url('/encyclopediamoderator/generations')}}"> Generations </a>

    </div>
</section>




@endsection
