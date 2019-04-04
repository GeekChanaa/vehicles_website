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
  <th scope="col">Modify</th>
  <th scope="col">Delete </th>
</thead>
<tbody>
  @foreach($list_models as $one)
  <tr>
    <!-- Form to modify the model -->
    <form action="{{url('/encyclopediamoderator/modifyvmodel')}}" method="post">
      {{csrf_field()}}
      <td> {{$one->id}} </td>
      <td><input name="name" value="{{$one->name}}" placeholder="{{$one->name}}"> <input type="hidden" value="{{$one->id}}" name="id">  </td>
      <td><input name="brand" value="{{$one->brand}}" placeholder="{{$one->brand}}">  </td>
      <td><input name="description" value="{{$one->description}}" placeholder="{{$one->description}}">  </td>
      <td>{{$one->created_at}}</td>
      <td><button class="btn btn-primary" type="submit"> Modify </button> </td>
    </form>
    <!-- Form to delete the model -->
    <td>
      <form action="{{url('encyclopediamoderator/deletevmodel')}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input name="id" type="hidden" value="{{$one->id}}">
        <button type="submit" class="btn btn-dark"> Delete </button>
      </form>
    </td>
  </tr>
  @endforeach
</tbody>

</table>



</section>



<!-- Important Statistics About Models -->



@endsection
