<!-- Admin Navbar -->
@extends('layouts.admin')
@section('content')


<!-- Add Model Form (possibility to add multiple Brands at once) -->
<form method="post" action="{{url('/admin/createmodel')}}">
{{ csrf_field() }}
<span> Model Name :  </span> <input type="text" name="name">
<span> Brand :   </span> <select name="brand">
  @foreach($list_brands as $brand)
  <option value="{{$brand->name}}">{{$brand->name}}</option>
  @endforeach
</select>
<span> Description :  </span> <input type="text" name="description">


<button class="btn btn-danger" type="submit"> Go </button>
</form>





<!-- Add Images  (multiple images possible too) of the model (possibility to upload image or to write its name directly)-->






<!-- Add a DB file directly to the DB (with verifying) -->







@endsection
