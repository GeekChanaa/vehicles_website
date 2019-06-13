@extends('layouts.blog')


@section('content')
<h1> Community interface </h1>
<section class="bg-light">
<div> List of members </div>
<table class="table table-primary">
  <th>Member Name </th>
  <th>Member Rank </th>
  <th>Ban Member </th>
  <tr>
    @foreach($list_members as $member)
    <td>{{$member->name}} </td>
    <td>{{$member->rank}} </td>
    <td><button class="banmember btn btn-danger" data-memberid="{{$member->id}}" data-communityid="{{$community->id}}"> Ban </button> </td>
    @endforeach
  </tr>
</table>

<form class="" action="{{url('/blog/deleteCommunity')}}" method="post">
  {{csrf_field()}}
  {{method_field('DELETE')}}
  <input type="hidden" name="id" value="{{$community->id}}">
  <button type="submit" class="btn btn-primary"> Delete Community </button>
</form>

</section>





<script>
jQuery(".banmember").on('click',function(e){
  var memberid=$(this).data("memberid");
  var communityid=$(this).data("communityid");
   e.preventDefault();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/banMember",
      method: 'delete',
      data: {
         memberid: memberid,
         communityid: communityid,
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
