@extends('layouts.blog')


@section('content')



<h1> Sorry But Section : {{$community}} Does not exist in our blog </h1>

<span> return to sections page : </span> <a href="{{url('/blog')}}"> Go </a>



@endsection
