@extends('layouts.admin')

@section('content')

<!-- Admin Navbar (Layout) -->



<!-- Global Statistics -->



<!-- Routes for other blog Dashboards -->

<section class="content-wrapper">
<!--  Container -->
<div class="container-fluid e-container row">
  <div class="row col-12" style="justify-content:center;margin:1em 0">
    <!--  Posts -->
    <div class="row col-lg-3 col-md-6 col-12" style="margin:0 .5em">
        <div class="e-section">
          <ion-icon name="list-box"></ion-icon>
          <a href="{{url('/blogmoderator/posts')}}"> Posts </a>
          <a class="plus" href="{{url('/blogmoderator/addpost')}}"><ion-icon name="add"></ion-icon></a>
        </div>
    </div>
    <!-- Sections -->
    <div class="row col-lg-3 col-md-6 col-12" style="margin:0 .5em">
      <div class="e-section">
        <ion-icon name="apps"></ion-icon>
        <a href="{{url('/blogmoderator/sections')}}"> Sections </a>
        <a class="plus" href="{{url('/blogmoderator/addsection')}}"><ion-icon name="add"></ion-icon></a>
      </div>
    </div>
  </div>
</div>


<a class="col-lg-3 btn btn-danger"  href="{{url('/blogmoderator/statistics')}}"> Statistics </a>

<div class="row col-lg-10 offset-lg-1">


</div>
</section>





<!-- Chat Window Between Moderators -->





@endsection
