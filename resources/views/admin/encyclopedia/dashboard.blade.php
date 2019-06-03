<!-- Admin navbar (layout) -->
@extends('layouts.admin')


@section('content')


<!-- Most Important Statistics -->



<!-- Routes to other functionalities -->
<section class="content-wrapper">
  <div class="container-fluid e-container row">
    <div class="row col-12" style="justify-content:space-around;margin:1em 0">
      <div class="row col-md-3 col-12">
        <div class="e-section">
          <ion-icon name="pricetag"></ion-icon>
          <a href="{{url('/encyclopediamoderator/brands')}}"> Brands </a>
          <a class="plus" href="{{url('/editor/addbrand')}}"><ion-icon name="add"></ion-icon></a>
        </div>
      </div>
      <div class="row col-md-3 col-12">
        <div class="e-section">
          <ion-icon name="logo-model-s"></ion-icon>
          <a href="{{url('/encyclopediamoderator/models')}}"> Models </a>
          <a class="plus" href="{{url('/editor/addmodel')}}"><ion-icon name="add"></ion-icon></a>
        </div>
      </div>
      <div class="row col-md-3 col-12">
        <div class="e-section">
          <ion-icon name="bug"></ion-icon>
          <a href="{{url('/encyclopediamoderator/generations')}}"> Generations </a>
          <a class="plus" href="{{url('/editor/addgeneration')}}"><ion-icon name="add"></ion-icon></a>
        </div>
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
