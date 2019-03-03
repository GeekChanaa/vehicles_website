@extends('layouts.blog')



@section('content')


<section class="bg-light">





@foreach($list_sections as $section)
<a href="{{url('/blog/section')}}" class="btn btn-primary"> {{$section->title}} </a>
@endforeach


</section>

@endsection
