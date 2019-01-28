<!-- Admin Navbar (Layout) -->
@extends('layouts.admin')

@section('content')


<!-- Users Statistics -->




<!-- List Of Users with possibility of update and pagination -->
<section class="bg-light">
<div class="row col-lg-10 offset-lg-1">
<table class="table table-dark">

<thead>
  <th scope="col">ID </th>
  <th scope="col">Name </th>
  <th scope="col">Email </th>
  <th scope="col">Numero de Tel </th>
  <th scope="col">Address </th>
  <th scope="col">Rank </th>
  <th scope="col">Blog Score </th>
  <th scope="col">Subscription Date </th>
  <th scope="col">Delete</th>
</thead>
<tbody>
  @foreach($list_users as $one)
  <tr>
  <td>{{$one->id}} </td>
  <td> {{$one->name}} </td>
  <td>{{$one->email}} </td>
  <td>{{$one->num_tel}} </td>
  <td>{{$one->address}} </td>
  <td>{{$one->rank}} </td>
  <td>{{$one->blog_score}} </td>
  <td>{{$one->created_at}} </td>
  <td> <form class="" action="{{ url('/deleteuser') }}" method="post">
    {{ method_field('DELETE') }}
    {{csrf_field()}}
    <input name="id" type="hidden" value="{{$one->id}}">
    <button class="btn btn-danger" type="submit"> Bye </button>
  </form> </td>
</tr>
  @endforeach
</tbody>
</table>
</div>
</section>




<!-- Add User -->









@endsection
