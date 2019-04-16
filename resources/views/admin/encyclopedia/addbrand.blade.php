
<!-- Admin Navbar -->
@extends('layouts.admin')
@section('content')



<!-- Add brand Form (possibility to add multiple Brands at once) -->
<form class="" action="{{url('/admin/createbrand')}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
<label>Name </label> <input name="name" type="text"> <br>
<label>Foundation Year </label> <input name="year_foundation" type="text"> <br>
<label>Headquarters </label> <input name="headquarters" type="text"> <br>
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





<!-- Add the Logo of the brand (possibility to upload image or to write its name directly)-->






<!-- Add a DB file directly to the DB (with verifying) -->










@endsection
