<!-- Admin Layout-->
@extends('layouts.admin')



@section('content')
<h1 class="text-center sect-title"> Comments reported by user of id : {{$user_id}}</h1>
<table class="table table-dark table-striped col-lg-10 offset-lg-1">
  <th>Comment Id </th>
  <th>Content </th>
  <th>Update Date </th>
  <th>Delete </th>
  @foreach($list_comments as $comment)
  <tr>
    <td>{{$comment->id}} </td>
    <td>{{$comment->content}} </td>
    <td>{{$comment->updated_at}} </td>
    <td><button class="btn btn-danger delete" data-id="{{$comment->id}}"> Delete </button> </td>
  </tr>
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
      url: "/ajax/deleteComment",
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
