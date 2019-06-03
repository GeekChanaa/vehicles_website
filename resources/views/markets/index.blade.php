<!-- Market Layout -->
@extends('layouts.market')
@section('content')

<!-- Routes To other Routes -->

<section class="bg-light col-lg-12">

</section>

<section class="bg-light">
  <h1> new vehicle search </h1>
  <div>
    <form  action="{{url('/market/searchnv')}}" method="post">
      {{csrf_field()}}
      <span>Brand : </span>
        <select id="brand" name="brand">
          @foreach($list_brands as $brand)
            <option value="{{$brand->name}}">{{$brand->name}}</option>
          @endforeach
        </select>
         <br>
      <span>Model : </span>
        <select id="models" name="model">

        </select>
         <br>
      <span>Max Price : </span> <input type="number" name="max_price">   <br>
      <span>Country : </span>
        <select name="country">
          @foreach($countries as $country)
            <option value="{{$country->name}}">{{$country->name}} </option>
          @endforeach
        </select>
         <br>
      <button type="submit" class="btn btn-danger"> Search </button>
    </form>
  </div>






  <h1> used vehicle search </h1>
  <div>
    <form  action="{{url('/market/searchuv')}}" method="post">
      {{csrf_field()}}
      <span>Brand : </span>
      <select id="brand_uv" name="brand">
        @foreach($list_brands as $brand)
          <option value="{{$brand->name}}">{{$brand->name}}</option>
        @endforeach
      </select>
        <br>
      <span>Model : </span>
      <select id="models_uv" name="model">

      </select>
        <br>
      <span>Max Price : </span> <input type="number" name="max_price"> <br>
      <span>Country : </span><select name="country">
        @foreach($countries as $country)
          <option value="{{$country->name}}">{{$country->name}} </option>
        @endforeach
      </select>   <br>
      <span>Max Mileage : </span>   <br>
      <button type="submit" class="btn btn-danger"> Search </button>
    </form>
  </div>





  <h1> new carpart search </h1>
  <div>

    <form action="{{url('/market/searchncp')}}" method="post">
          {{csrf_field()}}
      <span>Category : </span>
        <select id="category_autopart_ncp">
          @foreach($cp_categories as $cat)
            <option> {{$cat['category']}} </option>
          @endforeach
        </select><br>
      <span>Auto-part : </span>
      <select id="part_ncp" name="part">
      </select>
         <br>
      <span>Country : </span><select name="country">
        @foreach($countries as $country)
          <option value="{{$country->name}}">{{$country->name}} </option>
        @endforeach
      </select>   <br>
      <span>Max Price : </span>   <br>
      <button type="submit" class="btn btn-danger"> Search </button>
    </form>
  </div>





  <h1> used carpart search </h1>
  <div>
    <form action="{{url('/market/searchucp')}}" method="post">
      {{csrf_field()}}
      <span>Category : </span>
      <select id="category_autopart">
        @foreach($cp_categories as $cat)
          <option> {{$cat['category']}} </option>
        @endforeach
      </select><br>
      <span>Auto-part : </span>
      <select id="part" name="part">
      </select>
       <br>
      <span>Country : </span><select name="country">
        @foreach($countries as $country)
          <option value="{{$country->name}}">{{$country->name}} </option>
        @endforeach
      </select>   <br>
      <span>Max Price : </span>   <br>
      <button type="submit" class="btn btn-danger"> Search </button>
    </form>
  </div>


</section>





<script>
$(document).ready(function(){
  $("#brand").change(function(e){
    e.preventDefault();
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       }

   });
   jQuery.ajax({
      url: "/ajax/getvmodels/"+$(this).val(),
      method: 'get',
      data: {
          },
      success: function(result){
        $("#models").html('');
        $.each(result.data, function(i,index){
          $("#models").append('<option value="'+index.name+'">'+index.name+'</option>');
        });
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
  });
});



$(document).ready(function(){
  $("#brand_uv").change(function(e){
    e.preventDefault();
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       }

   });
   jQuery.ajax({
      url: "/ajax/getvmodels/"+$(this).val(),
      method: 'get',
      data: {
          },
      success: function(result){
        $("#models_uv").html('');
        $.each(result.data, function(i,index){
          $("#models_uv").append('<option value="'+index.name+'">'+index.name+'</option>');
        });
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
  });
});




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
  $("#category_autopart_ncp").change(function(e){
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
          },
      success: function(result){
        $('#part_ncp').html('');
        $.each(result.data, function(i,index){
          $("#part_ncp").append('<option>'+index.name+'</option>');
        });
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
  });
});


</script>



@endsection
