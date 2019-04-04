<!-- Admin Layout -->
@extends('layouts.admin')
@section('content')




<!-- Important Numbers -->
<section class="bg-light">
<div class="row col-lg-12">
  <a class="row col-lg-3 btn btn-primary"> Number of Used Carparts : {{$nbr_ucp_articles}} </a>
  <a class="row col-lg-3 btn btn-primary"> Number of New Carparts : {{$nbr_ncp_articles}} </a>
  <a class="row col-lg-3 btn btn-primary"> Number of Used Cars : {{$nbr_uv_articles}}</a>
  <a class="row col-lg-3 btn btn-primary"> Number of New Cars : {{$nbr_nv_articles}}</a>
</div>
</section>






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





<script>
var c = document.getElementById("nv_chart");
var replies_chart = new Chart(c, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "number of New Vehicles",
      data :['{{$nbr_recent_nv_last_month}}','{{$nbr_recent_nv_last_2nd_month}}','{{$nbr_recent_nv_last_3rd_month}}','{{$nbr_recent_nv_last_4th_month}}','{{$nbr_recent_nv_last_5th_month}}','{{$nbr_recent_nv_last_6th_month}}','{{$nbr_recent_nv_last_7th_month}}','{{$nbr_recent_nv_last_8th_month}}','{{$nbr_recent_nv_last_9th_month}}','{{$nbr_recent_nv_last_10th_month}}','{{$nbr_recent_nv_last_11th_month}}','{{$nbr_recent_nv_last_12th_month}}'],
    }]
  },
});
var c1 = document.getElementById("uv_chart");
var replies_chart = new Chart(c1, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "number of Used Vehicles",
      data :['{{$nbr_recent_uv_last_month}}','{{$nbr_recent_uv_last_2nd_month}}','{{$nbr_recent_uv_last_3rd_month}}','{{$nbr_recent_uv_last_4th_month}}','{{$nbr_recent_uv_last_5th_month}}','{{$nbr_recent_uv_last_6th_month}}','{{$nbr_recent_uv_last_7th_month}}','{{$nbr_recent_uv_last_8th_month}}','{{$nbr_recent_uv_last_9th_month}}','{{$nbr_recent_uv_last_10th_month}}','{{$nbr_recent_uv_last_11th_month}}','{{$nbr_recent_uv_last_12th_month}}'],
    }]
  },
});
var c2 = document.getElementById("ncp_chart");
var replies_chart = new Chart(c2, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "Number of New Carparts",
      data :['{{$nbr_recent_ncp_last_month}}','{{$nbr_recent_ncp_last_2nd_month}}','{{$nbr_recent_ncp_last_3rd_month}}','{{$nbr_recent_ncp_last_4th_month}}','{{$nbr_recent_ncp_last_5th_month}}','{{$nbr_recent_ncp_last_6th_month}}','{{$nbr_recent_ncp_last_7th_month}}','{{$nbr_recent_ncp_last_8th_month}}','{{$nbr_recent_ncp_last_9th_month}}','{{$nbr_recent_ncp_last_10th_month}}','{{$nbr_recent_ncp_last_11th_month}}','{{$nbr_recent_ncp_last_12th_month}}'],
    }]
  },
});
var c3 = document.getElementById("ucp_chart");
var replies_chart = new Chart(c3, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "number of Used Carparts",
      data :['{{$nbr_recent_ucp_last_month}}','{{$nbr_recent_ucp_last_2nd_month}}','{{$nbr_recent_ucp_last_3rd_month}}','{{$nbr_recent_ucp_last_4th_month}}','{{$nbr_recent_ucp_last_5th_month}}','{{$nbr_recent_ucp_last_6th_month}}','{{$nbr_recent_ucp_last_7th_month}}','{{$nbr_recent_ucp_last_8th_month}}','{{$nbr_recent_ucp_last_9th_month}}','{{$nbr_recent_ucp_last_10th_month}}','{{$nbr_recent_ucp_last_11th_month}}','{{$nbr_recent_ucp_last_12th_month}}'],
    }]
  },
});
</script>
@endsection
