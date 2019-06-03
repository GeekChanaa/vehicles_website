
<!-- Admin Navbar -->
@extends('layouts.admin')
@section('content')



<!-- Add brand Form (possibility to add multiple Brands at once) -->
<<<<<<< HEAD
<form class="" action="{{url('/admin/createbrand')}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
<label>Name </label> <input name="name" type="text"> <br>
<label>Foundation Year </label> <input name="year_foundation" type="text"> <br>
<label>Headquarters </label>
<select name="headquarters" type="text">
  @foreach($countries as $country)
  <option value="{{$country->name}}"> {{$country->name}} </option>
  @endforeach
</select>
 <br>
<label>CEO </label> <input name="CEO" type="text"> <br>
<label>Website </label> <input name="website" type="text"> <br>
<label>Production output </label> <input name="production_output" type="text"> <br>
<label>Revenue </label> <input name="revenue" type="text"> <br>
<label>Net income </label> <input name="net_income" type="text"> <br>
<label>Number of employees </label> <input name="nbr_of_employees" type="text"> <br>
<label>Description </label> <input name="description" type="text"> <br>
<label>Specialty </label> <select name="specialty">
  <option value="vehicles"> Vehicles </option>
  <option value="carparts"> Carparts </option>
</select>
<label>Logo </label> <input name="imagef" type="file">

<button type="submit"> create </button>

</form>
=======
<div class="container">
  <form class="form-container row" action="{{url('/admin/createbrand')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-field row col-12">
      <h1>Add Brand</h1>
      <div class="line"></div>
    </div>
    <div class="form-field row col-6">
      <label class="col-4">Name </label>
      <input class="col-8" name="name" type="text">
    </div>
    <div class="form-field row col-6">
      <label class="col-4">Foundation Year </label>
      <input class="col-8" name="year_foundation" type="text">
    </div>
    <div class="form-field row col-6">
      <label class="col-4">Headquarters </label>
      <input class="col-8" name="headquarters" type="text">
    </div>
    <div class="form-field row col-6">
      <label class="col-4">CEO </label>
      <input class="col-8" name="CEO" type="text">
    </div>
    <div class="form-field row col-6">
      <label class="col-4">Website </label>
      <input class="col-8" name="website" type="text">
    </div>
    <div class="form-field row col-6">
      <label class="col-4">Production output </label>
      <input class="col-8" name="production_output" type="text">
    </div>
    <div class="form-field row col-6">
      <label class="col-4">Revenue </label>
      <input class="col-8" name="revenue" type="text">
    </div>
    <div class="form-field row col-6">
      <label class="col-4">Net income </label>
      <input class="col-8" name="net_income" type="text">
    </div>
    <div class="form-field row col-6">
      <label class="col-4">Number of employees </label>
      <input class="col-8" name="nbr_of_employees" type="text">
    </div>
    <div class="form-field row col-6">
      <label class="col-4">Description </label>
      <input class="col-8" name="description" type="text">
    </div>
    <div class="form-field row col-6">
      <label class="col-4">Speciality </label>
      <select id="select-box" class="col-8"  name="specialty">
        <option value="vehicles"> Vehicles </option>
        <option value="carparts"> Carparts </option>
      </select>
    </div>
    <div class="form-field row col-6">
      <label class="col-4">Logo </label>
      <input class="col-8 " id="imagef" name="imagef" type="file">
      <label class="file-btn" for="imagef">Choose a file</label>
    </div>
    <button class="offset-12" type="submit"> create </button>
  </form>
</div>
>>>>>>> 0c5a2c530ca429a96266b7af2f3c1285af091bc7





<!-- Add the Logo of the brand (possibility to upload image or to write its name directly)-->






<!-- Add a DB file directly to the DB (with verifying) -->










@endsection
