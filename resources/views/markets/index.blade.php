<!-- Market Layout -->
@extends('layouts.market')
@section('content')

<!-- Routes To other Routes -->

<section class="">
  <!-- search engines -->
  <section class="search-engines row">
    <!-- Vehicles search engine -->
    <div class="se-container col-12  col-md-4" data-aos="fade-right">
      <div class="switch-buttons">
        <span  data-rule="new">New</span>
        <span  data-rule="used">Used</span>
        <span class="layer"></span>
      </div>
      <div class="se-header">
        <ion-icon name="car"></ion-icon>
        <h1>Search for a new vehicle </h1>
      </div>
      <div class="form-container">
        <form  class="search-form" data-type="newv" action="{{url('/market/searchnv')}}" method="post">
          {{csrf_field()}}
          <div class="form-field">
            <label>Brand</label>
            <div class="selectbox">
              <select id="brand" name="brand">
                <option value="" disabled selected>Choose a brand</option>
                @foreach($list_brands as $brand)
                <option value="{{$brand->name}}">{{$brand->name}}</option>
                @endforeach
              </select>
              <ion-icon name="arrow-dropdown"></ion-icon>
            </div>
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
          <a class="advanced-se" href="{{url('/market/advancedSearchNewVehicles')}}"> Advanced Search </a>
        </form>
        <form  class="search-form" data-type="usedv" action="{{url('/market/searchuv')}}" method="post" style="left:500px">
          {{csrf_field()}}
          <div class="form-field row">
            <label class="col-4">Brand</label>
            <select class="col" id="brand" name="brand">
              <option value="" disabled selected>Choose a brand</option>
              @foreach($list_brands as $brand)
              <option value="{{$brand->name}}">{{$brand->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-field row">
            <label class="col-4">Model</label>
            <select class="col" id="models_uv" name="model">
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
          <div class="form-field row">
            <label class="col-4">Mileage</label>
            <input class="col" type="number" name="max_mileage">
          </div>
          <button type="submit" class="btn btn-danger"> Search </button>
          <a class="advanced-se" href="{{url('/market/advancedSearchNewVehicles')}}"> Advanced Search </a>
        </form>
      </div>
    </div>
    <!-- Carparts search engine -->
    <div class="se-container col-12  col-md-4" data-aos="fade-left">
      <div class="se-header">
        <ion-icon name="cog"></ion-icon>
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
        <button class="normal-se" type="submit">
           <span>Seach</span>
         </button>
          <a class="advanced-se" href="{{url('/market/advancedSearchNewCarparts')}}"> Advanced Search </a>
      </form>
    </div>
  </section>
  <section class="recent-articles container">
    <!-- Section header -->
    <div class="section-header" data-aos="zoom-in-up"
                                data-aos-easing="ease-in-out-cubic"
                                data-aos-anchor-placement="bottom-bottom">
      <h1>Recently added vehicles</h1>
      <div class="switch-type">
        <span  data-rule="new" style="color:white">New</span>
        <span  data-rule="used">Used</span>
        <span class="layer"></span>
      </div>
    </div>
    <!-- Recent New Vehicle Articles -->
    <div class="recent-nv" data-aos="slide-up">
      @foreach($list_recentnv as $article)
      <div class="article-container">
          <div class="img-container" style="background-image:url('img/Markets/cars/{{$article->name}}.jpg')">
            <span>{{$article->name}}</span>
            <span>{{$article->price}} $ </span>
          </div>
        <div class="article-infos">
          <div>
            <ion-icon name="calendar"></ion-icon>
            <span>2014</span>
          </div>
          <div>
            <ion-icon name="flash"></ion-icon>
            <span>Diesel</span>
          </div>
          <div>
            <ion-icon name="pin"></ion-icon>
            <span>Tanger</span>
          </div>
          <div>
            <ion-icon name="speedometer"></ion-icon>
            <span>0 KM</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <!-- Recent Used Vehicle Articles -->
    <div class="recent-uv" style="display:none;opacity:0" data-aos="slide-up" data-aos-offset="200">
      @foreach($list_recentuv as $article)
      <div class="article-container">
        <div class="img-container" style="background-image:url('img/Markets/cars/{{$article->name}}.jpg')">
          <span>{{$article->name}}</span>
          <span>{{$article->price}} $ </span>
        </div>
        <div class="article-infos">
          <div>
            <ion-icon name="calendar"></ion-icon>
            <span>2014</span>
          </div>
          <div>
            <ion-icon name="flash"></ion-icon>
            <span>Diesel</span>
          </div>
          <div>
            <ion-icon name="pin"></ion-icon>
            <span>Tanger</span>
          </div>
          <div>
            <ion-icon name="speedometer"></ion-icon>
            <span>0 KM</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Section header -->
    <div class="section-header">
      <h1>Recently added carparts</h1>
      <div class="switch-type">
        <span  data-rule="new" style="color:white">New</span>
        <span  data-rule="used">Used</span>
        <span class="layer"></span>
      </div>
    </div>
    <!-- Recent New Carpart Articles -->
    <div class="recent-nc">
      @foreach($list_recentncp as $article)
      <div class="article-container">
        <div class="img-container" style="background-image:url('img/Markets/cars/{{$article->name}}.jpg')">
          <span>{{$article->name}}</span>
          <span>{{$article->price}} $ </span>
        </div>
        <div class="article-infos">
          <div>
            <ion-icon name="calendar"></ion-icon>
            <span>2014</span>
          </div>
          <div>
            <ion-icon name="flash"></ion-icon>
            <span>Diesel</span>
          </div>
          <div>
            <ion-icon name="pin"></ion-icon>
            <span>Tanger</span>
          </div>
          <div>
            <ion-icon name="speedometer"></ion-icon>
            <span>0 KM</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Recent Used Carpart Articles -->
    <div class="recent-uc">
      @foreach($list_recentucp as $article)
      <div> {{$article->price}} </div>
      @endforeach
    </div>

    <!-- Section header -->
    <div class="section-header">
      <h1>Most Known Vehicle Brands</h1>
      <div class="switch-type">
        <span  data-rule="new" style="color:white">New</span>
        <span  data-rule="used">Used</span>
        <span class="layer"></span>
      </div>
    </div>
  </section>


<!--
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
  <span>Model : </span>
  <select id="models_uv" name="model">

</select>
<span>Max Price : </span> <input type="number" name="max_price"> <br>
<span>Country : </span>
<select name="country">
  @foreach($countries as $country)
  <option value="{{$country->name}}">{{$country->name}} </option>
  @endforeach
</select>
<span>Max Mileage : </span>
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


<!-- Most Known Vehicle Brands -->
<section class="popular-vbrands">
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
<section class="popular-cbrands">
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
