<!-- Admin navbar (layout) -->
@extends('layouts.admin')

@section('content')

<!-- Most Important Statistics -->





<!-- List of Carwashes by users (delete and Edit and add) -->

<section class="bg-light">

<table class="table table-primary">
  <th class="scope">ID </th>
  <th class="scope">Name </th>
  <th class="scope">Owner id </th>
  <th class="scope">Creation Date </th>
  <th class="scope">Update Date </th>
  <th class="scope">Update  </th>
  <th class="scope">Delete </th>
  <tr>
    @foreach($list_carwashes as $carwash)
    <td>{{$carwash->id}} </td>
    <td>{{$carwash->name}} </td>
    <td>{{$carwash->owner_id}} </td>
    <td>{{$carwash->created_at}} </td>
    <td>{{$carwash->updated_at}} </td>
    <td><button class="btn btn-danger"> Update </button> </td>
    <td>
      <form action="{{url('/servicesmoderator/deletecarwash')}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input type="hidden" value="{{$carwash->id}}" name="id">
        <button type="submit" class="btn btn-danger"> Delete </button>
      </form>
     </td>
    @endforeach
  </tr>
</table>



</section>




@endsection
