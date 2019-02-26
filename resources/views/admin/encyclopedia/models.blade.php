<!-- Admin Layout -->
@extends('layouts.admin')
@section('content')
<!-- Header For Page -->




<!-- Listing of Models -->
<section class="bg-light col-lg-12">

<table class="table table-dark">
<thead>
  <th scope="col">Id </th>
  <th scope="col">Name </th>
  <th scope="col">Brand </th>
  <th scope="col">Description </th>
  <th scope="col">Creation date </th>
</thead>
<tbody>
  @foreach($list_models as $one)
  <tr>
    <td>{{$one->id}} </td>
    <td>{{$one->name}} </td>
    <td>{{$one->brand}} </td>
    <td>{{$one->description}} </td>
    <td>{{$one->created_at}} </td>
  </tr>
  @endforeach
</tbody>

</table>



</section>



<!-- Important Statistics About Models -->



@endsection
