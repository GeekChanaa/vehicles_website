@extends('layouts.app')
@section('content')


<form class="" action="{{url('/createpost')}}" method="post">
  {{csrf_field()}}
  <label>Title:</label> <input name="title" type="text">
  <label>Section: </label><input name="section" type="text">
  <label>Content: </label><input name="content" type="text">
  <button type="submit">
</form>









@endsection
