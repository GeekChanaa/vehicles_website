@extends('layouts.blog')



@section('content')


<section class="bg-light">



<h1> SECTIONS </h1>


@foreach($list_sections as $section)
<a href="{{'/blog/'.$section->title.''}}" class="btn btn-primary"> {{$section->title}} </a>
@endforeach


</section>



@endsection
