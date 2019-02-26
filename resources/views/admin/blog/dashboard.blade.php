@extends('layouts.admin')

@section('content')

<!-- Admin Navbar (Layout) -->



<!-- Global Statistics -->



<!-- Routes for other blog Dashboards -->

<section>
<div class="row offset-lg-4 col-lg-12 text-center">
  <h1> Routes to other blog dashboards </h1>
</div>
<div class="row col-lg-10 offset-lg-1">
  <a class="col-lg-3 btn btn-danger" href="{{url('/blogmoderator/posts')}}" > Posts </a>
  <a class="col-lg-3 offset-lg-1 btn btn-danger"  href="{{url('/blogmoderator/addpost')}}"> Add Post </a>
  <a class="col-lg-3 offset-lg-1 btn btn-danger"  href="{{url('/blogmoderator/statistics')}}"> Statistics </a>
</div>
</section>





<!-- Chat Window Between Moderators -->





@endsection
