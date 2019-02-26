@extends('layouts.master')

@section('title','Error 404')

@section('content')
  <div class="container-fluid text-center err-container">
    <img class="err-num" src="{{asset('svg/404.svg')}}" alt="">
    <h1 class="err-title">Oops !</h1>
    <p class="err-paragraph">We can't seem to find the page you're looking for.</p>
    <a href="#">Return to home page</a>
  </div>
@endsection
