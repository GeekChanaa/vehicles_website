<!-- Admin Layout -->
@extends('layouts.admin')
@section('content')




<!-- Important Numbers -->
<section class="bg-light">
<div class="row col-lg-12">
  <button class="row col-lg-3 btn btn-primary"> Number of Used Carparts : {{$nbr_ucp_articles['0']->sum}} </button>
  <button class="row col-lg-3 btn btn-primary"> Number of New Carparts : {{$nbr_ncp_articles['0']->sum}} </button>
  <button class="row col-lg-3 btn btn-primary"> Number of Used Cars : {{$nbr_uv_articles['0']->sum}}</button>
  <button class="row col-lg-3 btn btn-primary"> Number of New Cars : {{$nbr_nv_articles['0']->sum}}</button>
</div>
</section>



<!-- Lists of Articles -->
<section class="bg-light">
<div class="col-lg-6 offset-lg-3 text-center">
  <div class="btn-group" role="group" aria-label="Basic example">
    <button onclick="listnv()" class="btn btn-danger">New Vehicles</button>
    <button onclick="listuv()" class="btn btn-danger">Used Vehicles</button>
    <button onclick="listncp()" class="btn btn-danger">New Carparts</button>
    <button onclick="listucp()" class="btn btn-danger">Used Carparts</button>
  </div>
</div>
<div class="row col-lg-8 offset-lg-2">


<!-- List of New Vehicles -->
<table class="list_nv table table-danger">
  <th scope="col">ID </th>
  <th scope="col">Generation </th>
  <th scope="col">Price </th>
  <th scope="col">Country </th>
  <th scope="col">Created at</th>
  @foreach($list_nv as $nv)
  <tr>
    <td>{{$nv->id}} </td>
    <td>{{$nv->generation}} </td>
    <td>{{$nv->price}} </td>
    <td>{{$nv->country}} </td>
    <td>{{$nv->created_at}} </td>
  </tr>
  @endforeach

</table>
<span class="list_nv"> {{$list_nv->links()}} </span>


<!-- List of Used Vehicles -->
<table class="list_uv table table-danger">
  <th scope="col">ID </th>
  <th scope="col">Generation </th>
  <th scope="col">Price </th>
  <th scope="col">Country </th>
  <th scope="col">Created at</th>
  @foreach($list_uv as $uv)
  <tr>
    <td>{{$uv->id}} </td>
    <td>{{$uv->generation}} </td>
    <td>{{$uv->price}} </td>
    <td>{{$uv->country}} </td>
    <td>{{$uv->created_at}} </td>
  </tr>
  @endforeach
</table>
<span class="list_uv"> {{$list_uv->links()}} </span>


<!-- List of New Carparts -->
<table class="list_ncp table table-danger">
  <th scope="col">ID </th>
  <th scope="col">Brand </th>
  <th scope="col">Auto-part</th>
  <th scope="col">Country </th>
  <th scope="col">Created at</th>
  @foreach($list_ncp as $ncp)
  <tr>
    <td>{{$ncp->id}} </td>
    <td>{{$ncp->brand}} </td>
    <td>{{$ncp->auto_part}} </td>
    <td>{{$ncp->country}} </td>
    <td>{{$ncp->created_at}} </td>
  </tr>
  @endforeach
</table>
<span class="list_ncp"> {{$list_ncp->links()}} </span>


<!-- List of Used Carparts -->
<table class="list_ucp table table-danger">
  <th scope="col">ID </th>
  <th scope="col">Brand </th>
  <th scope="col">Auto-part</th>
  <th scope="col">Country </th>
  <th scope="col">Created at</th>
  @foreach($list_ucp as $ucp)
  <tr>
    <td>{{$ucp->id}} </td>
    <td>{{$ucp->brand}} </td>
    <td>{{$ucp->auto_part}} </td>
    <td>{{$ucp->country}} </td>
    <td>{{$ucp->created_at}} </td>
  </tr>
  @endforeach
</table>
<span class="list_ucp"> {{$list_ucp->links()}} </span>


</div>
</section>

<!-- Get Number of new vehicles of some day -->
<div class="row col-lg-10 offset-lg-2">
  <input type="date" id="nv_input_day"> <button class="btn btn-danger" id="nv_go_day">go </button> <span id="nv_day"> </span>
</div>

<!-- Get Number of used vehicles of some day -->
<div class="row col-lg-10 offset-lg-2">
  <input type="date" id="uv_input_day"> <button class="btn btn-danger" id="uv_go_day">go </button> <span id="uv_day"> </span>
</div>


<!-- Get Number of new carparts of some day -->
<div class="row col-lg-10 offset-lg-2">
  <input type="date" id="ncp_input_day"> <button class="btn btn-danger" id="ncp_go_day">go </button> <span id="ncp_day"> </span>
</div>


<!-- Get Number of used carparts of some day -->
<div class="row col-lg-10 offset-lg-2">
  <input type="date" id="ucp_input_day"> <button class="btn btn-danger" id="ucp_go_day">go </button> <span id="ucp_day"> </span>
</div>



<!--  ============ Statistics ============== -->

<!-- Number of used carparts last year -->
<section class="bg-light">
  <div>
    <canvas id="ucp_chart"></canvas>
  </div>
</section>



<!-- Number of New Carparts last year -->
<section class="bg-light">
  <div>
    <canvas id="ncp_chart"></canvas>
  </div>
</section>



<!-- Number of used vehicles last year -->
<section class="bg-light">
  <div>
    <canvas id="uv_chart"></canvas>
  </div>
</section>



<!-- Number of New Vehicles last year -->
<section class="bg-light">
  <div>
    <canvas id="nv_chart"></canvas>
  </div>
</section>

<!-- Number of new carparts by category -->
<section class="bg-light">
  <div>
    <canvas id="ncp_category_chart"></canvas>
  </div>
</section>

<!-- Number of used carparts by category -->
<section class="bg-light">
  <div>
    <canvas id="ucp_category_chart"></canvas>
  </div>
</section>


<!-- Number of Articles of the market  -->
<section class="bg-light">
  <div>
    <canvas id="nbr_articles_chart"></canvas>
  </div>
</section>

<!-- Number of New vehicle Articles by day month and year -->

<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
  <div class="row">

    <!-- Get number of Nv by day -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Day </div>
      <div class="row"><input type="date" class="nvyearmonthday col-lg-5 offset-lg-2"> <button id="get_nbr_Nv_by_day" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="col-lg-8 text-center offset-lg-2" style="margin-top:3%;">

      </div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
        <span id="nbrNvByDay">
        </span>
      </div>
    </div>
    <!-- Get number of Nv by month -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Month </div>
        <div class="row"><input type="text" class="nvyearmonth col-lg-5">
        <input type="text" class="nvmonth col-lg-5"> <button id="get_nbr_Nv_by_month" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrNvByMonth">
          </span>
      </div>
    </div>
    <!-- Get number of Nv by year -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Year </div>
      <div class="row"><input type="text" class="nvyear col-lg-5 offset-lg-2"> <button id="get_nbr_Nv_by_year" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrNvByYear">
          </span>
      </div>
    </div>


  </div>
</section>

<!-- Number of used vehicle article by day month and year -->

<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
  <div class="row">

    <!-- Get number of Uv by day -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Day </div>
      <div class="row"><input type="date" class="uvyearmonthday col-lg-5 offset-lg-2"> <button id="get_nbr_Uv_by_day" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="col-lg-8 text-center offset-lg-2" style="margin-top:3%;">

      </div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
        <span id="nbrUvByDay">
        </span>
      </div>
    </div>
    <!-- Get number of Uv by month -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Month </div>
        <div class="row"><input type="text" class="uvyearmonth col-lg-5">
        <input type="text" class="uvmonth col-lg-5"> <button id="get_nbr_Uv_by_month" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrUvByMonth">
          </span>
      </div>
    </div>
    <!-- Get number of Uv by year -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Year </div>
      <div class="row"><input type="text" class="uvyear col-lg-5 offset-lg-2"> <button id="get_nbr_Uv_by_year" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrUvByYear">
          </span>
      </div>
    </div>


  </div>
</section>

<!-- Number of new carpart article by day month and year -->

<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
  <div class="row">

    <!-- Get number of Ncp by day -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Day </div>
      <div class="row"><input type="date" class="ncpyearmonthday col-lg-5 offset-lg-2"> <button id="get_nbr_Ncp_by_day" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="col-lg-8 text-center offset-lg-2" style="margin-top:3%;">

      </div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
        <span id="nbrNcpByDay">
        </span>
      </div>
    </div>
    <!-- Get number of Ncp by month -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Month </div>
        <div class="row"><input type="text" class="ncpyearmonth col-lg-5">
        <input type="text" class="ncpmonth col-lg-5"> <button id="get_nbr_Ncp_by_month" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrNcpByMonth">
          </span>
      </div>
    </div>
    <!-- Get number of Ncp by year -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Year </div>
      <div class="row"><input type="text" class="ncpyear col-lg-5 offset-lg-2"> <button id="get_nbr_Ncp_by_year" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrNcpByYear">
          </span>
      </div>
    </div>


  </div>
</section>

<!-- Number of used carpart articles by day month and year -->

<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
  <div class="row">

    <!-- Get number of Ucp by day -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Day </div>
      <div class="row"><input type="date" class="ucpyearmonthday col-lg-5 offset-lg-2"> <button id="get_nbr_Ucp_by_day" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="col-lg-8 text-center offset-lg-2" style="margin-top:3%;">

      </div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
        <span id="nbrUcpByDay">
        </span>
      </div>
    </div>
    <!-- Get number of Ucp by month -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Month </div>
        <div class="row"><input type="text" class="ucpyearmonth col-lg-5">
        <input type="text" class="ucpmonth col-lg-5"> <button id="get_nbr_Ucp_by_month" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrUcpByMonth">
          </span>
      </div>
    </div>
    <!-- Get number of Ucp by year -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Year </div>
      <div class="row"><input type="text" class="ucpyear col-lg-5 offset-lg-2"> <button id="get_nbr_Ucp_by_year" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrUcpByYear">
          </span>
      </div>
    </div>


  </div>
</section>

<section class="bg-light">
  <h3>Map of Used Carpart Articles</h3>
  <div id="map_ucp" style="height:400px;"></div>
</section>

<section class="bg-light">
  <h3>Map of New Carpart Articles</h3>
  <div id="map_ncp" style="height:400px;"></div>
</section>

<section class="bg-light">
  <h3>Map of Used Vehicle Articles</h3>
  <div id="map_uv" style="height:400px;"></div>
</section>

<section class="bg-light">
  <h3>Map of New Vehicle Articles</h3>
  <div id="map_nv" style="height:400px;"></div>
</section>



<section class="bg-dark">
  <!-- number of used carpart articles by country -->
  <div class="col-lg-4">
    <div class="col-lg-12 text-center by_div"> By Country </div>
      <div class="row">
        <div class="btn-group col-lg-8 offset-lg-2">
          <button type="button" class="btn btn-primary">Country</button>
          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          </button>
          <div class="dropdown-menu">
            @foreach($nbr_ucp_country as $key => $nbr)
              <button class="dropdown-item" onclick="show_nbr_ucp('{{$nbr}}')">{{$key}}</button>
            @endforeach
          </div>
        </div>
      </div>
    <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
        <span id="nbrUcpByCountry">
        </span>
    </div>
  </div>

  <!-- number of new carpart articles by country -->
  <div class="col-lg-4">
    <div class="col-lg-12 text-center by_div"> By Country </div>
      <div class="row">
        <div class="btn-group col-lg-8 offset-lg-2">
          <button type="button" class="btn btn-primary">Country</button>
          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          </button>
          <div class="dropdown-menu">
            @foreach($nbr_ncp_country as $key => $nbr)
              <button class="dropdown-item" onclick="show_nbr_ncp('{{$nbr}}')">{{$key}}</button>
            @endforeach
          </div>
        </div>
      </div>
    <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
        <span id="nbrNcpByCountry">
        </span>
    </div>
  </div>

  <!-- number of used vehicles by country -->
  <div class="col-lg-4">
    <div class="col-lg-12 text-center by_div"> By Country </div>
      <div class="row">
        <div class="btn-group col-lg-8 offset-lg-2">
          <button type="button" class="btn btn-primary">Country</button>
          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          </button>
          <div class="dropdown-menu">
            @foreach($nbr_uv_country as $key => $nbr)
              <button class="dropdown-item" onclick="show_nbr_uv('{{$nbr}}')">{{$key}}</button>
            @endforeach
          </div>
        </div>
      </div>
    <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
        <span id="nbrUvByCountry">
        </span>
    </div>
  </div>

  <!-- number of new vehicles by country -->
  <div class="col-lg-4">
    <div class="col-lg-12 text-center by_div"> By Country </div>
      <div class="row">
        <div class="btn-group col-lg-8 offset-lg-2">
          <button type="button" class="btn btn-primary">Country</button>
          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          </button>
          <div class="dropdown-menu">
            @foreach($nbr_nv_country as $key => $nbr)
              <button class="dropdown-item" onclick="show_nbr_nv('{{$nbr}}')">{{$key}}</button>
            @endforeach
          </div>
        </div>
      </div>
    <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
        <span id="nbrNvByCountry">
        </span>
    </div>
  </div>
</section>

<section class="bg-light">
  <div class="row">
    <div class="btn-group col-lg-8 offset-lg-2">
      <button type="button" class="btn btn-primary">Vehicle Brands</button>
      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      </button>
      <div class="dropdown-menu">
        @foreach($list_vbrands as $brand)
        <button data-brand="{{$brand->name}}" class="dropdown-item getnbrnvbybrand"> {{$brand->name}} </button>
        @endforeach
      </div>
    </div>
  </div>
  <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
      <span id="nbrNvByBrand">
      </span>
  </div>

  <!-- get number of used vehicle articles by brand -->
  <div class="row">
    <div class="btn-group col-lg-8 offset-lg-2">
      <button type="button" class="btn btn-primary">Vehicle Brands</button>
      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      </button>
      <div class="dropdown-menu">
        @foreach($list_vbrands as $brand)
        <button data-brand="{{$brand->name}}" class="dropdown-item getnbruvbybrand"> {{$brand->name}} </button>
        @endforeach
      </div>
    </div>
  </div>
  <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
      <span id="nbrUvByBrand">
      </span>
  </div>

  <!-- get number of new carpart articles by brand -->
  <div class="row">
    <div class="btn-group col-lg-8 offset-lg-2">
      <button type="button" class="btn btn-primary">Carpart Brands</button>
      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      </button>
      <div class="dropdown-menu">
        @foreach($list_cpbrands as $brand)
        <button data-brand="{{$brand->name}}" class="dropdown-item getnbrncpbybrand"> {{$brand->name}} </button>
        @endforeach
      </div>
    </div>
  </div>
  <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
      <span id="nbrNcpByBrand">
      </span>
  </div>

  <!-- get number of used carpart articles by brand -->

  <div class="row">
    <div class="btn-group col-lg-8 offset-lg-2">
      <button type="button" class="btn btn-primary">Carpart Brands</button>
      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      </button>
      <div class="dropdown-menu">
        @foreach($list_cpbrands as $brand)
          <button data-brand="{{$brand->name}}" class="dropdown-item getnbrnvbybrand"> {{$brand->name}} </button>
        @endforeach
      </div>
    </div>
  </div>
  <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
      <span id="nbrUcpByBrand">
      </span>
  </div>
</section>




<script>


// New vehicle articles by day month and year

function show_nbr_ucp(nbr){
  anime({
    targets: '#nbrUcpByCountry',
    innerHTML: [0, nbr],
    easing: 'linear',
    duration : 400,
    round: 10 // Will round the animated value to 1 decimal
  });
}

function show_nbr_ncp(nbr){
  anime({
    targets: '#nbrNcpByCountry',
    innerHTML: [0, nbr],
    easing: 'linear',
    duration : 400,
    round: 10 // Will round the animated value to 1 decimal
  });
}

function show_nbr_uv(nbr){
  anime({
    targets: '#nbrUvByCountry',
    innerHTML: [0, nbr],
    easing: 'linear',
    duration : 400,
    round: 10 // Will round the animated value to 1 decimal
  });
}

function show_nbr_nv(nbr){
  anime({
    targets: '#nbrNvByCountry',
    innerHTML: [0, nbr],
    easing: 'linear',
    duration : 400,
    round: 10 // Will round the animated value to 1 decimal
  });
}

jQuery(".getnbrnvbybrand").on('click',function(e){
  var brand=$(this).data("brand");
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/NbrNvByBrand",
      method: 'get',
      data: {
        brand : brand,
      },
      success: function(result){
        anime({
          targets: '#nbrNvByBrand',
          innerHTML: [0, result.nbr],
          easing: 'linear',
          duration : 400,
          round: 10 // Will round the animated value to 1 decimal
        });  },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
});

jQuery(".getnbruvbybrand").on('click',function(e){
  var brand=$(this).data("brand");
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/NbrUvByBrand",
      method: 'get',
      data: {
        brand : brand,
      },
      success: function(result){
        anime({
          targets: '#nbrUvByBrand',
          innerHTML: [0, result.nbr],
          easing: 'linear',
          duration : 400,
          round: 10 // Will round the animated value to 1 decimal
        });  },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
});

jQuery(".getnbrncpbybrand").on('click',function(e){
  var brand=$(this).data("brand");
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/NbrNcpByBrand",
      method: 'get',
      data: {
        brand : brand,
      },
      success: function(result){
        anime({
          targets: '#nbrNcpByBrand',
          innerHTML: [0, result.nbr],
          easing: 'linear',
          duration : 400,
          round: 10 // Will round the animated value to 1 decimal
        });  },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
});

jQuery(".getnbrucpbybrand").on('click',function(e){
  var brand=$(this).data("brand");
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/NbrUcpByBrand",
      method: 'get',
      data: {
        brand : brand,
      },
      success: function(result){
        anime({
          targets: '#nbrUcpByBrand',
          innerHTML: [0, result.nbr],
          easing: 'linear',
          duration : 400,
          round: 10 // Will round the animated value to 1 decimal
        });  },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
});

jQuery("#get_nbr_Nv_by_year").on('click',function(e){
  var year=$('.nvyear').val();
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/NbrNvByYear",
      method: 'get',
      data: {
        year : year,
      },
      success: function(result){
        anime({
          targets: '#nbrNvByYear',
          innerHTML: [0, result.nbr],
          easing: 'linear',
          duration : 400,
          round: 10 // Will round the animated value to 1 decimal
        });  },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
});


jQuery("#get_nbr_Nv_by_day").on('click',function(e){
     var date=$('.nvyearmonthday').val();
      e.preventDefault();
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
       });
      jQuery.ajax({
         url: "/ajax/NbrNvByDay",
         method: 'get',
         data: {
           date : date,
         },
         success: function(result){
           anime({
             targets: '#nbrNvByDay',
             innerHTML: [0, result.nbr],
             easing: 'linear',
             duration : 400,
             round: 10 // Will round the animated value to 1 decimal
           });  },
         error: function(jqXHR, textStatus, errorThrown){
           swal('something went wrong','impossible','error');
       }});
});


      jQuery("#get_nbr_Nv_by_month").on('click',function(e){
        var year=$('.nvyearmonth').val();
        var month=$('.nvmonth').val();
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/ajax/NbrNvByMonth",
            method: 'get',
            data: {
              year : year,
              month : month
            },
            success: function(result){
              anime({
                targets: '#nbrNvByMonth',
                innerHTML: [0, result.nbr],
                easing: 'linear',
                duration : 400,
                round: 10 // Will round the animated value to 1 decimal
              });  },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });


// Used Vehicle Articles by day month and year

jQuery("#get_nbr_Uv_by_year").on('click',function(e){
  var year=$('.uvyear').val();
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/NbrUvByYear",
      method: 'get',
      data: {
        year : year,
      },
      success: function(result){
        anime({
          targets: '#nbrUvByYear',
          innerHTML: [0, result.nbr],
          easing: 'linear',
          duration : 400,
          round: 10 // Will round the animated value to 1 decimal
        });  },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
});

jQuery("#get_nbr_Uv_by_day").on('click',function(e){
     var date=$('.uvyearmonthday').val();
      e.preventDefault();
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
       });
      jQuery.ajax({
         url: "/ajax/NbrUvByDay",
         method: 'get',
         data: {
           date : date,
         },
         success: function(result){
           anime({
             targets: '#nbrUvByDay',
             innerHTML: [0, result.nbr],
             easing: 'linear',
             duration : 400,
             round: 10 // Will round the animated value to 1 decimal
           });  },
         error: function(jqXHR, textStatus, errorThrown){
           swal('something went wrong','impossible','error');
       }});
  });


      jQuery("#get_nbr_Uv_by_month").on('click',function(e){
        var year=$('.uvyearmonth').val();
        var month=$('.uvmonth').val();
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/ajax/NbrUvByMonth",
            method: 'get',
            data: {
              year : year,
              month : month
            },
            success: function(result){
              anime({
                targets: '#nbrUvByMonth',
                innerHTML: [0, result.nbr],
                easing: 'linear',
                duration : 400,
                round: 10 // Will round the animated value to 1 decimal
              });  },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });

// Number of new carpart articles by day month and year

jQuery("#get_nbr_Ncp_by_year").on('click',function(e){
  var year=$('.ncpyear').val();
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/NbrNcpByYear",
      method: 'get',
      data: {
        year : year,
      },
      success: function(result){
        anime({
          targets: '#nbrNcpByYear',
          innerHTML: [0, result.nbr],
          easing: 'linear',
          duration : 400,
          round: 10 // Will round the animated value to 1 decimal
        });  },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
   });


   jQuery("#get_nbr_Ncp_by_day").on('click',function(e){
     var date=$('.ncpyearmonthday').val();
      e.preventDefault();
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
       });
      jQuery.ajax({
         url: "/ajax/NbrNcpByDay",
         method: 'get',
         data: {
           date : date,
         },
         success: function(result){
           anime({
             targets: '#nbrNcpByDay',
             innerHTML: [0, result.nbr],
             easing: 'linear',
             duration : 400,
             round: 10 // Will round the animated value to 1 decimal
           });  },
         error: function(jqXHR, textStatus, errorThrown){
           swal('something went wrong','impossible','error');
       }});
      });


      jQuery("#get_nbr_Ncp_by_month").on('click',function(e){
        var year=$('.ncpyearmonth').val();
        var month=$('.ncpmonth').val();
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/ajax/NbrNcpByMonth",
            method: 'get',
            data: {
              year : year,
              month : month
            },
            success: function(result){
              anime({
                targets: '#nbrNcpByMonth',
                innerHTML: [0, result.nbr],
                easing: 'linear',
                duration : 400,
                round: 10 // Will round the animated value to 1 decimal
              });  },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });


// used carpart articles by day month and year

jQuery("#get_nbr_Ucp_by_year").on('click',function(e){
  var year=$('.ucpyear').val();
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/NbrUcpByYear",
      method: 'get',
      data: {
        year : year,
      },
      success: function(result){
        anime({
          targets: '#nbrUcpByYear',
          innerHTML: [0, result.nbr],
          easing: 'linear',
          duration : 400,
          round: 10 // Will round the animated value to 1 decimal
        });  },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
   });


   jQuery("#get_nbr_Ucp_by_day").on('click',function(e){
     var date=$('.ucpyearmonthday').val();
      e.preventDefault();
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
       });
      jQuery.ajax({
         url: "/ajax/NbrUcpByDay",
         method: 'get',
         data: {
           date : date,
         },
         success: function(result){
           anime({
             targets: '#nbrUcpByDay',
             innerHTML: [0, result.nbr],
             easing: 'linear',
             duration : 400,
             round: 10 // Will round the animated value to 1 decimal
           });  },
         error: function(jqXHR, textStatus, errorThrown){
           swal('something went wrong','impossible','error');
       }});
      });


      jQuery("#get_nbr_Ucp_by_month").on('click',function(e){
        var year=$('.ucpyearmonth').val();
        var month=$('.ucpmonth').val();
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/ajax/NbrUcpByMonth",
            method: 'get',
            data: {
              year : year,
              month : month
            },
            success: function(result){
              anime({
                targets: '#nbrUcpByMonth',
                innerHTML: [0, result.nbr],
                easing: 'linear',
                duration : 400,
                round: 10 // Will round the animated value to 1 decimal
              });  },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });



// New Vehicles chart by year
var c = document.getElementById("nv_chart");
var Nv_chart = new Chart(c, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "number of New Vehicles",
      data :['{{$nbr_recent_nv_month['1']['0']->sum}}','{{$nbr_recent_nv_month['2']['0']->sum}}','{{$nbr_recent_nv_month['3']['0']->sum}}','{{$nbr_recent_nv_month['4']['0']->sum}}','{{$nbr_recent_nv_month['5']['0']->sum}}','{{$nbr_recent_nv_month['6']['0']->sum}}','{{$nbr_recent_nv_month['7']['0']->sum}}','{{$nbr_recent_nv_month['8']['0']->sum}}','{{$nbr_recent_nv_month['9']['0']->sum}}','{{$nbr_recent_nv_month['10']['0']->sum}}','{{$nbr_recent_nv_month['11']['0']->sum}}','{{$nbr_recent_nv_month['12']['0']->sum}}'],
    }]
  },
});

// Used Vehicles chart by year
var c1 = document.getElementById("uv_chart");
var Nv_chart = new Chart(c1, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "number of Used Vehicles",
      data :['{{$nbr_recent_uv_month['1']['0']->sum}}','{{$nbr_recent_uv_month['2']['0']->sum}}','{{$nbr_recent_uv_month['3']['0']->sum}}','{{$nbr_recent_uv_month['4']['0']->sum}}','{{$nbr_recent_uv_month['5']['0']->sum}}','{{$nbr_recent_uv_month['6']['0']->sum}}','{{$nbr_recent_uv_month['7']['0']->sum}}','{{$nbr_recent_uv_month['8']['0']->sum}}','{{$nbr_recent_uv_month['9']['0']->sum}}','{{$nbr_recent_uv_month['10']['0']->sum}}','{{$nbr_recent_uv_month['11']['0']->sum}}','{{$nbr_recent_uv_month['12']['0']->sum}}'],
    }]
  },
});
var c2 = document.getElementById("ncp_chart");
var Nv_chart = new Chart(c2, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "Number of New Carparts",
      data :['{{$nbr_recent_ncp_month['1']['0']->sum}}','{{$nbr_recent_ncp_month['2']['0']->sum}}','{{$nbr_recent_ncp_month['3']['0']->sum}}','{{$nbr_recent_ncp_month['4']['0']->sum}}','{{$nbr_recent_ncp_month['5']['0']->sum}}','{{$nbr_recent_ncp_month['6']['0']->sum}}','{{$nbr_recent_ncp_month['7']['0']->sum}}','{{$nbr_recent_ncp_month['8']['0']->sum}}','{{$nbr_recent_ncp_month['9']['0']->sum}}','{{$nbr_recent_ncp_month['10']['0']->sum}}','{{$nbr_recent_ncp_month['11']['0']->sum}}','{{$nbr_recent_ncp_month['12']['0']->sum}}'],
    }]
  },
});


// Used carpart articles chart by year
var c3 = document.getElementById("ucp_chart");
var Nv_chart = new Chart(c3, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "number of Used Carparts",
      data :['{{$nbr_recent_ucp_month['1']['0']->sum}}','{{$nbr_recent_ucp_month['2']['0']->sum}}','{{$nbr_recent_ucp_month['3']['0']->sum}}','{{$nbr_recent_ucp_month['4']['0']->sum}}','{{$nbr_recent_ucp_month['5']['0']->sum}}','{{$nbr_recent_ucp_month['6']['0']->sum}}','{{$nbr_recent_ucp_month['7']['0']->sum}}','{{$nbr_recent_ucp_month['8']['0']->sum}}','{{$nbr_recent_ucp_month['9']['0']->sum}}','{{$nbr_recent_ucp_month['10']['0']->sum}}','{{$nbr_recent_ucp_month['11']['0']->sum}}','{{$nbr_recent_ucp_month['12']['0']->sum}}'],
    }]
  },
});


// New carpart articles chart by Category
var c4 = document.getElementById("ncp_category_chart");
var Nv_chart = new Chart(c4, {
  type : 'pie',
  data : {
    labels : [ @foreach($carpart_categories as $carpart_category)"{{$carpart_category['category']}}",@endforeach],
    datasets: [{
      label : "number of New Carparts",
      data :[@foreach($carpart_categories as $carpart_category) '{{$nbr_ncp_category[''.$carpart_category['category'].'']['0']->sum}}',  @endforeach],
    }]
  },
});


// Chart of used carpart articles by category
var c5 = document.getElementById("ucp_category_chart");
var Nv_chart = new Chart(c5, {
  type : 'pie',
  data : {
    labels : [ @foreach($carpart_categories as $carpart_category)"{{$carpart_category['category']}}",@endforeach],
    datasets: [{
      label : "number of New Carparts",
      data :[@foreach($carpart_categories as $carpart_category) '{{$nbr_ucp_category[''.$carpart_category['category'].'']['0']->sum}}',  @endforeach],
    }]
  },
});


// Chart of number of articles of the market
var c6 = document.getElementById("nbr_articles_chart");
var Nv_chart = new Chart(c6, {
  type : 'polarArea',
  data : {
    labels : ['Number of used Vehicles','Number of new Vehicles','Number of Used Carparts','Number of new Carparts'],
    datasets: [{
      label : "number of New Carparts",
      data :['{{$nbr_uv_articles['0']->sum}}','{{$nbr_nv_articles['0']->sum}}','{{$nbr_ucp_articles['0']->sum}}','{{$nbr_ncp_articles['0']->sum}}'],
    }]
  },
});

jQuery(document).ready(function(){
jQuery("#nv_go_day").on('click',function(e){
  var date=$('#nv_input_day').val();
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/getnvbyday/"+date,
      method: 'get',
      data: {
          },
      success: function(result){
        $('#nv_day').html(''+result.data[0].sum+'');
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
   });
});

jQuery(document).ready(function(){
jQuery("#uv_go_day").on('click',function(e){
  var date=$('#uv_input_day').val();
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/getuvbyday/"+date,
      method: 'get',
      data: {
          },
      success: function(result){
        $('#uv_day').html(''+result.data[0].sum+'');
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
   });
});


jQuery(document).ready(function(){
jQuery("#ncp_go_day").on('click',function(e){
  var date=$('#ncp_input_day').val();
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/getncpbyday/"+date,
      method: 'get',
      data: {
          },
      success: function(result){
        $('#ncp_day').html(''+result.data[0].sum+'');
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
   });
});


jQuery(document).ready(function(){
jQuery("#ucp_go_day").on('click',function(e){
  var date=$('#ucp_input_day').val();
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/getucpbyday/"+date,
      method: 'get',
      data: {
          },
      success: function(result){
        $('#ucp_day').html(''+result.data[0].sum+'');
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
   });
});


$(function(){
var maps = new jvm.Map({
map: 'world_mill_en',
container: $('#map_ucp'),
regionLabelStyle: {
  initial: {
    fill: '#B90E32'
  },
  hover: {
    fill: 'black'
  }
},
series: {
regions: [{
  scale: ['#ffc107', '#dc3545'],
  normalizeFunction: 'polynomial',


  values: {
"BD" : @if(array_key_exists('Bangladesh',$nbr_ucp_country)) {{$nbr_ucp_country['Bangladesh']}} @else {{'0'}} @endif,
"BE" : @if(array_key_exists('Belgium',$nbr_ucp_country)) {{$nbr_ucp_country['Belgium']}} @else {{'0'}} @endif,
"BF" : @if(array_key_exists('Burkina Faso',$nbr_ucp_country)) {{$nbr_ucp_country['Burkina Faso']}} @else {{'0'}} @endif,
"BG" : @if(array_key_exists('Bulgaria',$nbr_ucp_country)) {{$nbr_ucp_country['Bulgaria']}} @else {{'0'}} @endif,
"BA" : @if(array_key_exists('Bosnia and Herz.',$nbr_ucp_country)) {{$nbr_ucp_country['Bosnia and Herz.']}} @else {{'0'}} @endif,
"BN" : @if(array_key_exists('Brunei',$nbr_ucp_country)) {{$nbr_ucp_country['Brunei']}} @else {{'0'}} @endif,
"BO" : @if(array_key_exists('Bolivia',$nbr_ucp_country)) {{$nbr_ucp_country['Bolivia']}} @else {{'0'}} @endif,
"JP" : @if(array_key_exists('Japan',$nbr_ucp_country)) {{$nbr_ucp_country['Japan']}} @else {{'0'}} @endif,
"BI" : @if(array_key_exists('Burundi',$nbr_ucp_country)) {{$nbr_ucp_country['Burundi']}} @else {{'0'}} @endif,
"BJ" : @if(array_key_exists('Benin',$nbr_ucp_country)) {{$nbr_ucp_country['Benin']}} @else {{'0'}} @endif,
"BT" : @if(array_key_exists('Bhutan',$nbr_ucp_country)) {{$nbr_ucp_country['Bhutan']}} @else {{'0'}} @endif,
"JM" : @if(array_key_exists('Jamaica',$nbr_ucp_country)) {{$nbr_ucp_country['Jamaica']}} @else {{'0'}} @endif,
"BW" : @if(array_key_exists('Botswana',$nbr_ucp_country)) {{$nbr_ucp_country['Botswana']}} @else {{'0'}} @endif,
"BR" : @if(array_key_exists('Brazil',$nbr_ucp_country)) {{$nbr_ucp_country['Brazil']}} @else {{'0'}} @endif,
"BS" : @if(array_key_exists('Bahamas',$nbr_ucp_country)) {{$nbr_ucp_country['Bahamas']}} @else {{'0'}} @endif,
"BY" : @if(array_key_exists('Belarus',$nbr_ucp_country)) {{$nbr_ucp_country['Belarus']}} @else {{'0'}} @endif,
"BZ" : @if(array_key_exists('Belize',$nbr_ucp_country)) {{$nbr_ucp_country['Belize']}} @else {{'0'}} @endif,
"RU" : @if(array_key_exists('Russia',$nbr_ucp_country)) {{$nbr_ucp_country['Russia']}} @else {{'0'}} @endif,
"RW" : @if(array_key_exists('Rwanda',$nbr_ucp_country)) {{$nbr_ucp_country['Rwanda']}} @else {{'0'}} @endif,
"RS" : @if(array_key_exists('Serbia',$nbr_ucp_country)) {{$nbr_ucp_country['Serbia']}} @else {{'0'}} @endif,
"TL" : @if(array_key_exists('Timor-Leste',$nbr_ucp_country)) {{$nbr_ucp_country['Timor-Leste']}} @else {{'0'}} @endif,
"TM" : @if(array_key_exists('Turkmenistan',$nbr_ucp_country)) {{$nbr_ucp_country['Turkmenistan']}} @else {{'0'}} @endif,
"TJ" : @if(array_key_exists('Tajikistan',$nbr_ucp_country)) {{$nbr_ucp_country['Tajikistan']}} @else {{'0'}} @endif,
"RO" : @if(array_key_exists('Romania',$nbr_ucp_country)) {{$nbr_ucp_country['Romania']}} @else {{'0'}} @endif,
"GW" : @if(array_key_exists('Guinea-Bissau',$nbr_ucp_country)) {{$nbr_ucp_country['Guinea-Bissau']}} @else {{'0'}} @endif,
"GT" : @if(array_key_exists('Guatemala',$nbr_ucp_country)) {{$nbr_ucp_country['Guatemala']}} @else {{'0'}} @endif,
"GR" : @if(array_key_exists('Greece',$nbr_ucp_country)) {{$nbr_ucp_country['Greece']}} @else {{'0'}} @endif,
"GQ" : @if(array_key_exists('Eq. Guinea',$nbr_ucp_country)) {{$nbr_ucp_country['Eq. Guinea']}} @else {{'0'}} @endif,
"GY" : @if(array_key_exists('Guyana',$nbr_ucp_country)) {{$nbr_ucp_country['Guyana']}} @else {{'0'}} @endif,
"GE" : @if(array_key_exists('Georgia',$nbr_ucp_country)) {{$nbr_ucp_country['Georgia']}} @else {{'0'}} @endif,
"GB" : @if(array_key_exists('United Kingdom',$nbr_ucp_country)) {{$nbr_ucp_country['United Kingdom']}} @else {{'0'}} @endif,
"GA" : @if(array_key_exists('Gabon',$nbr_ucp_country)) {{$nbr_ucp_country['Gabon']}} @else {{'0'}} @endif,
"GN" : @if(array_key_exists('Guinea',$nbr_ucp_country)) {{$nbr_ucp_country['Guinea']}} @else {{'0'}} @endif,
"GM" : @if(array_key_exists('Gambia',$nbr_ucp_country)) {{$nbr_ucp_country['Gambia']}} @else {{'0'}} @endif,
"GL" : @if(array_key_exists('Greenland',$nbr_ucp_country)) {{$nbr_ucp_country['Greenland']}} @else {{'0'}} @endif,
"GH" : @if(array_key_exists('Ghana',$nbr_ucp_country)) {{$nbr_ucp_country['Ghana']}} @else {{'0'}} @endif,
"OM" : @if(array_key_exists('Oman',$nbr_ucp_country)) {{$nbr_ucp_country['Oman']}} @else {{'0'}} @endif,
"TN" : @if(array_key_exists('Tunisia',$nbr_ucp_country)) {{$nbr_ucp_country['Tunisia']}} @else {{'0'}} @endif,
"JO" : @if(array_key_exists('Jordan',$nbr_ucp_country)) {{$nbr_ucp_country['Jordan']}} @else {{'0'}} @endif,
"HR" : @if(array_key_exists('Croatia',$nbr_ucp_country)) {{$nbr_ucp_country['Croatia']}} @else {{'0'}} @endif,
"HT" : @if(array_key_exists('Haiti',$nbr_ucp_country)) {{$nbr_ucp_country['Haiti']}} @else {{'0'}} @endif,
"HU" : @if(array_key_exists('Hungary',$nbr_ucp_country)) {{$nbr_ucp_country['Hungary']}} @else {{'0'}} @endif,
"HN" : @if(array_key_exists('Honduras',$nbr_ucp_country)) {{$nbr_ucp_country['Honduras']}} @else {{'0'}} @endif,
"PR" : @if(array_key_exists('Puerto Rico',$nbr_ucp_country)) {{$nbr_ucp_country['Puerto Rico']}} @else {{'0'}} @endif,
"PS" : @if(array_key_exists('Palestine',$nbr_ucp_country)) {{$nbr_ucp_country['Palestine']}} @else {{'0'}} @endif,
"PT" : @if(array_key_exists('Portugal',$nbr_ucp_country)) {{$nbr_ucp_country['Portugal']}} @else {{'0'}} @endif,
"PY" : @if(array_key_exists('Paraguay',$nbr_ucp_country)) {{$nbr_ucp_country['Paraguay']}} @else {{'0'}} @endif,
"PA" : @if(array_key_exists('Panama',$nbr_ucp_country)) {{$nbr_ucp_country['Panama']}} @else {{'0'}} @endif,
"PG" : @if(array_key_exists('Papua New Guinea',$nbr_ucp_country)) {{$nbr_ucp_country['Papua New Guinea']}} @else {{'0'}} @endif,
"PE" : @if(array_key_exists('Peru',$nbr_ucp_country)) {{$nbr_ucp_country['Peru']}} @else {{'0'}} @endif,
"PK" : @if(array_key_exists('Pakistan',$nbr_ucp_country)) {{$nbr_ucp_country['Pakistan']}} @else {{'0'}} @endif,
"PH" : @if(array_key_exists('Philippines',$nbr_ucp_country)) {{$nbr_ucp_country['Philippines']}} @else {{'0'}} @endif,
"PL" : @if(array_key_exists('Poland',$nbr_ucp_country)) {{$nbr_ucp_country['Poland']}} @else {{'0'}} @endif,
"ZM" : @if(array_key_exists('Zambia',$nbr_ucp_country)) {{$nbr_ucp_country['Zambia']}} @else {{'0'}} @endif,
"EH" : @if(array_key_exists('W. Sahara',$nbr_ucp_country)) {{$nbr_ucp_country['W. Sahara']}} @else {{'0'}} @endif,
"EE" : @if(array_key_exists('Estonia',$nbr_ucp_country)) {{$nbr_ucp_country['Estonia']}} @else {{'0'}} @endif,
"EG" : @if(array_key_exists('Egypt',$nbr_ucp_country)) {{$nbr_ucp_country['Egypt']}} @else {{'0'}} @endif,
"ZA" : @if(array_key_exists('South Africa',$nbr_ucp_country)) {{$nbr_ucp_country['South Africa']}} @else {{'0'}} @endif,
"EC" : @if(array_key_exists('Ecuador',$nbr_ucp_country)) {{$nbr_ucp_country['Ecuador']}} @else {{'0'}} @endif,
"IT" : @if(array_key_exists('Italy',$nbr_ucp_country)) {{$nbr_ucp_country['Italy']}} @else {{'0'}} @endif,
"VN" : @if(array_key_exists('Vietnam',$nbr_ucp_country)) {{$nbr_ucp_country['Vietnam']}} @else {{'0'}} @endif,
"SB" : @if(array_key_exists('Solomon Is.',$nbr_ucp_country)) {{$nbr_ucp_country['Solomon Is.']}} @else {{'0'}} @endif,
"ET" : @if(array_key_exists('Ethiopia',$nbr_ucp_country)) {{$nbr_ucp_country['Ethiopia']}} @else {{'0'}} @endif,
"SO" : @if(array_key_exists('Somalia',$nbr_ucp_country)) {{$nbr_ucp_country['Somalia']}} @else {{'0'}} @endif,
"ZW" : @if(array_key_exists('Zimbabwe',$nbr_ucp_country)) {{$nbr_ucp_country['Zimbabwe']}} @else {{'0'}} @endif,
"ES" : @if(array_key_exists('Spain',$nbr_ucp_country)) {{$nbr_ucp_country['Spain']}} @else {{'0'}} @endif,
"ER" : @if(array_key_exists('Eritrea',$nbr_ucp_country)) {{$nbr_ucp_country['Eritrea']}} @else {{'0'}} @endif,
"ME" : @if(array_key_exists('Montenegro',$nbr_ucp_country)) {{$nbr_ucp_country['Montenegro']}} @else {{'0'}} @endif,
"MD" : @if(array_key_exists('Moldova',$nbr_ucp_country)) {{$nbr_ucp_country['Moldova']}} @else {{'0'}} @endif,
"MG" : @if(array_key_exists('Madagascar',$nbr_ucp_country)) {{$nbr_ucp_country['Madagascar']}} @else {{'0'}} @endif,
"MA" : @if(array_key_exists('Morocco',$nbr_ucp_country)) {{$nbr_ucp_country['Morocco']}} @else {{'0'}} @endif,
"UZ" : @if(array_key_exists('Uzbekistan',$nbr_ucp_country)) {{$nbr_ucp_country['Uzbekistan']}} @else {{'0'}} @endif,
"MM" : @if(array_key_exists('Myanmar',$nbr_ucp_country)) {{$nbr_ucp_country['Myanmar']}} @else {{'0'}} @endif,
"ML" : @if(array_key_exists('Mali',$nbr_ucp_country)) {{$nbr_ucp_country['Mali']}} @else {{'0'}} @endif,
"MN" : @if(array_key_exists('Mongolia',$nbr_ucp_country)) {{$nbr_ucp_country['Mongolia']}} @else {{'0'}} @endif,
"MK" : @if(array_key_exists('Macedonia',$nbr_ucp_country)) {{$nbr_ucp_country['Macedonia']}} @else {{'0'}} @endif,
"MW" : @if(array_key_exists('Malawi',$nbr_ucp_country)) {{$nbr_ucp_country['Malawi']}} @else {{'0'}} @endif,
"MR" : @if(array_key_exists('Mauritania',$nbr_ucp_country)) {{$nbr_ucp_country['Mauritania']}} @else {{'0'}} @endif,
"UG" : @if(array_key_exists('Uganda',$nbr_ucp_country)) {{$nbr_ucp_country['Uganda']}} @else {{'0'}} @endif,
"MY" : @if(array_key_exists('Malaysia',$nbr_ucp_country)) {{$nbr_ucp_country['Malaysia']}} @else {{'0'}} @endif,
"MX" : @if(array_key_exists('Mexico',$nbr_ucp_country)) {{$nbr_ucp_country['Mexico']}} @else {{'0'}} @endif,
"IL" : @if(array_key_exists('Israel',$nbr_ucp_country)) {{$nbr_ucp_country['Israel']}} @else {{'0'}} @endif,
"FR" : @if(array_key_exists('France',$nbr_ucp_country)) {{$nbr_ucp_country['France']}} @else {{'0'}} @endif,
"XS" : @if(array_key_exists('Somaliland',$nbr_ucp_country)) {{$nbr_ucp_country['Somaliland']}} @else {{'0'}} @endif,
"FI" : @if(array_key_exists('Finland',$nbr_ucp_country)) {{$nbr_ucp_country['Finland']}} @else {{'0'}} @endif,
"FJ" : @if(array_key_exists('Fiji',$nbr_ucp_country)) {{$nbr_ucp_country['Fiji']}} @else {{'0'}} @endif,
"FK" : @if(array_key_exists('Falkland Is.',$nbr_ucp_country)) {{$nbr_ucp_country['Falkland Is.']}} @else {{'0'}} @endif,
"NI" : @if(array_key_exists('Nicaragua',$nbr_ucp_country)) {{$nbr_ucp_country['Nicaragua']}} @else {{'0'}} @endif,
"NL" : @if(array_key_exists('Netherlands',$nbr_ucp_country)) {{$nbr_ucp_country['Netherlands']}} @else {{'0'}} @endif,
"NO" : @if(array_key_exists('Norway',$nbr_ucp_country)) {{$nbr_ucp_country['Norway']}} @else {{'0'}} @endif,
"NA" : @if(array_key_exists('Namibia',$nbr_ucp_country)) {{$nbr_ucp_country['Namibia']}} @else {{'0'}} @endif,
"VU" : @if(array_key_exists('Vanuatu',$nbr_ucp_country)) {{$nbr_ucp_country['Vanuatu']}} @else {{'0'}} @endif,
"NC" : @if(array_key_exists('New Caledonia',$nbr_ucp_country)) {{$nbr_ucp_country['New Caledonia']}} @else {{'0'}} @endif,
"NE" : @if(array_key_exists('Niger',$nbr_ucp_country)) {{$nbr_ucp_country['Niger']}} @else {{'0'}} @endif,
"NG" : @if(array_key_exists('Nigeria',$nbr_ucp_country)) {{$nbr_ucp_country['Nigeria']}} @else {{'0'}} @endif,
"NZ" : @if(array_key_exists('New Zealand',$nbr_ucp_country)) {{$nbr_ucp_country['New Zealand']}} @else {{'0'}} @endif,
"NP" : @if(array_key_exists('Nepal',$nbr_ucp_country)) {{$nbr_ucp_country['Nepal']}} @else {{'0'}} @endif,
"XK" : @if(array_key_exists('Kosovo',$nbr_ucp_country)) {{$nbr_ucp_country['Kosovo']}} @else {{'0'}} @endif,
"CI" : @if(array_key_exists('Côte d\'Ivoire',$nbr_ucp_country)) {{$nbr_ucp_country['Côte d\'Ivoire']}} @else {{'0'}} @endif,
"CH" : @if(array_key_exists('Switzerland',$nbr_ucp_country)) {{$nbr_ucp_country['Switzerland']}} @else {{'0'}} @endif,
"CO" : @if(array_key_exists('Colombia',$nbr_ucp_country)) {{$nbr_ucp_country['Colombia']}} @else {{'0'}} @endif,
"CN" : @if(array_key_exists('China',$nbr_ucp_country)) {{$nbr_ucp_country['China']}} @else {{'0'}} @endif,
"CM" : @if(array_key_exists('Cameroon',$nbr_ucp_country)) {{$nbr_ucp_country['Cameroon']}} @else {{'0'}} @endif,
"CL" : @if(array_key_exists('Chile',$nbr_ucp_country)) {{$nbr_ucp_country['Chile']}} @else {{'0'}} @endif,
"XC" : @if(array_key_exists('N. Cyprus',$nbr_ucp_country)) {{$nbr_ucp_country['N. Cyprus']}} @else {{'0'}} @endif,
"CA" : @if(array_key_exists('Canada',$nbr_ucp_country)) {{$nbr_ucp_country['Canada']}} @else {{'0'}} @endif,
"CG" : @if(array_key_exists('Congo',$nbr_ucp_country)) {{$nbr_ucp_country['Congo']}} @else {{'0'}} @endif,
"CF" : @if(array_key_exists('Central African Rep.',$nbr_ucp_country)) {{$nbr_ucp_country['Central African Rep.']}} @else {{'0'}} @endif,
"CD" : @if(array_key_exists('Dem. Rep. Congo',$nbr_ucp_country)) {{$nbr_ucp_country['Dem. Rep. Congo']}} @else {{'0'}} @endif,
"CZ" : @if(array_key_exists('Czech Rep.',$nbr_ucp_country)) {{$nbr_ucp_country['Czech Rep.']}} @else {{'0'}} @endif,
"CY" : @if(array_key_exists('Cyprus',$nbr_ucp_country)) {{$nbr_ucp_country['Cyprus']}} @else {{'0'}} @endif,
"CR" : @if(array_key_exists('Costa Rica',$nbr_ucp_country)) {{$nbr_ucp_country['Costa Rica']}} @else {{'0'}} @endif,
"CU" : @if(array_key_exists('Cuba',$nbr_ucp_country)) {{$nbr_ucp_country['Cuba']}} @else {{'0'}} @endif,
"SZ" : @if(array_key_exists('Swaziland',$nbr_ucp_country)) {{$nbr_ucp_country['Swaziland']}} @else {{'0'}} @endif,
"SY" : @if(array_key_exists('Syria',$nbr_ucp_country)) {{$nbr_ucp_country['Syria']}} @else {{'0'}} @endif,
"KG" : @if(array_key_exists('Kyrgyzstan',$nbr_ucp_country)) {{$nbr_ucp_country['Kyrgyzstan']}} @else {{'0'}} @endif,
"KE" : @if(array_key_exists('Kenya',$nbr_ucp_country)) {{$nbr_ucp_country['Kenya']}} @else {{'0'}} @endif,
"SS" : @if(array_key_exists('S. Sudan',$nbr_ucp_country)) {{$nbr_ucp_country['S. Sudan']}} @else {{'0'}} @endif,
"SR" : @if(array_key_exists('Suriname',$nbr_ucp_country)) {{$nbr_ucp_country['Suriname']}} @else {{'0'}} @endif,
"KH" : @if(array_key_exists('Cambodia',$nbr_ucp_country)) {{$nbr_ucp_country['Cambodia']}} @else {{'0'}} @endif,
"SV" : @if(array_key_exists('El Salvador',$nbr_ucp_country)) {{$nbr_ucp_country['El Salvador']}} @else {{'0'}} @endif,
"SK" : @if(array_key_exists('Slovakia',$nbr_ucp_country)) {{$nbr_ucp_country['Slovakia']}} @else {{'0'}} @endif,
"KR" : @if(array_key_exists('Korea',$nbr_ucp_country)) {{$nbr_ucp_country['Korea']}} @else {{'0'}} @endif,
"SI" : @if(array_key_exists('Slovenia',$nbr_ucp_country)) {{$nbr_ucp_country['Slovenia']}} @else {{'0'}} @endif,
"KP" : @if(array_key_exists('Dem. Rep. Korea',$nbr_ucp_country)) {{$nbr_ucp_country['Dem. Rep. Korea']}} @else {{'0'}} @endif,
"KW" : @if(array_key_exists('Kuwait',$nbr_ucp_country)) {{$nbr_ucp_country['Kuwait']}} @else {{'0'}} @endif,
"SN" : @if(array_key_exists('Senegal',$nbr_ucp_country)) {{$nbr_ucp_country['Senegal']}} @else {{'0'}} @endif,
"SL" : @if(array_key_exists('Sierra Leone',$nbr_ucp_country)) {{$nbr_ucp_country['Sierra Leone']}} @else {{'0'}} @endif,
"KZ" : @if(array_key_exists('Kazakhstan',$nbr_ucp_country)) {{$nbr_ucp_country['Kazakhstan']}} @else {{'0'}} @endif,
"SA" : @if(array_key_exists('Saudi Arabia',$nbr_ucp_country)) {{$nbr_ucp_country['Saudi Arabia']}} @else {{'0'}} @endif,
"SE" : @if(array_key_exists('Sweden',$nbr_ucp_country)) {{$nbr_ucp_country['Sweden']}} @else {{'0'}} @endif,
"SD" : @if(array_key_exists('Sudan',$nbr_ucp_country)) {{$nbr_ucp_country['Sudan']}} @else {{'0'}} @endif,
"DO" : @if(array_key_exists('Dominican Rep.',$nbr_ucp_country)) {{$nbr_ucp_country['Dominican Rep.']}} @else {{'0'}} @endif,
"DJ" : @if(array_key_exists('Djibouti',$nbr_ucp_country)) {{$nbr_ucp_country['Djibouti']}} @else {{'0'}} @endif,
"DK" : @if(array_key_exists('Denmark',$nbr_ucp_country)) {{$nbr_ucp_country['Denmark']}} @else {{'0'}} @endif,
"DE" : @if(array_key_exists('Germany',$nbr_ucp_country)) {{$nbr_ucp_country['Germany']}} @else {{'0'}} @endif,
"YE" : @if(array_key_exists('Yemen',$nbr_ucp_country)) {{$nbr_ucp_country['Yemen']}} @else {{'0'}} @endif,
"DZ" : @if(array_key_exists('Algeria',$nbr_ucp_country)) {{$nbr_ucp_country['Algeria']}} @else {{'0'}} @endif,
"US" : @if(array_key_exists('United States',$nbr_ucp_country)) {{$nbr_ucp_country['United States']}} @else {{'0'}} @endif,
"UY" : @if(array_key_exists('Uruguay',$nbr_ucp_country)) {{$nbr_ucp_country['Uruguay']}} @else {{'0'}} @endif,
"LB" : @if(array_key_exists('Lebanon',$nbr_ucp_country)) {{$nbr_ucp_country['Lebanon']}} @else {{'0'}} @endif,
"LA" : @if(array_key_exists('Lao PDR',$nbr_ucp_country)) {{$nbr_ucp_country['Lao PDR']}} @else {{'0'}} @endif,
"TW" : @if(array_key_exists('Taiwan',$nbr_ucp_country)) {{$nbr_ucp_country['Taiwan']}} @else {{'0'}} @endif,
"TT" : @if(array_key_exists('Trinidad and Tobago',$nbr_ucp_country)) {{$nbr_ucp_country['Trinidad and Tobago']}} @else {{'0'}} @endif,
"TR" : @if(array_key_exists('Turkey',$nbr_ucp_country)) {{$nbr_ucp_country['Turkey']}} @else {{'0'}} @endif,
"LK" : @if(array_key_exists('Sri Lanka',$nbr_ucp_country)) {{$nbr_ucp_country['Sri Lanka']}} @else {{'0'}} @endif,
"LV" : @if(array_key_exists('Latvia',$nbr_ucp_country)) {{$nbr_ucp_country['Latvia']}} @else {{'0'}} @endif,
"LT" : @if(array_key_exists('Lithuania',$nbr_ucp_country)) {{$nbr_ucp_country['Lithuania']}} @else {{'0'}} @endif,
"LU" : @if(array_key_exists('Luxembourg',$nbr_ucp_country)) {{$nbr_ucp_country['Luxembourg']}} @else {{'0'}} @endif,
"LR" : @if(array_key_exists('Liberia',$nbr_ucp_country)) {{$nbr_ucp_country['Liberia']}} @else {{'0'}} @endif,
"LS" : @if(array_key_exists('Lesotho',$nbr_ucp_country)) {{$nbr_ucp_country['Lesotho']}} @else {{'0'}} @endif,
"TH" : @if(array_key_exists('Thailand',$nbr_ucp_country)) {{$nbr_ucp_country['Thailand']}} @else {{'0'}} @endif,
"TF" : @if(array_key_exists('Fr. S. Antarctic Lands',$nbr_ucp_country)) {{$nbr_ucp_country['Fr. S. Antarctic Lands']}} @else {{'0'}} @endif,
"TG" : @if(array_key_exists('Togo',$nbr_ucp_country)) {{$nbr_ucp_country['Togo']}} @else {{'0'}} @endif,
"TD" : @if(array_key_exists('Chad',$nbr_ucp_country)) {{$nbr_ucp_country['Chad']}} @else {{'0'}} @endif,
"LY" : @if(array_key_exists('Libya',$nbr_ucp_country)) {{$nbr_ucp_country['Libya']}} @else {{'0'}} @endif,
"AE" : @if(array_key_exists('United Arab Emirates',$nbr_ucp_country)) {{$nbr_ucp_country['United Arab Emirates']}} @else {{'0'}} @endif,
"VE" : @if(array_key_exists('Venezuela',$nbr_ucp_country)) {{$nbr_ucp_country['Venezuela']}} @else {{'0'}} @endif,
"AF" : @if(array_key_exists('Afghanistan',$nbr_ucp_country)) {{$nbr_ucp_country['Afghanistan']}} @else {{'0'}} @endif,
"IQ" : @if(array_key_exists('Iraq',$nbr_ucp_country)) {{$nbr_ucp_country['Iraq']}} @else {{'0'}} @endif,
"IS" : @if(array_key_exists('Iceland',$nbr_ucp_country)) {{$nbr_ucp_country['Iceland']}} @else {{'0'}} @endif,
"IR" : @if(array_key_exists('Iran',$nbr_ucp_country)) {{$nbr_ucp_country['Iran']}} @else {{'0'}} @endif,
"AM" : @if(array_key_exists('Armenia',$nbr_ucp_country)) {{$nbr_ucp_country['Armenia']}} @else {{'0'}} @endif,
"AL" : @if(array_key_exists('Albania',$nbr_ucp_country)) {{$nbr_ucp_country['Albania']}} @else {{'0'}} @endif,
"AO" : @if(array_key_exists('Angola',$nbr_ucp_country)) {{$nbr_ucp_country['Angola']}} @else {{'0'}} @endif,
"AR" : @if(array_key_exists('Argentina',$nbr_ucp_country)) {{$nbr_ucp_country['Argentina']}} @else {{'0'}} @endif,
"AU" : @if(array_key_exists('Australia',$nbr_ucp_country)) {{$nbr_ucp_country['Australia']}} @else {{'0'}} @endif,
"AT" : @if(array_key_exists('Austria',$nbr_ucp_country)) {{$nbr_ucp_country['Austria']}} @else {{'0'}} @endif,
"IN" : @if(array_key_exists('India',$nbr_ucp_country)) {{$nbr_ucp_country['India']}} @else {{'0'}} @endif,
"TZ" : @if(array_key_exists('Tanzania',$nbr_ucp_country)) {{$nbr_ucp_country['Tanzania']}} @else {{'0'}} @endif,
"AZ" : @if(array_key_exists('Azerbaijan',$nbr_ucp_country)) {{$nbr_ucp_country['Azerbaijan']}} @else {{'0'}} @endif,
"IE" : @if(array_key_exists('Ireland',$nbr_ucp_country)) {{$nbr_ucp_country['Ireland']}} @else {{'0'}} @endif,
"ID" : @if(array_key_exists('Indonesia',$nbr_ucp_country)) {{$nbr_ucp_country['Indonesia']}} @else {{'0'}} @endif,
"UA" : @if(array_key_exists('Ukraine',$nbr_ucp_country)) {{$nbr_ucp_country['Ukraine']}} @else {{'0'}} @endif,
"QA" : @if(array_key_exists('Qatar',$nbr_ucp_country)) {{$nbr_ucp_country['Qatar']}} @else {{'0'}} @endif,
"MZ" : @if(array_key_exists('Mozambique',$nbr_ucp_country)) {{$nbr_ucp_country['Mozambique']}} @else {{'0'}} @endif,
  }
}]
},
onRegionClick: function (event, code) {
var name = maps.mapData.paths[code].name;
alert(name);
},
});
});


$(function(){
var maps = new jvm.Map({
map: 'world_mill_en',
container: $('#map_ncp'),
regionLabelStyle: {
  initial: {
    fill: '#B90E32'
  },
  hover: {
    fill: 'black'
  }
},
series: {
regions: [{
  scale: ['#ffc107', '#dc3545'],
  normalizeFunction: 'polynomial',


  values: {
"BD" : @if(array_key_exists('Bangladesh',$nbr_ncp_country)) {{$nbr_ncp_country['Bangladesh']}} @else {{'0'}} @endif,
"BE" : @if(array_key_exists('Belgium',$nbr_ncp_country)) {{$nbr_ncp_country['Belgium']}} @else {{'0'}} @endif,
"BF" : @if(array_key_exists('Burkina Faso',$nbr_ncp_country)) {{$nbr_ncp_country['Burkina Faso']}} @else {{'0'}} @endif,
"BG" : @if(array_key_exists('Bulgaria',$nbr_ncp_country)) {{$nbr_ncp_country['Bulgaria']}} @else {{'0'}} @endif,
"BA" : @if(array_key_exists('Bosnia and Herz.',$nbr_ncp_country)) {{$nbr_ncp_country['Bosnia and Herz.']}} @else {{'0'}} @endif,
"BN" : @if(array_key_exists('Brunei',$nbr_ncp_country)) {{$nbr_ncp_country['Brunei']}} @else {{'0'}} @endif,
"BO" : @if(array_key_exists('Bolivia',$nbr_ncp_country)) {{$nbr_ncp_country['Bolivia']}} @else {{'0'}} @endif,
"JP" : @if(array_key_exists('Japan',$nbr_ncp_country)) {{$nbr_ncp_country['Japan']}} @else {{'0'}} @endif,
"BI" : @if(array_key_exists('Burundi',$nbr_ncp_country)) {{$nbr_ncp_country['Burundi']}} @else {{'0'}} @endif,
"BJ" : @if(array_key_exists('Benin',$nbr_ncp_country)) {{$nbr_ncp_country['Benin']}} @else {{'0'}} @endif,
"BT" : @if(array_key_exists('Bhutan',$nbr_ncp_country)) {{$nbr_ncp_country['Bhutan']}} @else {{'0'}} @endif,
"JM" : @if(array_key_exists('Jamaica',$nbr_ncp_country)) {{$nbr_ncp_country['Jamaica']}} @else {{'0'}} @endif,
"BW" : @if(array_key_exists('Botswana',$nbr_ncp_country)) {{$nbr_ncp_country['Botswana']}} @else {{'0'}} @endif,
"BR" : @if(array_key_exists('Brazil',$nbr_ncp_country)) {{$nbr_ncp_country['Brazil']}} @else {{'0'}} @endif,
"BS" : @if(array_key_exists('Bahamas',$nbr_ncp_country)) {{$nbr_ncp_country['Bahamas']}} @else {{'0'}} @endif,
"BY" : @if(array_key_exists('Belarus',$nbr_ncp_country)) {{$nbr_ncp_country['Belarus']}} @else {{'0'}} @endif,
"BZ" : @if(array_key_exists('Belize',$nbr_ncp_country)) {{$nbr_ncp_country['Belize']}} @else {{'0'}} @endif,
"RU" : @if(array_key_exists('Russia',$nbr_ncp_country)) {{$nbr_ncp_country['Russia']}} @else {{'0'}} @endif,
"RW" : @if(array_key_exists('Rwanda',$nbr_ncp_country)) {{$nbr_ncp_country['Rwanda']}} @else {{'0'}} @endif,
"RS" : @if(array_key_exists('Serbia',$nbr_ncp_country)) {{$nbr_ncp_country['Serbia']}} @else {{'0'}} @endif,
"TL" : @if(array_key_exists('Timor-Leste',$nbr_ncp_country)) {{$nbr_ncp_country['Timor-Leste']}} @else {{'0'}} @endif,
"TM" : @if(array_key_exists('Turkmenistan',$nbr_ncp_country)) {{$nbr_ncp_country['Turkmenistan']}} @else {{'0'}} @endif,
"TJ" : @if(array_key_exists('Tajikistan',$nbr_ncp_country)) {{$nbr_ncp_country['Tajikistan']}} @else {{'0'}} @endif,
"RO" : @if(array_key_exists('Romania',$nbr_ncp_country)) {{$nbr_ncp_country['Romania']}} @else {{'0'}} @endif,
"GW" : @if(array_key_exists('Guinea-Bissau',$nbr_ncp_country)) {{$nbr_ncp_country['Guinea-Bissau']}} @else {{'0'}} @endif,
"GT" : @if(array_key_exists('Guatemala',$nbr_ncp_country)) {{$nbr_ncp_country['Guatemala']}} @else {{'0'}} @endif,
"GR" : @if(array_key_exists('Greece',$nbr_ncp_country)) {{$nbr_ncp_country['Greece']}} @else {{'0'}} @endif,
"GQ" : @if(array_key_exists('Eq. Guinea',$nbr_ncp_country)) {{$nbr_ncp_country['Eq. Guinea']}} @else {{'0'}} @endif,
"GY" : @if(array_key_exists('Guyana',$nbr_ncp_country)) {{$nbr_ncp_country['Guyana']}} @else {{'0'}} @endif,
"GE" : @if(array_key_exists('Georgia',$nbr_ncp_country)) {{$nbr_ncp_country['Georgia']}} @else {{'0'}} @endif,
"GB" : @if(array_key_exists('United Kingdom',$nbr_ncp_country)) {{$nbr_ncp_country['United Kingdom']}} @else {{'0'}} @endif,
"GA" : @if(array_key_exists('Gabon',$nbr_ncp_country)) {{$nbr_ncp_country['Gabon']}} @else {{'0'}} @endif,
"GN" : @if(array_key_exists('Guinea',$nbr_ncp_country)) {{$nbr_ncp_country['Guinea']}} @else {{'0'}} @endif,
"GM" : @if(array_key_exists('Gambia',$nbr_ncp_country)) {{$nbr_ncp_country['Gambia']}} @else {{'0'}} @endif,
"GL" : @if(array_key_exists('Greenland',$nbr_ncp_country)) {{$nbr_ncp_country['Greenland']}} @else {{'0'}} @endif,
"GH" : @if(array_key_exists('Ghana',$nbr_ncp_country)) {{$nbr_ncp_country['Ghana']}} @else {{'0'}} @endif,
"OM" : @if(array_key_exists('Oman',$nbr_ncp_country)) {{$nbr_ncp_country['Oman']}} @else {{'0'}} @endif,
"TN" : @if(array_key_exists('Tunisia',$nbr_ncp_country)) {{$nbr_ncp_country['Tunisia']}} @else {{'0'}} @endif,
"JO" : @if(array_key_exists('Jordan',$nbr_ncp_country)) {{$nbr_ncp_country['Jordan']}} @else {{'0'}} @endif,
"HR" : @if(array_key_exists('Croatia',$nbr_ncp_country)) {{$nbr_ncp_country['Croatia']}} @else {{'0'}} @endif,
"HT" : @if(array_key_exists('Haiti',$nbr_ncp_country)) {{$nbr_ncp_country['Haiti']}} @else {{'0'}} @endif,
"HU" : @if(array_key_exists('Hungary',$nbr_ncp_country)) {{$nbr_ncp_country['Hungary']}} @else {{'0'}} @endif,
"HN" : @if(array_key_exists('Honduras',$nbr_ncp_country)) {{$nbr_ncp_country['Honduras']}} @else {{'0'}} @endif,
"PR" : @if(array_key_exists('Puerto Rico',$nbr_ncp_country)) {{$nbr_ncp_country['Puerto Rico']}} @else {{'0'}} @endif,
"PS" : @if(array_key_exists('Palestine',$nbr_ncp_country)) {{$nbr_ncp_country['Palestine']}} @else {{'0'}} @endif,
"PT" : @if(array_key_exists('Portugal',$nbr_ncp_country)) {{$nbr_ncp_country['Portugal']}} @else {{'0'}} @endif,
"PY" : @if(array_key_exists('Paraguay',$nbr_ncp_country)) {{$nbr_ncp_country['Paraguay']}} @else {{'0'}} @endif,
"PA" : @if(array_key_exists('Panama',$nbr_ncp_country)) {{$nbr_ncp_country['Panama']}} @else {{'0'}} @endif,
"PG" : @if(array_key_exists('Papua New Guinea',$nbr_ncp_country)) {{$nbr_ncp_country['Papua New Guinea']}} @else {{'0'}} @endif,
"PE" : @if(array_key_exists('Peru',$nbr_ncp_country)) {{$nbr_ncp_country['Peru']}} @else {{'0'}} @endif,
"PK" : @if(array_key_exists('Pakistan',$nbr_ncp_country)) {{$nbr_ncp_country['Pakistan']}} @else {{'0'}} @endif,
"PH" : @if(array_key_exists('Philippines',$nbr_ncp_country)) {{$nbr_ncp_country['Philippines']}} @else {{'0'}} @endif,
"PL" : @if(array_key_exists('Poland',$nbr_ncp_country)) {{$nbr_ncp_country['Poland']}} @else {{'0'}} @endif,
"ZM" : @if(array_key_exists('Zambia',$nbr_ncp_country)) {{$nbr_ncp_country['Zambia']}} @else {{'0'}} @endif,
"EH" : @if(array_key_exists('W. Sahara',$nbr_ncp_country)) {{$nbr_ncp_country['W. Sahara']}} @else {{'0'}} @endif,
"EE" : @if(array_key_exists('Estonia',$nbr_ncp_country)) {{$nbr_ncp_country['Estonia']}} @else {{'0'}} @endif,
"EG" : @if(array_key_exists('Egypt',$nbr_ncp_country)) {{$nbr_ncp_country['Egypt']}} @else {{'0'}} @endif,
"ZA" : @if(array_key_exists('South Africa',$nbr_ncp_country)) {{$nbr_ncp_country['South Africa']}} @else {{'0'}} @endif,
"EC" : @if(array_key_exists('Ecuador',$nbr_ncp_country)) {{$nbr_ncp_country['Ecuador']}} @else {{'0'}} @endif,
"IT" : @if(array_key_exists('Italy',$nbr_ncp_country)) {{$nbr_ncp_country['Italy']}} @else {{'0'}} @endif,
"VN" : @if(array_key_exists('Vietnam',$nbr_ncp_country)) {{$nbr_ncp_country['Vietnam']}} @else {{'0'}} @endif,
"SB" : @if(array_key_exists('Solomon Is.',$nbr_ncp_country)) {{$nbr_ncp_country['Solomon Is.']}} @else {{'0'}} @endif,
"ET" : @if(array_key_exists('Ethiopia',$nbr_ncp_country)) {{$nbr_ncp_country['Ethiopia']}} @else {{'0'}} @endif,
"SO" : @if(array_key_exists('Somalia',$nbr_ncp_country)) {{$nbr_ncp_country['Somalia']}} @else {{'0'}} @endif,
"ZW" : @if(array_key_exists('Zimbabwe',$nbr_ncp_country)) {{$nbr_ncp_country['Zimbabwe']}} @else {{'0'}} @endif,
"ES" : @if(array_key_exists('Spain',$nbr_ncp_country)) {{$nbr_ncp_country['Spain']}} @else {{'0'}} @endif,
"ER" : @if(array_key_exists('Eritrea',$nbr_ncp_country)) {{$nbr_ncp_country['Eritrea']}} @else {{'0'}} @endif,
"ME" : @if(array_key_exists('Montenegro',$nbr_ncp_country)) {{$nbr_ncp_country['Montenegro']}} @else {{'0'}} @endif,
"MD" : @if(array_key_exists('Moldova',$nbr_ncp_country)) {{$nbr_ncp_country['Moldova']}} @else {{'0'}} @endif,
"MG" : @if(array_key_exists('Madagascar',$nbr_ncp_country)) {{$nbr_ncp_country['Madagascar']}} @else {{'0'}} @endif,
"MA" : @if(array_key_exists('Morocco',$nbr_ncp_country)) {{$nbr_ncp_country['Morocco']}} @else {{'0'}} @endif,
"UZ" : @if(array_key_exists('Uzbekistan',$nbr_ncp_country)) {{$nbr_ncp_country['Uzbekistan']}} @else {{'0'}} @endif,
"MM" : @if(array_key_exists('Myanmar',$nbr_ncp_country)) {{$nbr_ncp_country['Myanmar']}} @else {{'0'}} @endif,
"ML" : @if(array_key_exists('Mali',$nbr_ncp_country)) {{$nbr_ncp_country['Mali']}} @else {{'0'}} @endif,
"MN" : @if(array_key_exists('Mongolia',$nbr_ncp_country)) {{$nbr_ncp_country['Mongolia']}} @else {{'0'}} @endif,
"MK" : @if(array_key_exists('Macedonia',$nbr_ncp_country)) {{$nbr_ncp_country['Macedonia']}} @else {{'0'}} @endif,
"MW" : @if(array_key_exists('Malawi',$nbr_ncp_country)) {{$nbr_ncp_country['Malawi']}} @else {{'0'}} @endif,
"MR" : @if(array_key_exists('Mauritania',$nbr_ncp_country)) {{$nbr_ncp_country['Mauritania']}} @else {{'0'}} @endif,
"UG" : @if(array_key_exists('Uganda',$nbr_ncp_country)) {{$nbr_ncp_country['Uganda']}} @else {{'0'}} @endif,
"MY" : @if(array_key_exists('Malaysia',$nbr_ncp_country)) {{$nbr_ncp_country['Malaysia']}} @else {{'0'}} @endif,
"MX" : @if(array_key_exists('Mexico',$nbr_ncp_country)) {{$nbr_ncp_country['Mexico']}} @else {{'0'}} @endif,
"IL" : @if(array_key_exists('Israel',$nbr_ncp_country)) {{$nbr_ncp_country['Israel']}} @else {{'0'}} @endif,
"FR" : @if(array_key_exists('France',$nbr_ncp_country)) {{$nbr_ncp_country['France']}} @else {{'0'}} @endif,
"XS" : @if(array_key_exists('Somaliland',$nbr_ncp_country)) {{$nbr_ncp_country['Somaliland']}} @else {{'0'}} @endif,
"FI" : @if(array_key_exists('Finland',$nbr_ncp_country)) {{$nbr_ncp_country['Finland']}} @else {{'0'}} @endif,
"FJ" : @if(array_key_exists('Fiji',$nbr_ncp_country)) {{$nbr_ncp_country['Fiji']}} @else {{'0'}} @endif,
"FK" : @if(array_key_exists('Falkland Is.',$nbr_ncp_country)) {{$nbr_ncp_country['Falkland Is.']}} @else {{'0'}} @endif,
"NI" : @if(array_key_exists('Nicaragua',$nbr_ncp_country)) {{$nbr_ncp_country['Nicaragua']}} @else {{'0'}} @endif,
"NL" : @if(array_key_exists('Netherlands',$nbr_ncp_country)) {{$nbr_ncp_country['Netherlands']}} @else {{'0'}} @endif,
"NO" : @if(array_key_exists('Norway',$nbr_ncp_country)) {{$nbr_ncp_country['Norway']}} @else {{'0'}} @endif,
"NA" : @if(array_key_exists('Namibia',$nbr_ncp_country)) {{$nbr_ncp_country['Namibia']}} @else {{'0'}} @endif,
"VU" : @if(array_key_exists('Vanuatu',$nbr_ncp_country)) {{$nbr_ncp_country['Vanuatu']}} @else {{'0'}} @endif,
"NC" : @if(array_key_exists('New Caledonia',$nbr_ncp_country)) {{$nbr_ncp_country['New Caledonia']}} @else {{'0'}} @endif,
"NE" : @if(array_key_exists('Niger',$nbr_ncp_country)) {{$nbr_ncp_country['Niger']}} @else {{'0'}} @endif,
"NG" : @if(array_key_exists('Nigeria',$nbr_ncp_country)) {{$nbr_ncp_country['Nigeria']}} @else {{'0'}} @endif,
"NZ" : @if(array_key_exists('New Zealand',$nbr_ncp_country)) {{$nbr_ncp_country['New Zealand']}} @else {{'0'}} @endif,
"NP" : @if(array_key_exists('Nepal',$nbr_ncp_country)) {{$nbr_ncp_country['Nepal']}} @else {{'0'}} @endif,
"XK" : @if(array_key_exists('Kosovo',$nbr_ncp_country)) {{$nbr_ncp_country['Kosovo']}} @else {{'0'}} @endif,
"CI" : @if(array_key_exists('Côte d\'Ivoire',$nbr_ncp_country)) {{$nbr_ncp_country['Côte d\'Ivoire']}} @else {{'0'}} @endif,
"CH" : @if(array_key_exists('Switzerland',$nbr_ncp_country)) {{$nbr_ncp_country['Switzerland']}} @else {{'0'}} @endif,
"CO" : @if(array_key_exists('Colombia',$nbr_ncp_country)) {{$nbr_ncp_country['Colombia']}} @else {{'0'}} @endif,
"CN" : @if(array_key_exists('China',$nbr_ncp_country)) {{$nbr_ncp_country['China']}} @else {{'0'}} @endif,
"CM" : @if(array_key_exists('Cameroon',$nbr_ncp_country)) {{$nbr_ncp_country['Cameroon']}} @else {{'0'}} @endif,
"CL" : @if(array_key_exists('Chile',$nbr_ncp_country)) {{$nbr_ncp_country['Chile']}} @else {{'0'}} @endif,
"XC" : @if(array_key_exists('N. Cyprus',$nbr_ncp_country)) {{$nbr_ncp_country['N. Cyprus']}} @else {{'0'}} @endif,
"CA" : @if(array_key_exists('Canada',$nbr_ncp_country)) {{$nbr_ncp_country['Canada']}} @else {{'0'}} @endif,
"CG" : @if(array_key_exists('Congo',$nbr_ncp_country)) {{$nbr_ncp_country['Congo']}} @else {{'0'}} @endif,
"CF" : @if(array_key_exists('Central African Rep.',$nbr_ncp_country)) {{$nbr_ncp_country['Central African Rep.']}} @else {{'0'}} @endif,
"CD" : @if(array_key_exists('Dem. Rep. Congo',$nbr_ncp_country)) {{$nbr_ncp_country['Dem. Rep. Congo']}} @else {{'0'}} @endif,
"CZ" : @if(array_key_exists('Czech Rep.',$nbr_ncp_country)) {{$nbr_ncp_country['Czech Rep.']}} @else {{'0'}} @endif,
"CY" : @if(array_key_exists('Cyprus',$nbr_ncp_country)) {{$nbr_ncp_country['Cyprus']}} @else {{'0'}} @endif,
"CR" : @if(array_key_exists('Costa Rica',$nbr_ncp_country)) {{$nbr_ncp_country['Costa Rica']}} @else {{'0'}} @endif,
"CU" : @if(array_key_exists('Cuba',$nbr_ncp_country)) {{$nbr_ncp_country['Cuba']}} @else {{'0'}} @endif,
"SZ" : @if(array_key_exists('Swaziland',$nbr_ncp_country)) {{$nbr_ncp_country['Swaziland']}} @else {{'0'}} @endif,
"SY" : @if(array_key_exists('Syria',$nbr_ncp_country)) {{$nbr_ncp_country['Syria']}} @else {{'0'}} @endif,
"KG" : @if(array_key_exists('Kyrgyzstan',$nbr_ncp_country)) {{$nbr_ncp_country['Kyrgyzstan']}} @else {{'0'}} @endif,
"KE" : @if(array_key_exists('Kenya',$nbr_ncp_country)) {{$nbr_ncp_country['Kenya']}} @else {{'0'}} @endif,
"SS" : @if(array_key_exists('S. Sudan',$nbr_ncp_country)) {{$nbr_ncp_country['S. Sudan']}} @else {{'0'}} @endif,
"SR" : @if(array_key_exists('Suriname',$nbr_ncp_country)) {{$nbr_ncp_country['Suriname']}} @else {{'0'}} @endif,
"KH" : @if(array_key_exists('Cambodia',$nbr_ncp_country)) {{$nbr_ncp_country['Cambodia']}} @else {{'0'}} @endif,
"SV" : @if(array_key_exists('El Salvador',$nbr_ncp_country)) {{$nbr_ncp_country['El Salvador']}} @else {{'0'}} @endif,
"SK" : @if(array_key_exists('Slovakia',$nbr_ncp_country)) {{$nbr_ncp_country['Slovakia']}} @else {{'0'}} @endif,
"KR" : @if(array_key_exists('Korea',$nbr_ncp_country)) {{$nbr_ncp_country['Korea']}} @else {{'0'}} @endif,
"SI" : @if(array_key_exists('Slovenia',$nbr_ncp_country)) {{$nbr_ncp_country['Slovenia']}} @else {{'0'}} @endif,
"KP" : @if(array_key_exists('Dem. Rep. Korea',$nbr_ncp_country)) {{$nbr_ncp_country['Dem. Rep. Korea']}} @else {{'0'}} @endif,
"KW" : @if(array_key_exists('Kuwait',$nbr_ncp_country)) {{$nbr_ncp_country['Kuwait']}} @else {{'0'}} @endif,
"SN" : @if(array_key_exists('Senegal',$nbr_ncp_country)) {{$nbr_ncp_country['Senegal']}} @else {{'0'}} @endif,
"SL" : @if(array_key_exists('Sierra Leone',$nbr_ncp_country)) {{$nbr_ncp_country['Sierra Leone']}} @else {{'0'}} @endif,
"KZ" : @if(array_key_exists('Kazakhstan',$nbr_ncp_country)) {{$nbr_ncp_country['Kazakhstan']}} @else {{'0'}} @endif,
"SA" : @if(array_key_exists('Saudi Arabia',$nbr_ncp_country)) {{$nbr_ncp_country['Saudi Arabia']}} @else {{'0'}} @endif,
"SE" : @if(array_key_exists('Sweden',$nbr_ncp_country)) {{$nbr_ncp_country['Sweden']}} @else {{'0'}} @endif,
"SD" : @if(array_key_exists('Sudan',$nbr_ncp_country)) {{$nbr_ncp_country['Sudan']}} @else {{'0'}} @endif,
"DO" : @if(array_key_exists('Dominican Rep.',$nbr_ncp_country)) {{$nbr_ncp_country['Dominican Rep.']}} @else {{'0'}} @endif,
"DJ" : @if(array_key_exists('Djibouti',$nbr_ncp_country)) {{$nbr_ncp_country['Djibouti']}} @else {{'0'}} @endif,
"DK" : @if(array_key_exists('Denmark',$nbr_ncp_country)) {{$nbr_ncp_country['Denmark']}} @else {{'0'}} @endif,
"DE" : @if(array_key_exists('Germany',$nbr_ncp_country)) {{$nbr_ncp_country['Germany']}} @else {{'0'}} @endif,
"YE" : @if(array_key_exists('Yemen',$nbr_ncp_country)) {{$nbr_ncp_country['Yemen']}} @else {{'0'}} @endif,
"DZ" : @if(array_key_exists('Algeria',$nbr_ncp_country)) {{$nbr_ncp_country['Algeria']}} @else {{'0'}} @endif,
"US" : @if(array_key_exists('United States',$nbr_ncp_country)) {{$nbr_ncp_country['United States']}} @else {{'0'}} @endif,
"UY" : @if(array_key_exists('Uruguay',$nbr_ncp_country)) {{$nbr_ncp_country['Uruguay']}} @else {{'0'}} @endif,
"LB" : @if(array_key_exists('Lebanon',$nbr_ncp_country)) {{$nbr_ncp_country['Lebanon']}} @else {{'0'}} @endif,
"TW" : @if(array_key_exists('Taiwan',$nbr_ncp_country)) {{$nbr_ncp_country['Taiwan']}} @else {{'0'}} @endif,
"TT" : @if(array_key_exists('Trinidad and Tobago',$nbr_ncp_country)) {{$nbr_ncp_country['Trinidad and Tobago']}} @else {{'0'}} @endif,
"TR" : @if(array_key_exists('Turkey',$nbr_ncp_country)) {{$nbr_ncp_country['Turkey']}} @else {{'0'}} @endif,
"LK" : @if(array_key_exists('Sri Lanka',$nbr_ncp_country)) {{$nbr_ncp_country['Sri Lanka']}} @else {{'0'}} @endif,
"LV" : @if(array_key_exists('Latvia',$nbr_ncp_country)) {{$nbr_ncp_country['Latvia']}} @else {{'0'}} @endif,
"LT" : @if(array_key_exists('Lithuania',$nbr_ncp_country)) {{$nbr_ncp_country['Lithuania']}} @else {{'0'}} @endif,
"LU" : @if(array_key_exists('Luxembourg',$nbr_ncp_country)) {{$nbr_ncp_country['Luxembourg']}} @else {{'0'}} @endif,
"LR" : @if(array_key_exists('Liberia',$nbr_ncp_country)) {{$nbr_ncp_country['Liberia']}} @else {{'0'}} @endif,
"LS" : @if(array_key_exists('Lesotho',$nbr_ncp_country)) {{$nbr_ncp_country['Lesotho']}} @else {{'0'}} @endif,
"TH" : @if(array_key_exists('Thailand',$nbr_ncp_country)) {{$nbr_ncp_country['Thailand']}} @else {{'0'}} @endif,
"TF" : @if(array_key_exists('Fr. S. Antarctic Lands',$nbr_ncp_country)) {{$nbr_ncp_country['Fr. S. Antarctic Lands']}} @else {{'0'}} @endif,
"TG" : @if(array_key_exists('Togo',$nbr_ncp_country)) {{$nbr_ncp_country['Togo']}} @else {{'0'}} @endif,
"TD" : @if(array_key_exists('Chad',$nbr_ncp_country)) {{$nbr_ncp_country['Chad']}} @else {{'0'}} @endif,
"LY" : @if(array_key_exists('Libya',$nbr_ncp_country)) {{$nbr_ncp_country['Libya']}} @else {{'0'}} @endif,
"AE" : @if(array_key_exists('United Arab Emirates',$nbr_ncp_country)) {{$nbr_ncp_country['United Arab Emirates']}} @else {{'0'}} @endif,
"VE" : @if(array_key_exists('Venezuela',$nbr_ncp_country)) {{$nbr_ncp_country['Venezuela']}} @else {{'0'}} @endif,
"AF" : @if(array_key_exists('Afghanistan',$nbr_ncp_country)) {{$nbr_ncp_country['Afghanistan']}} @else {{'0'}} @endif,
"IQ" : @if(array_key_exists('Iraq',$nbr_ncp_country)) {{$nbr_ncp_country['Iraq']}} @else {{'0'}} @endif,
"IS" : @if(array_key_exists('Iceland',$nbr_ncp_country)) {{$nbr_ncp_country['Iceland']}} @else {{'0'}} @endif,
"IR" : @if(array_key_exists('Iran',$nbr_ncp_country)) {{$nbr_ncp_country['Iran']}} @else {{'0'}} @endif,
"AM" : @if(array_key_exists('Armenia',$nbr_ncp_country)) {{$nbr_ncp_country['Armenia']}} @else {{'0'}} @endif,
"AL" : @if(array_key_exists('Albania',$nbr_ncp_country)) {{$nbr_ncp_country['Albania']}} @else {{'0'}} @endif,
"AO" : @if(array_key_exists('Angola',$nbr_ncp_country)) {{$nbr_ncp_country['Angola']}} @else {{'0'}} @endif,
"AR" : @if(array_key_exists('Argentina',$nbr_ncp_country)) {{$nbr_ncp_country['Argentina']}} @else {{'0'}} @endif,
"AU" : @if(array_key_exists('Australia',$nbr_ncp_country)) {{$nbr_ncp_country['Australia']}} @else {{'0'}} @endif,
"AT" : @if(array_key_exists('Austria',$nbr_ncp_country)) {{$nbr_ncp_country['Austria']}} @else {{'0'}} @endif,
"IN" : @if(array_key_exists('India',$nbr_ncp_country)) {{$nbr_ncp_country['India']}} @else {{'0'}} @endif,
"TZ" : @if(array_key_exists('Tanzania',$nbr_ncp_country)) {{$nbr_ncp_country['Tanzania']}} @else {{'0'}} @endif,
"AZ" : @if(array_key_exists('Azerbaijan',$nbr_ncp_country)) {{$nbr_ncp_country['Azerbaijan']}} @else {{'0'}} @endif,
"IE" : @if(array_key_exists('Ireland',$nbr_ncp_country)) {{$nbr_ncp_country['Ireland']}} @else {{'0'}} @endif,
"ID" : @if(array_key_exists('Indonesia',$nbr_ncp_country)) {{$nbr_ncp_country['Indonesia']}} @else {{'0'}} @endif,
"UA" : @if(array_key_exists('Ukraine',$nbr_ncp_country)) {{$nbr_ncp_country['Ukraine']}} @else {{'0'}} @endif,
"QA" : @if(array_key_exists('Qatar',$nbr_ncp_country)) {{$nbr_ncp_country['Qatar']}} @else {{'0'}} @endif,
"MZ" : @if(array_key_exists('Mozambique',$nbr_ncp_country)) {{$nbr_ncp_country['Mozambique']}} @else {{'0'}} @endif,
  }
}]
},
onRegionClick: function (event, code) {
var name = maps.mapData.paths[code].name;
alert(name);
},
});
});

$(function(){
var maps = new jvm.Map({
map: 'world_mill_en',
container: $('#map_uv'),
regionLabelStyle: {
  initial: {
    fill: '#B90E32'
  },
  hover: {
    fill: 'black'
  }
},
series: {
regions: [{
  scale: ['#ffc107', '#dc3545'],
  normalizeFunction: 'polynomial',


  values: {
"BD" : @if(array_key_exists('Bangladesh',$nbr_uv_country)) {{$nbr_uv_country['Bangladesh']}} @else {{'0'}} @endif,
"BE" : @if(array_key_exists('Belgium',$nbr_uv_country)) {{$nbr_uv_country['Belgium']}} @else {{'0'}} @endif,
"BF" : @if(array_key_exists('Burkina Faso',$nbr_uv_country)) {{$nbr_uv_country['Burkina Faso']}} @else {{'0'}} @endif,
"BG" : @if(array_key_exists('Bulgaria',$nbr_uv_country)) {{$nbr_uv_country['Bulgaria']}} @else {{'0'}} @endif,
"BA" : @if(array_key_exists('Bosnia and Herz.',$nbr_uv_country)) {{$nbr_uv_country['Bosnia and Herz.']}} @else {{'0'}} @endif,
"BN" : @if(array_key_exists('Brunei',$nbr_uv_country)) {{$nbr_uv_country['Brunei']}} @else {{'0'}} @endif,
"BO" : @if(array_key_exists('Bolivia',$nbr_uv_country)) {{$nbr_uv_country['Bolivia']}} @else {{'0'}} @endif,
"JP" : @if(array_key_exists('Japan',$nbr_uv_country)) {{$nbr_uv_country['Japan']}} @else {{'0'}} @endif,
"BI" : @if(array_key_exists('Burundi',$nbr_uv_country)) {{$nbr_uv_country['Burundi']}} @else {{'0'}} @endif,
"BJ" : @if(array_key_exists('Benin',$nbr_uv_country)) {{$nbr_uv_country['Benin']}} @else {{'0'}} @endif,
"BT" : @if(array_key_exists('Bhutan',$nbr_uv_country)) {{$nbr_uv_country['Bhutan']}} @else {{'0'}} @endif,
"JM" : @if(array_key_exists('Jamaica',$nbr_uv_country)) {{$nbr_uv_country['Jamaica']}} @else {{'0'}} @endif,
"BW" : @if(array_key_exists('Botswana',$nbr_uv_country)) {{$nbr_uv_country['Botswana']}} @else {{'0'}} @endif,
"BR" : @if(array_key_exists('Brazil',$nbr_uv_country)) {{$nbr_uv_country['Brazil']}} @else {{'0'}} @endif,
"BS" : @if(array_key_exists('Bahamas',$nbr_uv_country)) {{$nbr_uv_country['Bahamas']}} @else {{'0'}} @endif,
"BY" : @if(array_key_exists('Belarus',$nbr_uv_country)) {{$nbr_uv_country['Belarus']}} @else {{'0'}} @endif,
"BZ" : @if(array_key_exists('Belize',$nbr_uv_country)) {{$nbr_uv_country['Belize']}} @else {{'0'}} @endif,
"RU" : @if(array_key_exists('Russia',$nbr_uv_country)) {{$nbr_uv_country['Russia']}} @else {{'0'}} @endif,
"RW" : @if(array_key_exists('Rwanda',$nbr_uv_country)) {{$nbr_uv_country['Rwanda']}} @else {{'0'}} @endif,
"RS" : @if(array_key_exists('Serbia',$nbr_uv_country)) {{$nbr_uv_country['Serbia']}} @else {{'0'}} @endif,
"TL" : @if(array_key_exists('Timor-Leste',$nbr_uv_country)) {{$nbr_uv_country['Timor-Leste']}} @else {{'0'}} @endif,
"TM" : @if(array_key_exists('Turkmenistan',$nbr_uv_country)) {{$nbr_uv_country['Turkmenistan']}} @else {{'0'}} @endif,
"TJ" : @if(array_key_exists('Tajikistan',$nbr_uv_country)) {{$nbr_uv_country['Tajikistan']}} @else {{'0'}} @endif,
"RO" : @if(array_key_exists('Romania',$nbr_uv_country)) {{$nbr_uv_country['Romania']}} @else {{'0'}} @endif,
"GW" : @if(array_key_exists('Guinea-Bissau',$nbr_uv_country)) {{$nbr_uv_country['Guinea-Bissau']}} @else {{'0'}} @endif,
"GT" : @if(array_key_exists('Guatemala',$nbr_uv_country)) {{$nbr_uv_country['Guatemala']}} @else {{'0'}} @endif,
"GR" : @if(array_key_exists('Greece',$nbr_uv_country)) {{$nbr_uv_country['Greece']}} @else {{'0'}} @endif,
"GQ" : @if(array_key_exists('Eq. Guinea',$nbr_uv_country)) {{$nbr_uv_country['Eq. Guinea']}} @else {{'0'}} @endif,
"GY" : @if(array_key_exists('Guyana',$nbr_uv_country)) {{$nbr_uv_country['Guyana']}} @else {{'0'}} @endif,
"GE" : @if(array_key_exists('Georgia',$nbr_uv_country)) {{$nbr_uv_country['Georgia']}} @else {{'0'}} @endif,
"GB" : @if(array_key_exists('United Kingdom',$nbr_uv_country)) {{$nbr_uv_country['United Kingdom']}} @else {{'0'}} @endif,
"GA" : @if(array_key_exists('Gabon',$nbr_uv_country)) {{$nbr_uv_country['Gabon']}} @else {{'0'}} @endif,
"GN" : @if(array_key_exists('Guinea',$nbr_uv_country)) {{$nbr_uv_country['Guinea']}} @else {{'0'}} @endif,
"GM" : @if(array_key_exists('Gambia',$nbr_uv_country)) {{$nbr_uv_country['Gambia']}} @else {{'0'}} @endif,
"GL" : @if(array_key_exists('Greenland',$nbr_uv_country)) {{$nbr_uv_country['Greenland']}} @else {{'0'}} @endif,
"GH" : @if(array_key_exists('Ghana',$nbr_uv_country)) {{$nbr_uv_country['Ghana']}} @else {{'0'}} @endif,
"OM" : @if(array_key_exists('Oman',$nbr_uv_country)) {{$nbr_uv_country['Oman']}} @else {{'0'}} @endif,
"TN" : @if(array_key_exists('Tunisia',$nbr_uv_country)) {{$nbr_uv_country['Tunisia']}} @else {{'0'}} @endif,
"JO" : @if(array_key_exists('Jordan',$nbr_uv_country)) {{$nbr_uv_country['Jordan']}} @else {{'0'}} @endif,
"HR" : @if(array_key_exists('Croatia',$nbr_uv_country)) {{$nbr_uv_country['Croatia']}} @else {{'0'}} @endif,
"HT" : @if(array_key_exists('Haiti',$nbr_uv_country)) {{$nbr_uv_country['Haiti']}} @else {{'0'}} @endif,
"HU" : @if(array_key_exists('Hungary',$nbr_uv_country)) {{$nbr_uv_country['Hungary']}} @else {{'0'}} @endif,
"HN" : @if(array_key_exists('Honduras',$nbr_uv_country)) {{$nbr_uv_country['Honduras']}} @else {{'0'}} @endif,
"PR" : @if(array_key_exists('Puerto Rico',$nbr_uv_country)) {{$nbr_uv_country['Puerto Rico']}} @else {{'0'}} @endif,
"PS" : @if(array_key_exists('Palestine',$nbr_uv_country)) {{$nbr_uv_country['Palestine']}} @else {{'0'}} @endif,
"PT" : @if(array_key_exists('Portugal',$nbr_uv_country)) {{$nbr_uv_country['Portugal']}} @else {{'0'}} @endif,
"PY" : @if(array_key_exists('Paraguay',$nbr_uv_country)) {{$nbr_uv_country['Paraguay']}} @else {{'0'}} @endif,
"PA" : @if(array_key_exists('Panama',$nbr_uv_country)) {{$nbr_uv_country['Panama']}} @else {{'0'}} @endif,
"PG" : @if(array_key_exists('Papua New Guinea',$nbr_uv_country)) {{$nbr_uv_country['Papua New Guinea']}} @else {{'0'}} @endif,
"PE" : @if(array_key_exists('Peru',$nbr_uv_country)) {{$nbr_uv_country['Peru']}} @else {{'0'}} @endif,
"PK" : @if(array_key_exists('Pakistan',$nbr_uv_country)) {{$nbr_uv_country['Pakistan']}} @else {{'0'}} @endif,
"PH" : @if(array_key_exists('Philippines',$nbr_uv_country)) {{$nbr_uv_country['Philippines']}} @else {{'0'}} @endif,
"PL" : @if(array_key_exists('Poland',$nbr_uv_country)) {{$nbr_uv_country['Poland']}} @else {{'0'}} @endif,
"ZM" : @if(array_key_exists('Zambia',$nbr_uv_country)) {{$nbr_uv_country['Zambia']}} @else {{'0'}} @endif,
"EH" : @if(array_key_exists('W. Sahara',$nbr_uv_country)) {{$nbr_uv_country['W. Sahara']}} @else {{'0'}} @endif,
"EE" : @if(array_key_exists('Estonia',$nbr_uv_country)) {{$nbr_uv_country['Estonia']}} @else {{'0'}} @endif,
"EG" : @if(array_key_exists('Egypt',$nbr_uv_country)) {{$nbr_uv_country['Egypt']}} @else {{'0'}} @endif,
"ZA" : @if(array_key_exists('South Africa',$nbr_uv_country)) {{$nbr_uv_country['South Africa']}} @else {{'0'}} @endif,
"EC" : @if(array_key_exists('Ecuador',$nbr_uv_country)) {{$nbr_uv_country['Ecuador']}} @else {{'0'}} @endif,
"IT" : @if(array_key_exists('Italy',$nbr_uv_country)) {{$nbr_uv_country['Italy']}} @else {{'0'}} @endif,
"VN" : @if(array_key_exists('Vietnam',$nbr_uv_country)) {{$nbr_uv_country['Vietnam']}} @else {{'0'}} @endif,
"SB" : @if(array_key_exists('Solomon Is.',$nbr_uv_country)) {{$nbr_uv_country['Solomon Is.']}} @else {{'0'}} @endif,
"ET" : @if(array_key_exists('Ethiopia',$nbr_uv_country)) {{$nbr_uv_country['Ethiopia']}} @else {{'0'}} @endif,
"SO" : @if(array_key_exists('Somalia',$nbr_uv_country)) {{$nbr_uv_country['Somalia']}} @else {{'0'}} @endif,
"ZW" : @if(array_key_exists('Zimbabwe',$nbr_uv_country)) {{$nbr_uv_country['Zimbabwe']}} @else {{'0'}} @endif,
"ES" : @if(array_key_exists('Spain',$nbr_uv_country)) {{$nbr_uv_country['Spain']}} @else {{'0'}} @endif,
"ER" : @if(array_key_exists('Eritrea',$nbr_uv_country)) {{$nbr_uv_country['Eritrea']}} @else {{'0'}} @endif,
"ME" : @if(array_key_exists('Montenegro',$nbr_uv_country)) {{$nbr_uv_country['Montenegro']}} @else {{'0'}} @endif,
"MD" : @if(array_key_exists('Moldova',$nbr_uv_country)) {{$nbr_uv_country['Moldova']}} @else {{'0'}} @endif,
"MG" : @if(array_key_exists('Madagascar',$nbr_uv_country)) {{$nbr_uv_country['Madagascar']}} @else {{'0'}} @endif,
"MA" : @if(array_key_exists('Morocco',$nbr_uv_country)) {{$nbr_uv_country['Morocco']}} @else {{'0'}} @endif,
"UZ" : @if(array_key_exists('Uzbekistan',$nbr_uv_country)) {{$nbr_uv_country['Uzbekistan']}} @else {{'0'}} @endif,
"MM" : @if(array_key_exists('Myanmar',$nbr_uv_country)) {{$nbr_uv_country['Myanmar']}} @else {{'0'}} @endif,
"ML" : @if(array_key_exists('Mali',$nbr_uv_country)) {{$nbr_uv_country['Mali']}} @else {{'0'}} @endif,
"MN" : @if(array_key_exists('Mongolia',$nbr_uv_country)) {{$nbr_uv_country['Mongolia']}} @else {{'0'}} @endif,
"MK" : @if(array_key_exists('Macedonia',$nbr_uv_country)) {{$nbr_uv_country['Macedonia']}} @else {{'0'}} @endif,
"MW" : @if(array_key_exists('Malawi',$nbr_uv_country)) {{$nbr_uv_country['Malawi']}} @else {{'0'}} @endif,
"MR" : @if(array_key_exists('Mauritania',$nbr_uv_country)) {{$nbr_uv_country['Mauritania']}} @else {{'0'}} @endif,
"UG" : @if(array_key_exists('Uganda',$nbr_uv_country)) {{$nbr_uv_country['Uganda']}} @else {{'0'}} @endif,
"MY" : @if(array_key_exists('Malaysia',$nbr_uv_country)) {{$nbr_uv_country['Malaysia']}} @else {{'0'}} @endif,
"MX" : @if(array_key_exists('Mexico',$nbr_uv_country)) {{$nbr_uv_country['Mexico']}} @else {{'0'}} @endif,
"IL" : @if(array_key_exists('Israel',$nbr_uv_country)) {{$nbr_uv_country['Israel']}} @else {{'0'}} @endif,
"FR" : @if(array_key_exists('France',$nbr_uv_country)) {{$nbr_uv_country['France']}} @else {{'0'}} @endif,
"XS" : @if(array_key_exists('Somaliland',$nbr_uv_country)) {{$nbr_uv_country['Somaliland']}} @else {{'0'}} @endif,
"FI" : @if(array_key_exists('Finland',$nbr_uv_country)) {{$nbr_uv_country['Finland']}} @else {{'0'}} @endif,
"FJ" : @if(array_key_exists('Fiji',$nbr_uv_country)) {{$nbr_uv_country['Fiji']}} @else {{'0'}} @endif,
"FK" : @if(array_key_exists('Falkland Is.',$nbr_uv_country)) {{$nbr_uv_country['Falkland Is.']}} @else {{'0'}} @endif,
"NI" : @if(array_key_exists('Nicaragua',$nbr_uv_country)) {{$nbr_uv_country['Nicaragua']}} @else {{'0'}} @endif,
"NL" : @if(array_key_exists('Netherlands',$nbr_uv_country)) {{$nbr_uv_country['Netherlands']}} @else {{'0'}} @endif,
"NO" : @if(array_key_exists('Norway',$nbr_uv_country)) {{$nbr_uv_country['Norway']}} @else {{'0'}} @endif,
"NA" : @if(array_key_exists('Namibia',$nbr_uv_country)) {{$nbr_uv_country['Namibia']}} @else {{'0'}} @endif,
"VU" : @if(array_key_exists('Vanuatu',$nbr_uv_country)) {{$nbr_uv_country['Vanuatu']}} @else {{'0'}} @endif,
"NC" : @if(array_key_exists('New Caledonia',$nbr_uv_country)) {{$nbr_uv_country['New Caledonia']}} @else {{'0'}} @endif,
"NE" : @if(array_key_exists('Niger',$nbr_uv_country)) {{$nbr_uv_country['Niger']}} @else {{'0'}} @endif,
"NG" : @if(array_key_exists('Nigeria',$nbr_uv_country)) {{$nbr_uv_country['Nigeria']}} @else {{'0'}} @endif,
"NZ" : @if(array_key_exists('New Zealand',$nbr_uv_country)) {{$nbr_uv_country['New Zealand']}} @else {{'0'}} @endif,
"NP" : @if(array_key_exists('Nepal',$nbr_uv_country)) {{$nbr_uv_country['Nepal']}} @else {{'0'}} @endif,
"XK" : @if(array_key_exists('Kosovo',$nbr_uv_country)) {{$nbr_uv_country['Kosovo']}} @else {{'0'}} @endif,
"CI" : @if(array_key_exists('Côte d\'Ivoire',$nbr_uv_country)) {{$nbr_uv_country['Côte d\'Ivoire']}} @else {{'0'}} @endif,
"CH" : @if(array_key_exists('Switzerland',$nbr_uv_country)) {{$nbr_uv_country['Switzerland']}} @else {{'0'}} @endif,
"CO" : @if(array_key_exists('Colombia',$nbr_uv_country)) {{$nbr_uv_country['Colombia']}} @else {{'0'}} @endif,
"CN" : @if(array_key_exists('China',$nbr_uv_country)) {{$nbr_uv_country['China']}} @else {{'0'}} @endif,
"CM" : @if(array_key_exists('Cameroon',$nbr_uv_country)) {{$nbr_uv_country['Cameroon']}} @else {{'0'}} @endif,
"CL" : @if(array_key_exists('Chile',$nbr_uv_country)) {{$nbr_uv_country['Chile']}} @else {{'0'}} @endif,
"XC" : @if(array_key_exists('N. Cyprus',$nbr_uv_country)) {{$nbr_uv_country['N. Cyprus']}} @else {{'0'}} @endif,
"CA" : @if(array_key_exists('Canada',$nbr_uv_country)) {{$nbr_uv_country['Canada']}} @else {{'0'}} @endif,
"CG" : @if(array_key_exists('Congo',$nbr_uv_country)) {{$nbr_uv_country['Congo']}} @else {{'0'}} @endif,
"CF" : @if(array_key_exists('Central African Rep.',$nbr_uv_country)) {{$nbr_uv_country['Central African Rep.']}} @else {{'0'}} @endif,
"CD" : @if(array_key_exists('Dem. Rep. Congo',$nbr_uv_country)) {{$nbr_uv_country['Dem. Rep. Congo']}} @else {{'0'}} @endif,
"CZ" : @if(array_key_exists('Czech Rep.',$nbr_uv_country)) {{$nbr_uv_country['Czech Rep.']}} @else {{'0'}} @endif,
"CY" : @if(array_key_exists('Cyprus',$nbr_uv_country)) {{$nbr_uv_country['Cyprus']}} @else {{'0'}} @endif,
"CR" : @if(array_key_exists('Costa Rica',$nbr_uv_country)) {{$nbr_uv_country['Costa Rica']}} @else {{'0'}} @endif,
"CU" : @if(array_key_exists('Cuba',$nbr_uv_country)) {{$nbr_uv_country['Cuba']}} @else {{'0'}} @endif,
"SZ" : @if(array_key_exists('Swaziland',$nbr_uv_country)) {{$nbr_uv_country['Swaziland']}} @else {{'0'}} @endif,
"SY" : @if(array_key_exists('Syria',$nbr_uv_country)) {{$nbr_uv_country['Syria']}} @else {{'0'}} @endif,
"KG" : @if(array_key_exists('Kyrgyzstan',$nbr_uv_country)) {{$nbr_uv_country['Kyrgyzstan']}} @else {{'0'}} @endif,
"KE" : @if(array_key_exists('Kenya',$nbr_uv_country)) {{$nbr_uv_country['Kenya']}} @else {{'0'}} @endif,
"SS" : @if(array_key_exists('S. Sudan',$nbr_uv_country)) {{$nbr_uv_country['S. Sudan']}} @else {{'0'}} @endif,
"SR" : @if(array_key_exists('Suriname',$nbr_uv_country)) {{$nbr_uv_country['Suriname']}} @else {{'0'}} @endif,
"KH" : @if(array_key_exists('Cambodia',$nbr_uv_country)) {{$nbr_uv_country['Cambodia']}} @else {{'0'}} @endif,
"SV" : @if(array_key_exists('El Salvador',$nbr_uv_country)) {{$nbr_uv_country['El Salvador']}} @else {{'0'}} @endif,
"SK" : @if(array_key_exists('Slovakia',$nbr_uv_country)) {{$nbr_uv_country['Slovakia']}} @else {{'0'}} @endif,
"KR" : @if(array_key_exists('Korea',$nbr_uv_country)) {{$nbr_uv_country['Korea']}} @else {{'0'}} @endif,
"SI" : @if(array_key_exists('Slovenia',$nbr_uv_country)) {{$nbr_uv_country['Slovenia']}} @else {{'0'}} @endif,
"KP" : @if(array_key_exists('Dem. Rep. Korea',$nbr_uv_country)) {{$nbr_uv_country['Dem. Rep. Korea']}} @else {{'0'}} @endif,
"KW" : @if(array_key_exists('Kuwait',$nbr_uv_country)) {{$nbr_uv_country['Kuwait']}} @else {{'0'}} @endif,
"SN" : @if(array_key_exists('Senegal',$nbr_uv_country)) {{$nbr_uv_country['Senegal']}} @else {{'0'}} @endif,
"SL" : @if(array_key_exists('Sierra Leone',$nbr_uv_country)) {{$nbr_uv_country['Sierra Leone']}} @else {{'0'}} @endif,
"KZ" : @if(array_key_exists('Kazakhstan',$nbr_uv_country)) {{$nbr_uv_country['Kazakhstan']}} @else {{'0'}} @endif,
"SA" : @if(array_key_exists('Saudi Arabia',$nbr_uv_country)) {{$nbr_uv_country['Saudi Arabia']}} @else {{'0'}} @endif,
"SE" : @if(array_key_exists('Sweden',$nbr_uv_country)) {{$nbr_uv_country['Sweden']}} @else {{'0'}} @endif,
"SD" : @if(array_key_exists('Sudan',$nbr_uv_country)) {{$nbr_uv_country['Sudan']}} @else {{'0'}} @endif,
"DO" : @if(array_key_exists('Dominican Rep.',$nbr_uv_country)) {{$nbr_uv_country['Dominican Rep.']}} @else {{'0'}} @endif,
"DJ" : @if(array_key_exists('Djibouti',$nbr_uv_country)) {{$nbr_uv_country['Djibouti']}} @else {{'0'}} @endif,
"DK" : @if(array_key_exists('Denmark',$nbr_uv_country)) {{$nbr_uv_country['Denmark']}} @else {{'0'}} @endif,
"DE" : @if(array_key_exists('Germany',$nbr_uv_country)) {{$nbr_uv_country['Germany']}} @else {{'0'}} @endif,
"YE" : @if(array_key_exists('Yemen',$nbr_uv_country)) {{$nbr_uv_country['Yemen']}} @else {{'0'}} @endif,
"DZ" : @if(array_key_exists('Algeria',$nbr_uv_country)) {{$nbr_uv_country['Algeria']}} @else {{'0'}} @endif,
"US" : @if(array_key_exists('United States',$nbr_uv_country)) {{$nbr_uv_country['United States']}} @else {{'0'}} @endif,
"UY" : @if(array_key_exists('Uruguay',$nbr_uv_country)) {{$nbr_uv_country['Uruguay']}} @else {{'0'}} @endif,
"LB" : @if(array_key_exists('Lebanon',$nbr_uv_country)) {{$nbr_uv_country['Lebanon']}} @else {{'0'}} @endif,
"LA" : @if(array_key_exists('Lao PDR',$nbr_uv_country)) {{$nbr_uv_country['Lao PDR']}} @else {{'0'}} @endif,
"TW" : @if(array_key_exists('Taiwan',$nbr_uv_country)) {{$nbr_uv_country['Taiwan']}} @else {{'0'}} @endif,
"TT" : @if(array_key_exists('Trinidad and Tobago',$nbr_uv_country)) {{$nbr_uv_country['Trinidad and Tobago']}} @else {{'0'}} @endif,
"TR" : @if(array_key_exists('Turkey',$nbr_uv_country)) {{$nbr_uv_country['Turkey']}} @else {{'0'}} @endif,
"LK" : @if(array_key_exists('Sri Lanka',$nbr_uv_country)) {{$nbr_uv_country['Sri Lanka']}} @else {{'0'}} @endif,
"LV" : @if(array_key_exists('Latvia',$nbr_uv_country)) {{$nbr_uv_country['Latvia']}} @else {{'0'}} @endif,
"LT" : @if(array_key_exists('Lithuania',$nbr_uv_country)) {{$nbr_uv_country['Lithuania']}} @else {{'0'}} @endif,
"LU" : @if(array_key_exists('Luxembourg',$nbr_uv_country)) {{$nbr_uv_country['Luxembourg']}} @else {{'0'}} @endif,
"LR" : @if(array_key_exists('Liberia',$nbr_uv_country)) {{$nbr_uv_country['Liberia']}} @else {{'0'}} @endif,
"LS" : @if(array_key_exists('Lesotho',$nbr_uv_country)) {{$nbr_uv_country['Lesotho']}} @else {{'0'}} @endif,
"TH" : @if(array_key_exists('Thailand',$nbr_uv_country)) {{$nbr_uv_country['Thailand']}} @else {{'0'}} @endif,
"TF" : @if(array_key_exists('Fr. S. Antarctic Lands',$nbr_uv_country)) {{$nbr_uv_country['Fr. S. Antarctic Lands']}} @else {{'0'}} @endif,
"TG" : @if(array_key_exists('Togo',$nbr_uv_country)) {{$nbr_uv_country['Togo']}} @else {{'0'}} @endif,
"TD" : @if(array_key_exists('Chad',$nbr_uv_country)) {{$nbr_uv_country['Chad']}} @else {{'0'}} @endif,
"LY" : @if(array_key_exists('Libya',$nbr_uv_country)) {{$nbr_uv_country['Libya']}} @else {{'0'}} @endif,
"AE" : @if(array_key_exists('United Arab Emirates',$nbr_uv_country)) {{$nbr_uv_country['United Arab Emirates']}} @else {{'0'}} @endif,
"VE" : @if(array_key_exists('Venezuela',$nbr_uv_country)) {{$nbr_uv_country['Venezuela']}} @else {{'0'}} @endif,
"AF" : @if(array_key_exists('Afghanistan',$nbr_uv_country)) {{$nbr_uv_country['Afghanistan']}} @else {{'0'}} @endif,
"IQ" : @if(array_key_exists('Iraq',$nbr_uv_country)) {{$nbr_uv_country['Iraq']}} @else {{'0'}} @endif,
"IS" : @if(array_key_exists('Iceland',$nbr_uv_country)) {{$nbr_uv_country['Iceland']}} @else {{'0'}} @endif,
"IR" : @if(array_key_exists('Iran',$nbr_uv_country)) {{$nbr_uv_country['Iran']}} @else {{'0'}} @endif,
"AM" : @if(array_key_exists('Armenia',$nbr_uv_country)) {{$nbr_uv_country['Armenia']}} @else {{'0'}} @endif,
"AL" : @if(array_key_exists('Albania',$nbr_uv_country)) {{$nbr_uv_country['Albania']}} @else {{'0'}} @endif,
"AO" : @if(array_key_exists('Angola',$nbr_uv_country)) {{$nbr_uv_country['Angola']}} @else {{'0'}} @endif,
"AR" : @if(array_key_exists('Argentina',$nbr_uv_country)) {{$nbr_uv_country['Argentina']}} @else {{'0'}} @endif,
"AU" : @if(array_key_exists('Australia',$nbr_uv_country)) {{$nbr_uv_country['Australia']}} @else {{'0'}} @endif,
"AT" : @if(array_key_exists('Austria',$nbr_uv_country)) {{$nbr_uv_country['Austria']}} @else {{'0'}} @endif,
"IN" : @if(array_key_exists('India',$nbr_uv_country)) {{$nbr_uv_country['India']}} @else {{'0'}} @endif,
"TZ" : @if(array_key_exists('Tanzania',$nbr_uv_country)) {{$nbr_uv_country['Tanzania']}} @else {{'0'}} @endif,
"AZ" : @if(array_key_exists('Azerbaijan',$nbr_uv_country)) {{$nbr_uv_country['Azerbaijan']}} @else {{'0'}} @endif,
"IE" : @if(array_key_exists('Ireland',$nbr_uv_country)) {{$nbr_uv_country['Ireland']}} @else {{'0'}} @endif,
"ID" : @if(array_key_exists('Indonesia',$nbr_uv_country)) {{$nbr_uv_country['Indonesia']}} @else {{'0'}} @endif,
"UA" : @if(array_key_exists('Ukraine',$nbr_uv_country)) {{$nbr_uv_country['Ukraine']}} @else {{'0'}} @endif,
"QA" : @if(array_key_exists('Qatar',$nbr_uv_country)) {{$nbr_uv_country['Qatar']}} @else {{'0'}} @endif,
"MZ" : @if(array_key_exists('Mozambique',$nbr_uv_country)) {{$nbr_uv_country['Mozambique']}} @else {{'0'}} @endif,
  }
}]
},
onRegionClick: function (event, code) {
var name = maps.mapData.paths[code].name;
alert(name);
},
});
});



$(function(){
var maps = new jvm.Map({
map: 'world_mill_en',
container: $('#map_nv'),
regionLabelStyle: {
  initial: {
    fill: '#B90E32'
  },
  hover: {
    fill: 'black'
  }
},
series: {
regions: [{
  scale: ['#ffc107', '#dc3545'],
  normalizeFunction: 'polynomial',


  values: {
"BD" : @if(array_key_exists('Bangladesh',$nbr_nv_country)) {{$nbr_nv_country['Bangladesh']}} @else {{'0'}} @endif,
"BE" : @if(array_key_exists('Belgium',$nbr_nv_country)) {{$nbr_nv_country['Belgium']}} @else {{'0'}} @endif,
"BF" : @if(array_key_exists('Burkina Faso',$nbr_nv_country)) {{$nbr_nv_country['Burkina Faso']}} @else {{'0'}} @endif,
"BG" : @if(array_key_exists('Bulgaria',$nbr_nv_country)) {{$nbr_nv_country['Bulgaria']}} @else {{'0'}} @endif,
"BA" : @if(array_key_exists('Bosnia and Herz.',$nbr_nv_country)) {{$nbr_nv_country['Bosnia and Herz.']}} @else {{'0'}} @endif,
"BN" : @if(array_key_exists('Brunei',$nbr_nv_country)) {{$nbr_nv_country['Brunei']}} @else {{'0'}} @endif,
"BO" : @if(array_key_exists('Bolivia',$nbr_nv_country)) {{$nbr_nv_country['Bolivia']}} @else {{'0'}} @endif,
"JP" : @if(array_key_exists('Japan',$nbr_nv_country)) {{$nbr_nv_country['Japan']}} @else {{'0'}} @endif,
"BI" : @if(array_key_exists('Burundi',$nbr_nv_country)) {{$nbr_nv_country['Burundi']}} @else {{'0'}} @endif,
"BJ" : @if(array_key_exists('Benin',$nbr_nv_country)) {{$nbr_nv_country['Benin']}} @else {{'0'}} @endif,
"BT" : @if(array_key_exists('Bhutan',$nbr_nv_country)) {{$nbr_nv_country['Bhutan']}} @else {{'0'}} @endif,
"JM" : @if(array_key_exists('Jamaica',$nbr_nv_country)) {{$nbr_nv_country['Jamaica']}} @else {{'0'}} @endif,
"BW" : @if(array_key_exists('Botswana',$nbr_nv_country)) {{$nbr_nv_country['Botswana']}} @else {{'0'}} @endif,
"BR" : @if(array_key_exists('Brazil',$nbr_nv_country)) {{$nbr_nv_country['Brazil']}} @else {{'0'}} @endif,
"BS" : @if(array_key_exists('Bahamas',$nbr_nv_country)) {{$nbr_nv_country['Bahamas']}} @else {{'0'}} @endif,
"BY" : @if(array_key_exists('Belarus',$nbr_nv_country)) {{$nbr_nv_country['Belarus']}} @else {{'0'}} @endif,
"BZ" : @if(array_key_exists('Belize',$nbr_nv_country)) {{$nbr_nv_country['Belize']}} @else {{'0'}} @endif,
"RU" : @if(array_key_exists('Russia',$nbr_nv_country)) {{$nbr_nv_country['Russia']}} @else {{'0'}} @endif,
"RW" : @if(array_key_exists('Rwanda',$nbr_nv_country)) {{$nbr_nv_country['Rwanda']}} @else {{'0'}} @endif,
"RS" : @if(array_key_exists('Serbia',$nbr_nv_country)) {{$nbr_nv_country['Serbia']}} @else {{'0'}} @endif,
"TL" : @if(array_key_exists('Timor-Leste',$nbr_nv_country)) {{$nbr_nv_country['Timor-Leste']}} @else {{'0'}} @endif,
"TM" : @if(array_key_exists('Turkmenistan',$nbr_nv_country)) {{$nbr_nv_country['Turkmenistan']}} @else {{'0'}} @endif,
"TJ" : @if(array_key_exists('Tajikistan',$nbr_nv_country)) {{$nbr_nv_country['Tajikistan']}} @else {{'0'}} @endif,
"RO" : @if(array_key_exists('Romania',$nbr_nv_country)) {{$nbr_nv_country['Romania']}} @else {{'0'}} @endif,
"GW" : @if(array_key_exists('Guinea-Bissau',$nbr_nv_country)) {{$nbr_nv_country['Guinea-Bissau']}} @else {{'0'}} @endif,
"GT" : @if(array_key_exists('Guatemala',$nbr_nv_country)) {{$nbr_nv_country['Guatemala']}} @else {{'0'}} @endif,
"GR" : @if(array_key_exists('Greece',$nbr_nv_country)) {{$nbr_nv_country['Greece']}} @else {{'0'}} @endif,
"GQ" : @if(array_key_exists('Eq. Guinea',$nbr_nv_country)) {{$nbr_nv_country['Eq. Guinea']}} @else {{'0'}} @endif,
"GY" : @if(array_key_exists('Guyana',$nbr_nv_country)) {{$nbr_nv_country['Guyana']}} @else {{'0'}} @endif,
"GE" : @if(array_key_exists('Georgia',$nbr_nv_country)) {{$nbr_nv_country['Georgia']}} @else {{'0'}} @endif,
"GB" : @if(array_key_exists('United Kingdom',$nbr_nv_country)) {{$nbr_nv_country['United Kingdom']}} @else {{'0'}} @endif,
"GA" : @if(array_key_exists('Gabon',$nbr_nv_country)) {{$nbr_nv_country['Gabon']}} @else {{'0'}} @endif,
"GN" : @if(array_key_exists('Guinea',$nbr_nv_country)) {{$nbr_nv_country['Guinea']}} @else {{'0'}} @endif,
"GM" : @if(array_key_exists('Gambia',$nbr_nv_country)) {{$nbr_nv_country['Gambia']}} @else {{'0'}} @endif,
"GL" : @if(array_key_exists('Greenland',$nbr_nv_country)) {{$nbr_nv_country['Greenland']}} @else {{'0'}} @endif,
"GH" : @if(array_key_exists('Ghana',$nbr_nv_country)) {{$nbr_nv_country['Ghana']}} @else {{'0'}} @endif,
"OM" : @if(array_key_exists('Oman',$nbr_nv_country)) {{$nbr_nv_country['Oman']}} @else {{'0'}} @endif,
"TN" : @if(array_key_exists('Tunisia',$nbr_nv_country)) {{$nbr_nv_country['Tunisia']}} @else {{'0'}} @endif,
"JO" : @if(array_key_exists('Jordan',$nbr_nv_country)) {{$nbr_nv_country['Jordan']}} @else {{'0'}} @endif,
"HR" : @if(array_key_exists('Croatia',$nbr_nv_country)) {{$nbr_nv_country['Croatia']}} @else {{'0'}} @endif,
"HT" : @if(array_key_exists('Haiti',$nbr_nv_country)) {{$nbr_nv_country['Haiti']}} @else {{'0'}} @endif,
"HU" : @if(array_key_exists('Hungary',$nbr_nv_country)) {{$nbr_nv_country['Hungary']}} @else {{'0'}} @endif,
"HN" : @if(array_key_exists('Honduras',$nbr_nv_country)) {{$nbr_nv_country['Honduras']}} @else {{'0'}} @endif,
"PR" : @if(array_key_exists('Puerto Rico',$nbr_nv_country)) {{$nbr_nv_country['Puerto Rico']}} @else {{'0'}} @endif,
"PS" : @if(array_key_exists('Palestine',$nbr_nv_country)) {{$nbr_nv_country['Palestine']}} @else {{'0'}} @endif,
"PT" : @if(array_key_exists('Portugal',$nbr_nv_country)) {{$nbr_nv_country['Portugal']}} @else {{'0'}} @endif,
"PY" : @if(array_key_exists('Paraguay',$nbr_nv_country)) {{$nbr_nv_country['Paraguay']}} @else {{'0'}} @endif,
"PA" : @if(array_key_exists('Panama',$nbr_nv_country)) {{$nbr_nv_country['Panama']}} @else {{'0'}} @endif,
"PG" : @if(array_key_exists('Papua New Guinea',$nbr_nv_country)) {{$nbr_nv_country['Papua New Guinea']}} @else {{'0'}} @endif,
"PE" : @if(array_key_exists('Peru',$nbr_nv_country)) {{$nbr_nv_country['Peru']}} @else {{'0'}} @endif,
"PK" : @if(array_key_exists('Pakistan',$nbr_nv_country)) {{$nbr_nv_country['Pakistan']}} @else {{'0'}} @endif,
"PH" : @if(array_key_exists('Philippines',$nbr_nv_country)) {{$nbr_nv_country['Philippines']}} @else {{'0'}} @endif,
"PL" : @if(array_key_exists('Poland',$nbr_nv_country)) {{$nbr_nv_country['Poland']}} @else {{'0'}} @endif,
"ZM" : @if(array_key_exists('Zambia',$nbr_nv_country)) {{$nbr_nv_country['Zambia']}} @else {{'0'}} @endif,
"EH" : @if(array_key_exists('W. Sahara',$nbr_nv_country)) {{$nbr_nv_country['W. Sahara']}} @else {{'0'}} @endif,
"EE" : @if(array_key_exists('Estonia',$nbr_nv_country)) {{$nbr_nv_country['Estonia']}} @else {{'0'}} @endif,
"EG" : @if(array_key_exists('Egypt',$nbr_nv_country)) {{$nbr_nv_country['Egypt']}} @else {{'0'}} @endif,
"ZA" : @if(array_key_exists('South Africa',$nbr_nv_country)) {{$nbr_nv_country['South Africa']}} @else {{'0'}} @endif,
"EC" : @if(array_key_exists('Ecuador',$nbr_nv_country)) {{$nbr_nv_country['Ecuador']}} @else {{'0'}} @endif,
"IT" : @if(array_key_exists('Italy',$nbr_nv_country)) {{$nbr_nv_country['Italy']}} @else {{'0'}} @endif,
"VN" : @if(array_key_exists('Vietnam',$nbr_nv_country)) {{$nbr_nv_country['Vietnam']}} @else {{'0'}} @endif,
"SB" : @if(array_key_exists('Solomon Is.',$nbr_nv_country)) {{$nbr_nv_country['Solomon Is.']}} @else {{'0'}} @endif,
"ET" : @if(array_key_exists('Ethiopia',$nbr_nv_country)) {{$nbr_nv_country['Ethiopia']}} @else {{'0'}} @endif,
"SO" : @if(array_key_exists('Somalia',$nbr_nv_country)) {{$nbr_nv_country['Somalia']}} @else {{'0'}} @endif,
"ZW" : @if(array_key_exists('Zimbabwe',$nbr_nv_country)) {{$nbr_nv_country['Zimbabwe']}} @else {{'0'}} @endif,
"ES" : @if(array_key_exists('Spain',$nbr_nv_country)) {{$nbr_nv_country['Spain']}} @else {{'0'}} @endif,
"ER" : @if(array_key_exists('Eritrea',$nbr_nv_country)) {{$nbr_nv_country['Eritrea']}} @else {{'0'}} @endif,
"ME" : @if(array_key_exists('Montenegro',$nbr_nv_country)) {{$nbr_nv_country['Montenegro']}} @else {{'0'}} @endif,
"MD" : @if(array_key_exists('Moldova',$nbr_nv_country)) {{$nbr_nv_country['Moldova']}} @else {{'0'}} @endif,
"MG" : @if(array_key_exists('Madagascar',$nbr_nv_country)) {{$nbr_nv_country['Madagascar']}} @else {{'0'}} @endif,
"MA" : @if(array_key_exists('Morocco',$nbr_nv_country)) {{$nbr_nv_country['Morocco']}} @else {{'0'}} @endif,
"UZ" : @if(array_key_exists('Uzbekistan',$nbr_nv_country)) {{$nbr_nv_country['Uzbekistan']}} @else {{'0'}} @endif,
"MM" : @if(array_key_exists('Myanmar',$nbr_nv_country)) {{$nbr_nv_country['Myanmar']}} @else {{'0'}} @endif,
"ML" : @if(array_key_exists('Mali',$nbr_nv_country)) {{$nbr_nv_country['Mali']}} @else {{'0'}} @endif,
"MN" : @if(array_key_exists('Mongolia',$nbr_nv_country)) {{$nbr_nv_country['Mongolia']}} @else {{'0'}} @endif,
"MK" : @if(array_key_exists('Macedonia',$nbr_nv_country)) {{$nbr_nv_country['Macedonia']}} @else {{'0'}} @endif,
"MW" : @if(array_key_exists('Malawi',$nbr_nv_country)) {{$nbr_nv_country['Malawi']}} @else {{'0'}} @endif,
"MR" : @if(array_key_exists('Mauritania',$nbr_nv_country)) {{$nbr_nv_country['Mauritania']}} @else {{'0'}} @endif,
"UG" : @if(array_key_exists('Uganda',$nbr_nv_country)) {{$nbr_nv_country['Uganda']}} @else {{'0'}} @endif,
"MY" : @if(array_key_exists('Malaysia',$nbr_nv_country)) {{$nbr_nv_country['Malaysia']}} @else {{'0'}} @endif,
"MX" : @if(array_key_exists('Mexico',$nbr_nv_country)) {{$nbr_nv_country['Mexico']}} @else {{'0'}} @endif,
"IL" : @if(array_key_exists('Israel',$nbr_nv_country)) {{$nbr_nv_country['Israel']}} @else {{'0'}} @endif,
"FR" : @if(array_key_exists('France',$nbr_nv_country)) {{$nbr_nv_country['France']}} @else {{'0'}} @endif,
"XS" : @if(array_key_exists('Somaliland',$nbr_nv_country)) {{$nbr_nv_country['Somaliland']}} @else {{'0'}} @endif,
"FI" : @if(array_key_exists('Finland',$nbr_nv_country)) {{$nbr_nv_country['Finland']}} @else {{'0'}} @endif,
"FJ" : @if(array_key_exists('Fiji',$nbr_nv_country)) {{$nbr_nv_country['Fiji']}} @else {{'0'}} @endif,
"FK" : @if(array_key_exists('Falkland Is.',$nbr_nv_country)) {{$nbr_nv_country['Falkland Is.']}} @else {{'0'}} @endif,
"NI" : @if(array_key_exists('Nicaragua',$nbr_nv_country)) {{$nbr_nv_country['Nicaragua']}} @else {{'0'}} @endif,
"NL" : @if(array_key_exists('Netherlands',$nbr_nv_country)) {{$nbr_nv_country['Netherlands']}} @else {{'0'}} @endif,
"NO" : @if(array_key_exists('Norway',$nbr_nv_country)) {{$nbr_nv_country['Norway']}} @else {{'0'}} @endif,
"NA" : @if(array_key_exists('Namibia',$nbr_nv_country)) {{$nbr_nv_country['Namibia']}} @else {{'0'}} @endif,
"VU" : @if(array_key_exists('Vanuatu',$nbr_nv_country)) {{$nbr_nv_country['Vanuatu']}} @else {{'0'}} @endif,
"NC" : @if(array_key_exists('New Caledonia',$nbr_nv_country)) {{$nbr_nv_country['New Caledonia']}} @else {{'0'}} @endif,
"NE" : @if(array_key_exists('Niger',$nbr_nv_country)) {{$nbr_nv_country['Niger']}} @else {{'0'}} @endif,
"NG" : @if(array_key_exists('Nigeria',$nbr_nv_country)) {{$nbr_nv_country['Nigeria']}} @else {{'0'}} @endif,
"NZ" : @if(array_key_exists('New Zealand',$nbr_nv_country)) {{$nbr_nv_country['New Zealand']}} @else {{'0'}} @endif,
"NP" : @if(array_key_exists('Nepal',$nbr_nv_country)) {{$nbr_nv_country['Nepal']}} @else {{'0'}} @endif,
"XK" : @if(array_key_exists('Kosovo',$nbr_nv_country)) {{$nbr_nv_country['Kosovo']}} @else {{'0'}} @endif,
"CI" : @if(array_key_exists('Côte d\'Ivoire',$nbr_nv_country)) {{$nbr_nv_country['Côte d\'Ivoire']}} @else {{'0'}} @endif,
"CH" : @if(array_key_exists('Switzerland',$nbr_nv_country)) {{$nbr_nv_country['Switzerland']}} @else {{'0'}} @endif,
"CO" : @if(array_key_exists('Colombia',$nbr_nv_country)) {{$nbr_nv_country['Colombia']}} @else {{'0'}} @endif,
"CN" : @if(array_key_exists('China',$nbr_nv_country)) {{$nbr_nv_country['China']}} @else {{'0'}} @endif,
"CM" : @if(array_key_exists('Cameroon',$nbr_nv_country)) {{$nbr_nv_country['Cameroon']}} @else {{'0'}} @endif,
"CL" : @if(array_key_exists('Chile',$nbr_nv_country)) {{$nbr_nv_country['Chile']}} @else {{'0'}} @endif,
"XC" : @if(array_key_exists('N. Cyprus',$nbr_nv_country)) {{$nbr_nv_country['N. Cyprus']}} @else {{'0'}} @endif,
"CA" : @if(array_key_exists('Canada',$nbr_nv_country)) {{$nbr_nv_country['Canada']}} @else {{'0'}} @endif,
"CG" : @if(array_key_exists('Congo',$nbr_nv_country)) {{$nbr_nv_country['Congo']}} @else {{'0'}} @endif,
"CF" : @if(array_key_exists('Central African Rep.',$nbr_nv_country)) {{$nbr_nv_country['Central African Rep.']}} @else {{'0'}} @endif,
"CD" : @if(array_key_exists('Dem. Rep. Congo',$nbr_nv_country)) {{$nbr_nv_country['Dem. Rep. Congo']}} @else {{'0'}} @endif,
"CZ" : @if(array_key_exists('Czech Rep.',$nbr_nv_country)) {{$nbr_nv_country['Czech Rep.']}} @else {{'0'}} @endif,
"CY" : @if(array_key_exists('Cyprus',$nbr_nv_country)) {{$nbr_nv_country['Cyprus']}} @else {{'0'}} @endif,
"CR" : @if(array_key_exists('Costa Rica',$nbr_nv_country)) {{$nbr_nv_country['Costa Rica']}} @else {{'0'}} @endif,
"CU" : @if(array_key_exists('Cuba',$nbr_nv_country)) {{$nbr_nv_country['Cuba']}} @else {{'0'}} @endif,
"SZ" : @if(array_key_exists('Swaziland',$nbr_nv_country)) {{$nbr_nv_country['Swaziland']}} @else {{'0'}} @endif,
"SY" : @if(array_key_exists('Syria',$nbr_nv_country)) {{$nbr_nv_country['Syria']}} @else {{'0'}} @endif,
"KG" : @if(array_key_exists('Kyrgyzstan',$nbr_nv_country)) {{$nbr_nv_country['Kyrgyzstan']}} @else {{'0'}} @endif,
"KE" : @if(array_key_exists('Kenya',$nbr_nv_country)) {{$nbr_nv_country['Kenya']}} @else {{'0'}} @endif,
"SS" : @if(array_key_exists('S. Sudan',$nbr_nv_country)) {{$nbr_nv_country['S. Sudan']}} @else {{'0'}} @endif,
"SR" : @if(array_key_exists('Suriname',$nbr_nv_country)) {{$nbr_nv_country['Suriname']}} @else {{'0'}} @endif,
"KH" : @if(array_key_exists('Cambodia',$nbr_nv_country)) {{$nbr_nv_country['Cambodia']}} @else {{'0'}} @endif,
"SV" : @if(array_key_exists('El Salvador',$nbr_nv_country)) {{$nbr_nv_country['El Salvador']}} @else {{'0'}} @endif,
"SK" : @if(array_key_exists('Slovakia',$nbr_nv_country)) {{$nbr_nv_country['Slovakia']}} @else {{'0'}} @endif,
"KR" : @if(array_key_exists('Korea',$nbr_nv_country)) {{$nbr_nv_country['Korea']}} @else {{'0'}} @endif,
"SI" : @if(array_key_exists('Slovenia',$nbr_nv_country)) {{$nbr_nv_country['Slovenia']}} @else {{'0'}} @endif,
"KP" : @if(array_key_exists('Dem. Rep. Korea',$nbr_nv_country)) {{$nbr_nv_country['Dem. Rep. Korea']}} @else {{'0'}} @endif,
"KW" : @if(array_key_exists('Kuwait',$nbr_nv_country)) {{$nbr_nv_country['Kuwait']}} @else {{'0'}} @endif,
"SN" : @if(array_key_exists('Senegal',$nbr_nv_country)) {{$nbr_nv_country['Senegal']}} @else {{'0'}} @endif,
"SL" : @if(array_key_exists('Sierra Leone',$nbr_nv_country)) {{$nbr_nv_country['Sierra Leone']}} @else {{'0'}} @endif,
"KZ" : @if(array_key_exists('Kazakhstan',$nbr_nv_country)) {{$nbr_nv_country['Kazakhstan']}} @else {{'0'}} @endif,
"SA" : @if(array_key_exists('Saudi Arabia',$nbr_nv_country)) {{$nbr_nv_country['Saudi Arabia']}} @else {{'0'}} @endif,
"SE" : @if(array_key_exists('Sweden',$nbr_nv_country)) {{$nbr_nv_country['Sweden']}} @else {{'0'}} @endif,
"SD" : @if(array_key_exists('Sudan',$nbr_nv_country)) {{$nbr_nv_country['Sudan']}} @else {{'0'}} @endif,
"DO" : @if(array_key_exists('Dominican Rep.',$nbr_nv_country)) {{$nbr_nv_country['Dominican Rep.']}} @else {{'0'}} @endif,
"DJ" : @if(array_key_exists('Djibouti',$nbr_nv_country)) {{$nbr_nv_country['Djibouti']}} @else {{'0'}} @endif,
"DK" : @if(array_key_exists('Denmark',$nbr_nv_country)) {{$nbr_nv_country['Denmark']}} @else {{'0'}} @endif,
"DE" : @if(array_key_exists('Germany',$nbr_nv_country)) {{$nbr_nv_country['Germany']}} @else {{'0'}} @endif,
"YE" : @if(array_key_exists('Yemen',$nbr_nv_country)) {{$nbr_nv_country['Yemen']}} @else {{'0'}} @endif,
"DZ" : @if(array_key_exists('Algeria',$nbr_nv_country)) {{$nbr_nv_country['Algeria']}} @else {{'0'}} @endif,
"US" : @if(array_key_exists('United States',$nbr_nv_country)) {{$nbr_nv_country['United States']}} @else {{'0'}} @endif,
"UY" : @if(array_key_exists('Uruguay',$nbr_nv_country)) {{$nbr_nv_country['Uruguay']}} @else {{'0'}} @endif,
"LB" : @if(array_key_exists('Lebanon',$nbr_nv_country)) {{$nbr_nv_country['Lebanon']}} @else {{'0'}} @endif,
"LA" : @if(array_key_exists('Lao PDR',$nbr_nv_country)) {{$nbr_nv_country['Lao PDR']}} @else {{'0'}} @endif,
"TW" : @if(array_key_exists('Taiwan',$nbr_nv_country)) {{$nbr_nv_country['Taiwan']}} @else {{'0'}} @endif,
"TT" : @if(array_key_exists('Trinidad and Tobago',$nbr_nv_country)) {{$nbr_nv_country['Trinidad and Tobago']}} @else {{'0'}} @endif,
"TR" : @if(array_key_exists('Turkey',$nbr_nv_country)) {{$nbr_nv_country['Turkey']}} @else {{'0'}} @endif,
"LK" : @if(array_key_exists('Sri Lanka',$nbr_nv_country)) {{$nbr_nv_country['Sri Lanka']}} @else {{'0'}} @endif,
"LV" : @if(array_key_exists('Latvia',$nbr_nv_country)) {{$nbr_nv_country['Latvia']}} @else {{'0'}} @endif,
"LT" : @if(array_key_exists('Lithuania',$nbr_nv_country)) {{$nbr_nv_country['Lithuania']}} @else {{'0'}} @endif,
"LU" : @if(array_key_exists('Luxembourg',$nbr_nv_country)) {{$nbr_nv_country['Luxembourg']}} @else {{'0'}} @endif,
"LR" : @if(array_key_exists('Liberia',$nbr_nv_country)) {{$nbr_nv_country['Liberia']}} @else {{'0'}} @endif,
"LS" : @if(array_key_exists('Lesotho',$nbr_nv_country)) {{$nbr_nv_country['Lesotho']}} @else {{'0'}} @endif,
"TH" : @if(array_key_exists('Thailand',$nbr_nv_country)) {{$nbr_nv_country['Thailand']}} @else {{'0'}} @endif,
"TF" : @if(array_key_exists('Fr. S. Antarctic Lands',$nbr_nv_country)) {{$nbr_nv_country['Fr. S. Antarctic Lands']}} @else {{'0'}} @endif,
"TG" : @if(array_key_exists('Togo',$nbr_nv_country)) {{$nbr_nv_country['Togo']}} @else {{'0'}} @endif,
"TD" : @if(array_key_exists('Chad',$nbr_nv_country)) {{$nbr_nv_country['Chad']}} @else {{'0'}} @endif,
"LY" : @if(array_key_exists('Libya',$nbr_nv_country)) {{$nbr_nv_country['Libya']}} @else {{'0'}} @endif,
"AE" : @if(array_key_exists('United Arab Emirates',$nbr_nv_country)) {{$nbr_nv_country['United Arab Emirates']}} @else {{'0'}} @endif,
"VE" : @if(array_key_exists('Venezuela',$nbr_nv_country)) {{$nbr_nv_country['Venezuela']}} @else {{'0'}} @endif,
"AF" : @if(array_key_exists('Afghanistan',$nbr_nv_country)) {{$nbr_nv_country['Afghanistan']}} @else {{'0'}} @endif,
"IQ" : @if(array_key_exists('Iraq',$nbr_nv_country)) {{$nbr_nv_country['Iraq']}} @else {{'0'}} @endif,
"IS" : @if(array_key_exists('Iceland',$nbr_nv_country)) {{$nbr_nv_country['Iceland']}} @else {{'0'}} @endif,
"IR" : @if(array_key_exists('Iran',$nbr_nv_country)) {{$nbr_nv_country['Iran']}} @else {{'0'}} @endif,
"AM" : @if(array_key_exists('Armenia',$nbr_nv_country)) {{$nbr_nv_country['Armenia']}} @else {{'0'}} @endif,
"AL" : @if(array_key_exists('Albania',$nbr_nv_country)) {{$nbr_nv_country['Albania']}} @else {{'0'}} @endif,
"AO" : @if(array_key_exists('Angola',$nbr_nv_country)) {{$nbr_nv_country['Angola']}} @else {{'0'}} @endif,
"AR" : @if(array_key_exists('Argentina',$nbr_nv_country)) {{$nbr_nv_country['Argentina']}} @else {{'0'}} @endif,
"AU" : @if(array_key_exists('Australia',$nbr_nv_country)) {{$nbr_nv_country['Australia']}} @else {{'0'}} @endif,
"AT" : @if(array_key_exists('Austria',$nbr_nv_country)) {{$nbr_nv_country['Austria']}} @else {{'0'}} @endif,
"IN" : @if(array_key_exists('India',$nbr_nv_country)) {{$nbr_nv_country['India']}} @else {{'0'}} @endif,
"TZ" : @if(array_key_exists('Tanzania',$nbr_nv_country)) {{$nbr_nv_country['Tanzania']}} @else {{'0'}} @endif,
"AZ" : @if(array_key_exists('Azerbaijan',$nbr_nv_country)) {{$nbr_nv_country['Azerbaijan']}} @else {{'0'}} @endif,
"IE" : @if(array_key_exists('Ireland',$nbr_nv_country)) {{$nbr_nv_country['Ireland']}} @else {{'0'}} @endif,
"ID" : @if(array_key_exists('Indonesia',$nbr_nv_country)) {{$nbr_nv_country['Indonesia']}} @else {{'0'}} @endif,
"UA" : @if(array_key_exists('Ukraine',$nbr_nv_country)) {{$nbr_nv_country['Ukraine']}} @else {{'0'}} @endif,
"QA" : @if(array_key_exists('Qatar',$nbr_nv_country)) {{$nbr_nv_country['Qatar']}} @else {{'0'}} @endif,
"MZ" : @if(array_key_exists('Mozambique',$nbr_nv_country)) {{$nbr_nv_country['Mozambique']}} @else {{'0'}} @endif,
  }
}]
},
onRegionClick: function (event, code) {
var name = maps.mapData.paths[code].name;
alert(name);
},
});
});

</script>
@endsection
