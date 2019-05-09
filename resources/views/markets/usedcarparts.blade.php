@extends('layouts.market')



@section('content')


<section class="bg-light">

<h1> Articles Available </h1>

@foreach($list_ucp as $ucp)
<div class="row col-lg-8 offset-lg-2">
  <li><a href="{{url('/market/usedcarparts/'.$ucp->id.'')}}"> {{$ucp->id}}</a> </li>
  <li>{{$ucp->name}} </li>
  <li>{{$ucp->country}} </li>
  <li>{{$ucp->city}} </li>

</div>


@endforeach
{{$list_ucp->links()}}
</section>






@endsection
