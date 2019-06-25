<!-- Admin Layout-->
@extends('layouts.admin')



@section('content')
<h1 class="text-center sect-title"> Posts reported by user of id : {{$user_id}}</h1>
<table class="table table-dark table-striped col-lg-10 offset-lg-1">
  <th>Post Id </th>
  <th>Content </th>
  <th>Update Date </th>
  <th>Delete </th>
  @foreach($list_posts as $post)
  <tr>
    <td>{{$post->id}} </td>
    <td>{{$post->content}} </td>
    <td>{{$post->updated_at}} </td>
  </tr>
  <td><button class="btn btn-danger delete" data-id="{{$post->id}}"> Delete </button> </td>
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
      url: "/ajax/deletePost",
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
