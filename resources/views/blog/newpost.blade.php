@extends('layouts.app')
@section('content')


<form class="" action="{{url('/createpost')}}" method="post">
  {{csrf_field()}}
  <label>Title:</label> <input name="title" type="text">
  <label>Section: </label> <select name="section">

    <option> Simo Rajel </option>
<option> Adnane Boss </option>
   </select>
  <label>Content: </label><input name="content" type="text">
  <button type="submit">
</form>









@endsection
