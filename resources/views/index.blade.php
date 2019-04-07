@extends('layouts.app')


@section('content')

<section class="bg-light">
<div class="row col-lg-6 offset-lg-3">
  <h1> Links To Other parts of the website </h1>
</div>
<div class="row col-lg-12">
  <a class="col-lg-3" href="{{url('/market')}}"> Markets </a>
  <a class="col-lg-3" href="{{url('/blog')}}"> Blog </a>
  <a class="col-lg-3" href="{{url('/encyclopedia')}}"> Encyclopedia </a>
  <a class="col-lg-3" href="{{url('/services')}}"> services </a>
</div>
</section>






@endsection
