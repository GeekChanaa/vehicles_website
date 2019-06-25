@extends('layouts.encyclopedia')

@section('content')


<!-- Routing to other functionalities of the encyclopedia -->

<div>
  <a href="{{url('/encyclopedia/brands')}}" class="btn btn-outline-primary">Vehicle Brands</a>
  <a href="{{url('/encyclopedia/carpart-brands')}}" class="btn btn-outline-primary">Autopart Brands</a>
  <a href="{{url('/encyclopedia/news')}}" class="btn btn-outline-primary">News</a>
  <a href="{{url('/encyclopedia/autoparts')}}" class="btn btn-outline-primary">Autoparts</a>
</div>







@endsection
