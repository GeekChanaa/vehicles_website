<!-- Admin Navbar (Layout) -->
@extends('layouts.admin')

@section('content')


<!-- Users Statistics -->




<!-- List Of Users with possibility of update and pagination -->
<section class="bg-light">
<div class="row col-lg-10" style="margin-left:2%">

<div class="row col-lg-12" style="margin-left:2%">
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
<tbody class="users-table">
  @foreach($list_users as $one)

<tr id="user{{$one->id}}">

  <td>{{$one->id}}<input type="hidden" name="id" value="{{$one->id}}"></td>
  <td> <label class="td-list-update{{$one->id}}"> {{$one->name}}</label>
      <input id="name{{$one->id}}" class="td-input-update{{$one->id}} d-n" type="text" name="name" value="{{$one->name}}" placeholder="{{$one->name}}" style="color:grey !important" >
   </td>
  <td><label class="td-list-update{{$one->id}}"> {{$one->email}}</label>
      <input id="email{{$one->id}}" class="td-input-update{{$one->id}} d-n" type="text" name="email" value="{{$one->email}}" placeholder="{{$one->email}}" style="color:grey !important" >
   </td>
  <td><label class="td-list-update{{$one->id}}"> {{$one->num_tel}}</label>
      <input id="num_tel{{$one->id}}" class="td-input-update{{$one->id}} d-n" type="text" name="num_tel" value="{{$one->num_tel}}" placeholder="{{$one->num_tel}}" style="color:grey !important" >
   </td>
  <td><label class="td-list-update{{$one->id}}"> {{$one->address}}</label>
      <input id="address{{$one->id}}" class="td-input-update{{$one->id}} d-n" type="text" name="address" value="{{$one->address}}" placeholder="{{$one->address}}" style="color:grey !important" >
   </td>
  <td><label class="td-list-update{{$one->id}}"> {{$one->rank}}</label>
      <input id="rank{{$one->id}}" class="td-input-update{{$one->id}} d-n" type="text" name="rank" value="{{$one->rank}}" placeholder="{{$one->rank}}" style="color:grey !important" >
   </td>
  <td><label class="td-list-update{{$one->id}}"> {{$one->blog_score}}</label>
      <input id="blog_score{{$one->id}}" class="td-input-update{{$one->id}} d-n" type="text" name="blog_score" value="{{$one->blog_score}}" placeholder="{{$one->blog_score}}" style="color:grey !important" >
   </td>
  <td>{{$one->created_at}}
   </td>
  <td>
     <button class="btn btn-dark submit-update" type="submit"> update </button>
  </td>
</form>

  <td>

    <input name="id" id="id{{$one->id}}" type="hidden" value="{{$one->id}}">
    <button class="btn btn-danger deleteuser" data-id="{{$one->id}}" type="submit"> Bye </button>

</td>
  <td>
    <button class="btn btn-primary" onclick="changeupdate({{$one->id}})"> Change </button>
  </td>
</tr>
  @endforeach
</tbody>
</table>

</tbody>
</table>
<div class="add-button add-user" onclick="adduser()"> <button class="btn btn-danger" style="border-radius:100%"> + </button></div>
</div>
</section>




<!-- Add User -->





<!-- Ajax Functionnalities -->
<script>
jQuery(document).ready(function(){
      jQuery(".deleteuser").on('click',function(e){
        var userid=$(this).data("id");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/deleteuser",
            method: 'delete',
            data: {
               id: $("#id"+userid).val(),
            },
            success: function(result){
              swal('deleted','NICE','success');
              $('#user'+userid).html('');
            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
      });

jQuery(document).ready(function(){
      jQuery(".updateuser").on('click',function(e){
        var userid=$(this).data("id");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/updateuser",
            method: 'post',
            data: {
               id: $("#id"+userid).val(),
               name: $("#name"+userid).val(),
               email: $("#email"+userid).val(),
               num_tel: $("#num_tel"+userid).val(),
               address: $("#address"+userid).val(),
               rank: $("#rank"+userid).val(),
               blog_score: $("#blog_score"+userid).val()
                },
            success: function(result){
              swal('Updated','NICE','success');
            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
      });

      jQuery(document).ready(function(){
            jQuery(".adduser").on('click',function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }

              });
               jQuery.ajax({
                  url: "/adduser",
                  method: 'post',
                  data: {
                     id: $("#id").val(),
                     name: $("#name").val(),
                     email: $("#email").val(),
                     num_tel: $("#num_tel").val(),
                     address: $("#address").val(),
                     rank: $("#rank").val(),
                     blog_score: $("#blog_score"+userid).val()
                      },
                  success: function(result){
                    swal('Added','NICE','success');
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    swal('something went wrong','impossible','error');
                }});
               });
            });
</script>



@endsection
