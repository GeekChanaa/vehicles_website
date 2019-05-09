@extends('layouts.blog')


@section('content')



<h1> Sorry But Section : {{$section}} Does not exist in our blog </h1>

<span> return to sections page : </span> <a href="{{url('/blog')}}"> Go </a>



@endsection
