<!-- Admin Navbar (Layout) -->
@extends('layouts.admin')

@section('content')
<!-- Header -->



<!-- Todo List -->
<form class="" action="{{url('/admin/createTodo')}}" method="post">
  {{ csrf_field() }}
  <input type="text" name="content">
  <button type="submit"> go </button>
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




<!-- Most Important Statistics -->







<!-- Routes to other Dashboards -->





<!-- Side Bar (LEFT) -->







<!-- Chat Window For Admins -->

















@endsection
