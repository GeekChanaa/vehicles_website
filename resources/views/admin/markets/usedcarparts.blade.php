<!-- Admin navbar (layout) -->
@extends('layouts.admin')
@section('content')

<!-- Most Important Statistics -->
<section class="bg-light">
  <h1> Statistics </h1>
</section>




<!-- List of Newcarparts by users (delete and update and add) -->
<section class="bg-light">
  <h1> List New Carparts </h1>
<div class="col-lg-12">
<table class="table table-danger">
  <th scope="col">ID</th>
  <th scope="col">Name </th>
  <th scope="col">Brand </th>
  <th scope="col">Category </th>
  <th scope="col">Compatible_cars </th>
  <th scope="col">Description </th>
  <th scope="col">User_id </th>
  <th scope="col">Creation Date </th>
  <th scope="col">Update Date </th>
  <th scope="col">Delete</th>
  <th scope="col"> Modify </th>

  @foreach($list_ucp as $ucp)
  <tr>
    <tr>
      <form class="" action="{{url('/marketmoderator/updateucp')}}" method="post">
  {{csrf_field()}}
  <input type="hidden" value="{{$ucp->id}}" name="id">
      <td>{{$ucp->id}}</td>
      <td><input name="name" value="{{$ucp->name}}"> </td>
      <td><input name="brand" value="{{$ucp->brand}}"> </td>
      <td><input name="category" value="{{$ucp->category}}"> </td>
      <td><input name="compatible_cars" value="{{$ucp->compatible_cars}}"> </td>
      <td><input name="description" value="{{$ucp->description}}"> </td>
      <td>{{$ucp->user_id}} </td>
      <td>{{$ucp->created_at}} </td>
      <td>{{$ucp->updated_at}} </td>
      <td>
        <button class="btn btn-primary" type="submit" > Update </button>
      </td>
      </form>
    <td>
      <form class="" action="{{url('/marketmoderator/deleteucp')}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input name="id" value="{{$ucp->id}}" type="hidden">
        <button class="btn btn-danger" type="submit"> Delete </button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

</div>
</section>





@endsection
