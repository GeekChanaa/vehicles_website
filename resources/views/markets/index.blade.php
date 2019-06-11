<!-- Market Layout -->
@extends('layouts.market')
@section('content')

<!-- Routes To other Routes -->

<section class="fluid-container">
  <section class="search-engines row">
    <div class="se-container col-10  col-md-5">
      <div class="se-header">
        <ion-icon name="car"></ion-icon>
        <h1>Search for a vehicle </h1>
      </div>
      <form  class="search-form" action="{{url('/market/searchnv')}}" method="post">
        {{csrf_field()}}
        <div class="form-field row">
          <label class="col-4">Brand</label>
          <select class="col" id="brand" name="brand">
            @foreach($list_brands as $brand)
            <option value="{{$brand->name}}">{{$brand->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-field row">
          <label class="col-4">Model</label>
          <select class="col" id="models" name="model">
          </select>
        </div>
        <div class="form-field row">
          <label class="col-4">Country</label>
          <select class="col" name="country">
            @foreach($countries as $country)
            <option value="{{$country->name}}">{{$country->name}} </option>
            @endforeach
          </select>
        </div>
        <div class="form-field row">
          <label class="col-4">Price</label>
          <input class="col" type="number" name="max_price">
        </div>
        <button type="submit" class="btn btn-danger"> Search </button>
        <a class="btn btn-primary" href="{{url('/market/advancedSearchNewVehicles')}}"> Advanced Search </a>
      </form>
    </div>
    <div class="se-container col-10  col-md-5">
      <div class="se-header">
        <ion-icon name="car"></ion-icon>
        <h1>Search for a carpart </h1>
      </div>
      <form class="search-form" action="{{url('/market/searchncp')}}" method="post">
        {{csrf_field()}}
        <div class="form-field row">
          <label class="col-4">Category</label>
          <select class="col" id="category_autopart_ncp">
            @foreach($cp_categories as $cat)
            <option> {{$cat['category']}} </option>
            @endforeach
          </select>
        </div>
        <div class="form-field row">
          <label class="col-4">Auto-part</label>
          <select class="col" id="part_ncp" name="part">
          </select>
        </div>
        <div class="form-field row">
          <label class="col-4">Country</label>
          <select class="col" name="country">
            @foreach($countries as $country)
            <option value="{{$country->name}}">{{$country->name}} </option>
            @endforeach
          </select>
        </div>
        <div class="form-field row">
          <label class="col-4">Max Price</label>
          <input class="col" type="number" name="max_price">
        </div>
        <button type="submit" class="btn btn-danger"> Search </button>
          <a class="btn btn-primary" href="{{url('/market/advancedSearchNewCarparts')}}"> Advanced Search </a>
      </form>
    </div>

</section>

    <!-- <h1> used vehicle search </h1>
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
</div> -->
<!-- <h1> used carpart search </h1>
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
  </div> -->


</section>

<!-- Recent New Vehicle Articles -->
<section class="bg-light">
  @foreach($list_recentnv as $article)
    <div> {{$article->name}} </div>
  @endforeach
</section>

<!-- Recent Used Vehicle Articles -->
<section class="bg-light">
  @foreach($list_recentuv as $article)
    <div> {{$article->name}} </div>
  @endforeach
</section>

<!-- Recent New Carpart Articles -->
<section class="bg-light">
  @foreach($list_recentncp as $article)
    <div> {{$article->name}} </div>
  @endforeach
</section>

<!-- Recent Used Carpart Articles -->
<section class="bg-light">
  @foreach($list_recentucp as $article)
    <div> {{$article->price}} </div>
  @endforeach
</section>

<!-- Most Known Vehicle Brands -->
<section class="bg-light">
  <a href="">
    <img src="{{asset('/storage/brands/Audi.png')}}">
  </a>

  <a href="">
    <img src="{{asset('/storage/brands/BMW.png')}}">
  </a>

  <a href="">
    <img src="{{asset('/storage/brands/Cadillac.png')}}">
  </a>

  <a href="">
    <img src="{{asset('/storage/brands/Dodge.png')}}">
  </a>

  <a href="">
    <img src="{{asset('/storage/brands/Chevrolet.png')}}">
  </a>

  <a href="">
    <img src="{{asset('/storage/brands/Ford.png')}}">
  </a>

  <a href="">
    <img src="{{asset('/storage/brands/Volkswagen.png')}}">
  </a>

  <a href="">
    <img src="{{asset('/storage/brands/Seat.png')}}">
  </a>

  <a href="">
    <img src="{{asset('/storage/brands/Mercedes-Benz.png')}}">
  </a>

  <a href="">
    <img src="{{asset('/storage/brands/Rolls-Royce.png')}}">
  </a>
</section>

<!-- Most Known Carpart Brands -->
<section class="bg-light">
</section>
<?php if(Auth::check()){ ?>
<!-- Favorite Article -->
<section class="bg-light">
  <div>
    @foreach($list_favnv as $favArticle)
      <span> {{$favArticle->name}} </span>
      <button class="deletefavnv" data-id="{{$favArticle->id}}"> Delete </button>
    @endforeach
  </div>
  <div>
    @foreach($list_favuv as $favArticle)
      <span> {{$favArticle->name}} </span>
      <button class="deletefavuv" data-id="{{$favArticle->id}}"> Delete </button>
    @endforeach
  </div>
  <div>
    @foreach($list_favncp as $favArticle)
      <span> {{$favArticle->name}} </span>
      <button class="deletefavncp" data-id="{{$favArticle->id}}"> Delete </button>
    @endforeach
  </div>
  <div>
    @foreach($list_favucp as $favArticle)
      <span> {{$favArticle->name}} </span>
      <button class="deletefavucp" data-id="{{$favArticle->id}}"> Delete </button>
    @endforeach
  </div>
</section>
<?php } ?>
<script>
$(document).ready(function(){

  jQuery(".deletefavnv").on('click',function(e){
    var articleid=$(this).data("id");
     e.preventDefault();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }

    });
     jQuery.ajax({
        url: "/ajax/deletenvfav",
        method: 'delete',
        data: {
           id: articleid,
        },
        success: function(result){
          swal('deleted','NICE','success');
        },
        error: function(jqXHR, textStatus, errorThrown){
          swal('something went wrong','impossible','error');
      }});
     });



     jQuery(".deletefavuv").on('click',function(e){
       var articleid=$(this).data("id");
        e.preventDefault();
        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }

       });
        jQuery.ajax({
           url: "/ajax/deleteuvfav",
           method: 'delete',
           data: {
              id: articleid,
           },
           success: function(result){
             swal('deleted','NICE','success');
           },
           error: function(jqXHR, textStatus, errorThrown){
             swal('something went wrong','impossible','error');
         }});
        });



  jQuery(".deletefavncp").on('click',function(e){
    var articleid=$(this).data("id");
     e.preventDefault();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }

    });
     jQuery.ajax({
        url: "/ajax/addncpfav",
        method: 'delete',
        data: {
           id: articleid,
        },
        success: function(result){
          swal('deleted','NICE','success');
        },
        error: function(jqXHR, textStatus, errorThrown){
          swal('something went wrong','impossible','error');
      }});
     });



     jQuery(".deletefavucp").on('click',function(e){
       var articleid=$(this).data("id");
        e.preventDefault();
        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }

       });
        jQuery.ajax({
           url: "/ajax/deleteucpfav",
           method: 'delete',
           data: {
              id: articleid,
           },
           success: function(result){
             swal('deleted','NICE','success');
           },
           error: function(jqXHR, textStatus, errorThrown){
             swal('something went wrong','impossible','error');
         }});
        });






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
</script>



@endsection
