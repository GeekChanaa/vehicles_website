<!-- Admin Navbar (Layout) -->
@extends('layouts.admin')

@section('content')


<!-- Users Statistics -->




<!-- List Of Users with possibility of update and pagination -->
<section class="bg-light">
<div class="row col-lg-10" style="margin-left:2%">
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
  <th scope="col">Update </th>
</thead>
<tbody>
  @foreach($list_users as $one)

<tr>
<form class="" action="{{ url('/updateuser') }}" method="post">

  <td>{{$one->id}}<input type="hidden" name="id" value="{{$one->id}}"></td>
  <td> <label class="td-list-update{{$one->id}}"> {{$one->name}}</label>
      <input class="td-input-update{{$one->id}} d-n" type="text" name="name" value="{{$one->name}}" placeholder="{{$one->name}}" style="color:grey !important" >
   </td>
  <td><label class="td-list-update{{$one->id}}"> {{$one->email}}</label>
      <input class="td-input-update{{$one->id}} d-n" type="text" name="email" value="{{$one->email}}" placeholder="{{$one->email}}" style="color:grey !important" >
   </td>
  <td><label class="td-list-update{{$one->id}}"> {{$one->num_tel}}</label>
      <input class="td-input-update{{$one->id}} d-n" type="text" name="num_tel" value="{{$one->num_tel}}" placeholder="{{$one->num_tel}}" style="color:grey !important" >
   </td>
  <td><label class="td-list-update{{$one->id}}"> {{$one->address}}</label>
      <input class="td-input-update{{$one->id}} d-n" type="text" name="address" value="{{$one->address}}" placeholder="{{$one->address}}" style="color:grey !important" >
   </td>
  <td><label class="td-list-update{{$one->id}}"> {{$one->rank}}</label>
      <input class="td-input-update{{$one->id}} d-n" type="text" name="rank" value="{{$one->rank}}" placeholder="{{$one->rank}}" style="color:grey !important" >
   </td>
  <td><label class="td-list-update{{$one->id}}"> {{$one->blog_score}}</label>
      <input class="td-input-update{{$one->id}} d-n" type="text" name="blog_score" value="{{$one->blog_score}}" placeholder="{{$one->blog_score}}" style="color:grey !important" >
   </td>
  <td>{{$one->created_at}}
   </td>
  <td>
     <button class="btn btn-dark submit-update" type="submit"> update </button>
  </td>
</form>
  <td>
  <form class="" action="{{ url('/deleteuser') }}" method="post">
    {{ method_field('DELETE') }}
    {{csrf_field()}}
    <input name="id" type="hidden" value="{{$one->id}}">
    <button class="btn btn-danger" data-id="{{$one->id}}" type="submit"> Bye </button>
  </form>
</td>
  <td>
    <button class="btn btn-primary" onclick="changeupdate({{$one->id}})"> Change </button>
  </td>
</tr>
  @endforeach
</tbody>
</table>
</div>
</section>




<!-- Add User -->









@endsection
