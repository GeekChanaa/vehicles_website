@extends('layouts.admin')

@section('content')

<!-- Admin Navbar (Layout) -->



<!-- Global Statistics -->



<!-- Routes for other blog Dashboards -->

<section>
<div class="container text-center">
  <h1> Routes to other blog dashboards </h1>
</div>
<!--  Container -->
<div class="container row b-container">
  <!--  Posts -->
  <div class="col-12 col-sm-5 col-md-4 text-center">
    <ion-icon class="b-icon" name="list-box"></ion-icon>
    <div class="b-section row">
      <a class="col-12" href="{{url('/blogmoderator/posts')}}" >Posts</a>
      <a class="add-btn" style="position: relative;top: 45px;" href="{{url('/blogmoderator/addpost')}}"><ion-icon name="add"></ion-icon></a>
    </div>
  </div>
  <!-- Sections -->
  <div class="col-12 col-sm-5 col-md-4 text-center">
    <ion-icon class="b-icon" name="apps"></ion-icon>
    <div class="b-section row">
      <a class="col-12" href="{{url('/blogmoderator/sections')}}" > Sections </a>
      <a class="add-btn" style="position: relative;top: 45px;" href="{{url('/blogmoderator/addsection')}}"><ion-icon name="add"></ion-icon></a>
    </div>
  </div>
</div>

<a class="col-lg-3 btn btn-danger"  href="{{url('/blogmoderator/statistics')}}"> Statistics </a>

<div class="row col-lg-10 offset-lg-1">


</div>
</section>





<!-- Chat Window Between Moderators -->





@endsection
