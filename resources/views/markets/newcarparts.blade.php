@extends('layouts.market')



@section('content')


<section class="bg-light">

<h1> Articles Available </h1>

@foreach($list_ncp as $ncp)
<div class="row col-lg-8 offset-lg-2">
  <li><a href="{{url('/market/newcarparts/'.$ncp->id.'')}}"> {{$ncp->id}} </a></li>
  <li>{{$ncp->name}} </li>
  <li>{{$ncp->country}} </li>
  <li>{{$ncp->city}} </li>

</div>


@endforeach
{{$list_ncp->links()}}
</section>






@endsection
