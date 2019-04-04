<!-- Admin navbar (layout) -->
@extends('layouts.admin')
@section('content')

<!-- Most Important Statistics -->





<!-- List of Workshops by users (delete and Edit and add) -->
<section class="bg-light">

<table class="table table-primary">
  <th class="scope">ID </th>
  <th class="scope">Name </th>
  <th class="scope">Owner id </th>
  <th class="scope">Creation Date </th>
  <th class="scope">Update Date </th>
  <th class="scope">Update </th>
  <th class="scope">Delete </th>



    @foreach($list_workshops as $workshop)
    <tr>
      <form class="" action="{{url('/servicesmoderator/updateworkshop')}}" method="post">
        {{csrf_field()}}
        <td><input type="text" value="{{$workshop->id}}" name="id"> </td>
        <td><input type="text" value="{{$workshop->name}}" name="name" </td>
        <td>{{$workshop->owner_id}} </td>
        <td>{{$workshop->created_at}} </td>
        <td>{{$workshop->updated_at}} </td>
        <td> <button class="btn btn-primary" type="submit"> Update </button>
      </form>

    <td>
      <!-- form delete workshop -->
      <form action="{{url('/servicesmoderator/deleteworkshop')}}" method="post">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <input type="hidden" value="{{$workshop->id}}" name="id">
        <button class="btn btn-danger"> Delete </button>
      </form>
    </td>
    <td><button class="btn btn-dark"> Update </button></td>
      </tr>
    @endforeach

</table>



</section>












@endsection
