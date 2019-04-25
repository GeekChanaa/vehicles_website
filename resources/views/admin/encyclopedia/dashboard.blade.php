<!-- Admin navbar (layout) -->
@extends('layouts.admin')


@section('content')


<!-- Most Important Statistics -->



<!-- Routes to other functionalities -->
<section>
  <div class="row col-lg-12 offset-lg-4">
    <h1> Routes To other dashboards  </h1>
  </div>
  <div class="container-fluid e-container row">
    <div class="row col-12" style="justify-content:space-around;margin-bottom:1em">
      <div class="e-section row col-md-3 col-12">
        <ion-icon name="pricetag" class="col-2"></ion-icon>
        <a href="{{url('/encyclopediamoderator/brands')}}" class="col-8"> Brands </a>
        <a class="plus col-2" href="{{url('/editor/addbrand')}}"><ion-icon name="add"></ion-icon></a>
      </div>
      <div class="e-section row col-md-3 col-12">
        <ion-icon name="logo-model-s" class="col-2"></ion-icon>
        <a href="{{url('/encyclopediamoderator/models')}}" class="col-8"> Models </a>
        <a class="plus col-2" href="{{url('/editor/addmodel')}}"><ion-icon name="add"></ion-icon></a>
      </div>
      <div class="e-section row col-md-3 col-12">
        <ion-icon name="bug" class="col-2"></ion-icon>
        <a href="{{url('/encyclopediamoderator/generations')}}" class="col-8"> Generations </a>
        <a class="plus col-2" href="{{url('/editor/addgeneration')}}"><ion-icon name="add"></ion-icon></a>
      </div>
    </div>
    <div class="row col-12">
      <div class="col-3">
        <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/encyclopediamoderator/articles')}}"> Articles </a>
      </div>
      <div class="col-3">
        <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/editor/editors')}}"> Editors </a>
      </div>
      <div class="col-3">
        <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/encyclopediamoderator/moderators')}}"> Moderators </a>
      </div>
      <div class="col-3">
        <a class="col-lg-3 offset-lg-1 btn btn-primary" href="{{url('/encyclopediamoderator/statistics')}}"> Statistics </a>
      </div>
    </div>
  </div>
</section>




@endsection
