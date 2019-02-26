<!-- Admin Layout -->
@extends('layouts.admin')
@section('content')


<!-- Header For Page -->
<section>

</section>



<!-- Listing of Brands -->
<section class="bg-light col-lg-12">

<table class="table table-dark">
  <thead>
    <th> id </th>
    <th> Name </th>
    <th> Foundation year </th>
    <th> Headquarters </th>
    <th> CEO </th>
    <th> Website </th>
    <th> Production Output </th>
    <th> Revenue </th>
    <th> Net Income </th>
    <th> Number of Employees </th>
    <th> Description </th>
    <th> Added Date </th>
  </thead>
  <tbody>

    @foreach($list_brands as $one)
  <tr>
    <td>{{$one->id}} </td>
    <td>{{$one->name}} </td>
    <td>{{$one->year_foundation}} </td>
    <td>{{$one->headquarters}} </td>
    <td>{{$one->CEO}} </td>
    <td>{{$one->website}} </td>
    <td>{{$one->production_output}} </td>
    <td>{{$one->revenue}} </td>
    <td>{{$one->net_income}} </td>
    <td>{{$one->nbr_of_employees}} </td>
    <td>{{$one->description}} </td>
    <td>{{$one->created_at}} </td>
  </tr>
    @endforeach

  </tbody>
</table>


</section>



<!-- Important Statistics About Brands -->



@endsection
