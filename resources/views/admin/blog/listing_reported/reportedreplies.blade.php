<!-- Admin Layout-->
@extends('layouts.admin')



@section('content')
<h1 class="text-center sect-title"> Replies reported by user of id : {{$user_id}}</h1>
<table class="table table-dark table-striped col-lg-10 offset-lg-1">
  <th>Reply Id </th>
  <th>Content </th>
  <th>Update Date </th>
  <th>Delete </th>
  @foreach($list_replies as $reply)
  <tr>
    <td>{{$reply->id}} </td>
    <td>{{$reply->content}} </td>
    <td>{{$reply->updated_at}} </td>
  </tr>
  <td><button class="btn btn-danger delete" data-id="{{$reply->id}}"> Delete </button> </td>
  @endforeach
</table>





<script>
jQuery(".delete").on('click',function(e){
  var id=$(this).data("id");
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/deleteReply",
      method: 'delete',
      data: {
         id: id,
      },
      success: function(result){
        swal('deleted','NICE','success');
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
   });
 </script>


@endsection
