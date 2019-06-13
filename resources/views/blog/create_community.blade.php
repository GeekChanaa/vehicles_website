@extends('layouts.blog')


@section('content')


<section class="bg-light">
  <h1> Creating Community </h1>

  <form action="{{url('/blog/createCom')}}" method="post">
    {{csrf_field()}}
    <span> Title </span> <input type="text" name="title"> <br>
    <span> Category </span>
   <select name="category">
     <option value="fun">Fun </option>
     <option value="commerce">Commerce </option>
    </select> <br>
    <button type="submit" value="btn btn-danger" > Create </button>
  </form>
</section>







@endsection
