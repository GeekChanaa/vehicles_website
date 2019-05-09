<!-- Admin Layout -->
@extends('layouts.admin')
@section('content')



<!-- Header For Page -->



<!-- Most Important Statistics -->
<section class="bg-light">
  <h1> Statistics </h1>
  <div class="row col-lg-12">
    <button class="btn btn-outline-danger">{{$rate_generation_by_model}} </button>
    <button class="btn btn-outline-danger">{{$nbr_generations}} </button>
  </div>
</section>


<!-- Listing of Generations -->
<section class="bg-light">
  <h1> Generations List </h1>
  <table class="table table-primary">
    <th scope="col">ID </th>
    <th scope="col">Name </th>
    <th scope="col">Brand </th>
    <th scope="col">Model </th>
    <th scope="col">Created at </th>
    <th scope="col">Modify </th>
    <th scope="col">Delete </th>
    @foreach($list_generations as $generation)
      <tr>
        <td>{{$generation->id}} </td>
        <td>{{$generation->name}} </td>
        <td>{{$generation->brand}} </td>
        <td>{{$generation->model}} </td>
        <td>{{$generation->created_at}} </td>
        <td><button class="btn btn-primary"> Modify </button> </td>
        <td><button class="btn btn-danger"> Delete </button> </td>
      </tr>
    @endforeach
  </table>
  {{$list_generations->links()}}
</section>




<!-- Important Statistics About Generations -->



@endsection
