<!-- admin layout -->
@extends('layouts.admin')


@section('content')
<!-- Create Form -->

<form  action="{{url('/marketmoderator/addncp')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<span>Name: </span> <input name="name" type="text"><br>
<span>Country : </span>
<select id="country" name="country">
  @foreach($countries as $country)
  <option value="{{$country->name}}">{{$country->name}}</option>
  @endforeach
</select>
<br>
<span>City : </span>
<select id="cities" name="city">

</select>
<br>
<span>Brand: </span> <input name="brand" type="text"><br>
<span>Category: </span> <select name="category" id="category_autopart">

    <option value="Accessory"> Accessory </option>
    <option value="Air Intake"> Air Intake </option>
    <option value="Auto body parts"> Auto Body Parts </option>
    <option value="Body Electrical"> Body Electrical </option>
    <option value="Body Mechanical and trim"> Body Mechanical & Trim </option>
    <option value="Brake"> Brake </option>
    <option value="Car Care"> Car Care </option>
    <option value="Climate Control"> Climate Control </option>
    <option value="Clutch"> Clutch </option>
    <option value="Cooling System"> Cooling System </option>
    <option value="Driveshaft and Axle"> Driveshaft & Axle </option>
    <option value="Engine Electrical"> Engine Electrical </option>
    <option value="Engine Mechanical"> Engine Mechanical </option>
    <option value="Exhaust"> Exhaust </option>
    <option value="Fuel Delivery"> Fuel Delivery </option>
    <option value="Interior Styling"> Interior Styling </option>
    <option value="Most Popular"> Most Popular </option>
    <option value="Steering"> Steering </option>
    <option value="Suspension"> Suspension </option>
    <option value="Transmission"> Transmission </option>

</select>
  <br>
<span>Part: </span>
<select name="part" id="part">

</select>
<br>
<span>Compatible Cars: </span> <input name="compatible_cars" type="text"><br>
<span>Description: </span> <input name="description" type="text"><br>

<input type="file" name='image'>
<button type="submit" class="btn btn-primary"> Create </button>
</form>


<script>
$(document).ready(function(){
  $("#category_autopart").change(function(e){
    e.preventDefault();
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       }

   });
   jQuery.ajax({
      url: "/marketmoderator/getpart/"+$(this).val(),
      method: 'get',
      data: {
         country_name: $(this).val(),
          },
      success: function(result){
        $('#part').html('');
        $.each(result.data, function(i,index){
          $("#part").append('<option>'+index.name+'</option>');
        });
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
  });
});



$(document).ready(function(){
  $("#country").change(function(e){
    e.preventDefault();
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       }

   });
   jQuery.ajax({
      url: "/admin/getcities/"+$(this).val(),
      method: 'get',
      data: {
         country_name: $(this).val(),
          },
      success: function(result){
        $('#cities').html('');
        $.each(result.data, function(i,index){
          $("#cities").append('<option value="'+index.name+'">'+index.name+'</option>');
        });
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
  });
});
</script>





@endsection
