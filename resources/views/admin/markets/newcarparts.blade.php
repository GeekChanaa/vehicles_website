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
  <th scope="col">ID </th>
  <th scope="col">Name </th>
  <th scope="col">Brand </th>
  <th scope="col">Category </th>
  <th scope="col">Compatible_cars </th>
  <th scope="col">Description </th>
  <th scope="col">User_id </th>
  <th scope="col">Creation Date </th>
  <th scope="col">Update Date </th>
  <th scope="col"> Modify </th>
  <th scope="col">Delete </th>


  @foreach($list_ncp as $ncp)
  <tr>
    <form class="" action="{{url('/marketmoderator/updatencp')}}" method="post">
{{csrf_field()}}
<input type="hidden" value="{{$ncp->id}}" name="id">
    <td>{{$ncp->id}}</td>
    <td><input name="name" value="{{$ncp->name}}"> </td>
    <td><input name="brand" value="{{$ncp->brand}}"> </td>
    <td><input name="category" value="{{$ncp->category}}"> </td>
    <td><input name="compatible_cars" value="{{$ncp->compatible_cars}}"> </td>
    <td><input name="description" value="{{$ncp->description}}"> </td>
    <td>{{$ncp->user_id}} </td>
    <td>{{$ncp->created_at}} </td>
    <td>{{$ncp->updated_at}} </td>
    <td>
      <button class="btn btn-primary" type="submit" > Update </button>
    </td>
    </form>
    <td>
      <form class="" action="{{url('/marketmoderator/deletencp')}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input name="id" value="{{$ncp->id}}" type="hidden">
        <button class="btn btn-danger" type="submit"> Delete </button>
      </form>
    </td>

  </tr>
  @endforeach
</table>

</div>
</section>





@endsection
