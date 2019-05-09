@extends('layouts.market')



@section('content')


<section class="bg-light">

<h1> Articles Available </h1>

@foreach($list_nv as $nv)
<div class="row col-lg-8 offset-lg-2">
  <li><a href="{{url('/market/newvehicles/'.$nv->id.'')}}"> {{$nv->id}}</a> </li>
  <li>{{$nv->name}} </li>
  <li>{{$nv->price}} </li>
  <li>{{$nv->country}} </li>
  <li>{{$nv->city}} </li>

</div>


@endforeach
{{$list_nv->links()}}
</section>






@endsection
