@extends('layouts.market')



@section('content')


<section class="bg-light">

<h1> Articles Available </h1>

@foreach($list_uv as $uv)
<div class="row col-lg-8 offset-lg-2">
  <li><a href="{{url('/market/usedvehicle/'.$uv->id.'')}}"> {{$uv->id}}</a> </li>
  <li>{{$uv->name}} </li>
  <li>{{$uv->price}} </li>
  <li>{{$uv->country}} </li>
  <li>{{$uv->city}} </li>

</div>


@endforeach
{{$list_uv->links()}}
</section>






@endsection
