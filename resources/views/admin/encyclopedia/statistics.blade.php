@extends('layouts.admin')


@section('content')


<!-- Most Important Numbers -->
<section class="bg-light">
  <h1> Numbers </h1>
  <div class="row col-lg-12">
    <div class="btn btn-dark col-lg-3 offset-lg-1">Number of Brands : {{$nbr_brands}} </div>
    <div class="btn btn-dark col-lg-3 offset-lg-1">Number of Models : {{$nbr_models}} </div>
    <div class="btn btn-dark col-lg-3 offset-lg-1">Number of Generations : {{$nbr_generations}} </div>
  </div>
  <div class="row col-lg-12">
    <div class="btn btn-dark col-lg-3 offset-lg-1">Number of Models per Brand : {{$rate_models_per_brand}} </div>
    <div class="btn btn-dark col-lg-3 offset-lg-1">Number of Generations per Model : {{$rate_generations_per_model}} </div>
    <div class="btn btn-dark col-lg-3 offset-lg-1">Number of Generations per Brand : {{$rate_generations_per_brand}} </div>
  </div>
</section>



<!-- List of Brands (by the best 20 : number of employees, revenue, carparts,vehicles  ....) -->
<section class="bg-light">

  <div class="col-lg-6 offset-lg-3 text-center">
    <div class="btn-group" role="group" aria-label="Basic example">
      <button onclick="listbrands()" class="btn btn-danger">Brands</button>
      <button onclick="listmodels()" class="btn btn-danger">Models</button>
      <button onclick="listgenerations()" class="btn btn-danger">Generations</button>
    </div>
  </div>
  <h1 class="listbrands"> List Of Brands </h1>
  <h1 style="display:none;" class="listmodels"> List Of Models </h1>
  <h1 style="display:none;" class="listgenerations"> List Of Generations </h1>
  <div class="col-lg-8 offset-lg-2">
    <table class="listbrands table table-primary">
      <th scope="col"> Name </th>
      <th scope="col"> Net Income </th>
      <th scope="col"> Number of Employees</th>
      <th scope="col"> Revenue</th>
      <th scope="col"> Foundation Year</th>
      @foreach($list_brands as $brand)
      <tr>
        <td>{{$brand->name}} </td>
        <td>{{$brand->net_income}} </td>
        <td>{{$brand->nbr_of_employees}} </td>
        <td>{{$brand->revenue}} </td>
        <td>{{$brand->year_foundation}} </td>
      </tr>
      @endforeach
  </table>


<!-- List of Models (By the best 20) -->

    <table style="display:none;" class="listmodels table table-primary">
    <th scope="col"> Name </th>
    <th scope="col"> Brand Name </th>
    @foreach($list_models as $model)
    <tr>
      <td>{{$model->name}} </td>
      <td>{{$model->brand}} </td>
    </tr>
    @endforeach
  </table>



<!-- List of Generations (By the best 20) -->


  <table style="display:none;" class="listgenerations table table-primary">
    <th scope="col"> Name </th>
    <th scope="col"> Brand Name </th>
    <th scope="col"> Model Name </th>
    <th scope="col"> Power </th>
    <th scope="col"> Maximum Speed </th>
    @foreach($list_generations as $generation)
    <tr>
      <td> {{$generation->name}} </td>
      <td> {{$generation->brand}} </td>
      <td> {{$generation->model}} </td>
      <td> {{$generation->power}} </td>
      <td> {{$generation->maximum_speed}} </td>
    </tr>
    @endforeach
  </table>
</div>

  <span class="listbrands"> {{$list_brands->links()}}</span>
  <span style="display:none;" class="listmodels"> {{$list_models->links()}}</span>
  <span style="display:none;" class="listgenerations"> {{$list_generations->links()}}</span>

</section>


<!-- Map of brands by countries (on click on a country we can view the brands of that country)-->



<section class="bg-light" style="height:400px;">
  <div id="world-map" style="height:400px;"></div>
</section>






<script>
$(function(){
var maps = new jvm.Map({
map: 'world_mill_en',
container: $('#world-map'),
regionLabelStyle: {
  initial: {
    fill: '#B90E32'
  },
  hover: {
    fill: 'black'
  }
},
    onRegionClick: function (event, code) {
    var name = maps.mapData.paths[code].name;
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }

      });
      jQuery.ajax({
         url: "/encyclopediamoderator/getBrands/"+name,
         method: 'get',
         success: function(result){
           var brande = '';
           $.each(result,function(index,brand){
             brande = brande+brand.name;
           });
           swal('Brands',brande,'success');
         },
         error: function(jqXHR, textStatus, errorThrown){
           swal('something went wrong','impossible','error');
       }});
    },
});
});
</script>


@endsection
