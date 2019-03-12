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
  <th class="scope">Delete </th>
  <th class="scope">Update </th>


    @foreach($list_workshops as $workshop)
    <tr>
    <td>{{$workshop->id}} </td>
    <td>{{$workshop->name}} </td>
    <td>{{$workshop->owner_id}} </td>
    <td>{{$workshop->created_at}} </td>
    <td>{{$workshop->updated_at}} </td>
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
