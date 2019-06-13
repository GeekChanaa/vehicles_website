@extends('layouts.blog')



@section('content')


<section class="bg-light">



<h1> SECTIONS </h1>


@foreach($list_communities as $community)
<a href="{{'/blog/community/'.$community->title.''}}" class="btn btn-primary"> {{$community->title}} </a>
@endforeach


</section>


<section class="bg-light">

<a class="btn btn-danger" href="{{'/blog/createcommunity'}}"> Create a community </a>

</section>

@endsection
