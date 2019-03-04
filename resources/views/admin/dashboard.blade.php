<!-- Admin Navbar (Layout) -->
@extends('layouts.admin')

@section('content')
<!-- Header -->








<!-- Most Important Statistics -->







<!-- Routes to other Dashboards -->

<section class="bg-light">
<div class="row">
  <a class="col-lg-3 btn btn-outline-primary" href="{{url('/MarketDashboard')}}"> Market Dashboard </a>
  <a class="col-lg-3 btn btn-outline-primary" href="{{url('/BlogDashboard')}}"> Blog Dashboard </a>
  <a class="col-lg-3 btn btn-outline-primary" href="{{url('/ServicesDashboard')}}"> Services Dashboard </a>
  <a class="col-lg-3 btn btn-outline-primary" href="{{url('/EncyclopediaDashboard')}}"> Encyclopedia Dashboard </a>
</div>
</section>



<!-- Side Bar (LEFT) -->







<!-- Chat Window For Admins -->







<!-- Todo List -->

<div style="margin-top:20px;">
<h2> Todo list </h2>
<form class="" action="{{url('/admin/createTodo')}}" method="post">
  {{ csrf_field() }}
  <input type="text" name="content">
  <button class="btn btn-dark" type="submit"> go </button>
</form>

@foreach($list_tasks as $one)
<!-- the tasks -->
<h4> {{$one->content}} </h4>
<form class="" action="{{url('/admin/updateTodo')}}" method="post">
  {{ csrf_field() }}
  <input type="hidden" value="{{$one->id}}" name="id">
  <button style="@if($one->state == 'done') background-color:red ; @endif" type="submit"> Done </button>
</form>
<form class="" action="{{url('/admin/deleteTodo')}}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <input type="hidden" value="{{$one->id}}" name="id">
  <button type="submit"> Delete </button>
</form>
@endforeach
</div>







@endsection
