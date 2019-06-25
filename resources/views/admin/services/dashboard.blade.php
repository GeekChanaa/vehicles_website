@extends('layouts.admin')
<!-- Admin Navbar (layout) -->
@section('content')
<!-- Most Important Statistics -->


<!-- Routes to other functionalities -->



<section class="content-wrapper">
  <div class="container-fluid e-container row">
    <div class="row col-12" style="justify-content:center;margin:1em 0">
      <div class="row col-lg-3 col-md-6 col-12" style="margin:0 .5em">
          <div class="e-section">
            <ion-icon name="car"></ion-icon>
            <a href="{{url('/servicesmoderator/carwashes')}}"> Carwashes </a>
            <a class="plus" href="{{url('/marketmoderator/createncp')}}"><ion-icon name="add"></ion-icon></a>
          </div>
      </div>
      <div class="row col-lg-3 col-md-6 col-12" style="margin:0 .5em">
        <div class="e-section">
          <ion-icon name="build"></ion-icon>
          <a href="{{url('/servicesmoderator/workshops')}}"> Workshops </a>
          <a class="plus" href="{{url('/marketmoderator/createncp')}}"><ion-icon name="add"></ion-icon></a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Todo List -->
<div class="todos col-sm-12 col-md-8 col-lg-6">
  <div class="row todo-heading">
    <ion-icon name="menu"></ion-icon>
    <h2 class="col-10">Website Todo</h2>
  </div>


<div class="tasks-div" id="todo-list">
    @foreach($list_undone_tasks as $one)
    <!-- the tasks -->
    <div id="box-del{{$one->id}}" class="todo row">

      <input id="id{{$one->id}}" type="hidden" value="{{$one->id}}" name="id">
      <button class="check-btn doneTodo" data-id="{{$one->id}}" type="submit"></button>

     <!-- Update Content of a Todo-->
      <input class="col-10 {{$one->state=='done'?'done':''}} update-content-todo content{{$one->id}}" data-id="{{$one->id}}" value="{{$one->content}}">
      <!-- The user in charge of the task -->
      <button> {{$one->User_inchargeof->name}} <div class="todo-incharge" style="background-image: url('{{asset('storage/users_pdp/'.$one->User_inchargeof->num_tel.'.jpg')}}')" ></div></button>

      <button class="col-1 delete-btn" data-id="{{$one->id}}" type="submit"><ion-icon name="remove-circle"></ion-icon></button>
    </div>
    @endforeach


    @foreach($list_done_tasks as $one)
    <!-- the tasks -->
    <div id="box-del{{$one->id}}" class="todo row">
    <!-- Undone Todo -->
      <input id="id{{$one->id}}" type="hidden" value="{{$one->id}}">
      <button class="check-btn undoneTodo" data-id="{{$one->id}}" type="submit"></button>
    <!-- Update Content of a Todo-->
      <input class="col-10 {{$one->state=='done'?'done':''}} update-content-todo content{{$one->id}}" data-id="{{$one->id}}" value="{{$one->content}}" >
      <!-- The user in charge of the task -->
      <button> {{$one->User_inchargeof->name}} <div class="todo-incharge" style="background-image: url('{{asset('storage/users_pdp/'.$one->User_inchargeof->num_tel.'.jpg')}}')" ></div></button>

      <button class="col-1 delete-btn" data-id="{{$one->id}}" type="submit"><ion-icon name="remove-circle"></ion-icon></button>
    </div>
    @endforeach
</div>

    <!-- Create Todo -->
    <div class="add-todo">
      <input id="create-todo-content" class="col-12" type="text" placeholder="Type your todo ..">
      <input type="date" id="create-todo-date">
      @foreach($list_servicesm as $servicesm)
      <option value="{{$servicesm->id}}">{{$servicesm->name}}</option>
      @endforeach
      <div class="underline"></div>
      <button class="createTodo mx-auto" type="submit"><ion-icon name="add"></ion-icon></button>
    </div>
</div>




<!-- Ajax Functions -->
<script>

// Done Todo

jQuery(document).ready(function(){
        jQuery("#todo-list").on('click','.doneTodo',function(e){
        var todoid=$(this).data("id");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/admin/undoneTask",
            method: 'post',
            data: {
               id: $("#id"+todoid).val(),
                },
            success: function(result){

            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
      });

// Undone Todo

jQuery(document).ready(function(){
      jQuery("#todo-list").on('click','.undoneTodo',function(e){
        var todoid=$(this).data("id");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/admin/doneTask",
            method: 'post',
            data: {
               id: $("#id"+todoid).val(),
                },
            success: function(result){

            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
      });

// Delete Todo

jQuery(document).ready(function(){
      jQuery("#todo-list").on('click','.delete-btn',function(e){
        var todoid=$(this).data("id");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/admin/deleteTask",
            method: 'delete',
            data: {
               id: $("#id"+todoid).val(),
            },
            success: function(result){
              $('#box-del'+todoid).html('').remove();
            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
      });

// Add todo
      jQuery(document).ready(function(){
            jQuery(".createTodo").on('click',function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }

              });
               jQuery.ajax({
                  url: "/admin/createTask",
                  method: 'post',
                  data: {
                     content: $('#create-todo-content').val(),
                     date : $('#create-todo-date').val(),
                     section: 'Services',
                      },
                  success: function(result){
                    $('.tasks-div').prepend('<div id="box-del'+result.id+'" class="todo row"><input id="id'+result.id+'" type="hidden" value="'+result.id+'" name="id"><button class="check-btn doneTodo" data-id="'+result.id+'" type="submit"></button><input class="col-10 update-content-todo content'+result.id+'" data-id="'+result.id+'" value="'+result.content+'" ><button class="col-1 delete-btn" data-id="'+result.id+'" type="submit"><ion-icon name="remove-circle"></ion-icon></button></div>')
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    swal('something went wrong','impossible','error');
                }});
               });
            });

  jQuery(document).ready(function(){
        jQuery(".update-content-todo").on('blur',function(e){
          var todoid=$(this).data("id");
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }

          });
           jQuery.ajax({
              url: "/admin/updatecontentTask",
              method: 'post',
              data: {
                 id: $("#id"+todoid).val(),
                 content: $('.content'+todoid).val(),
                  },
              success: function(result){
              },
              error: function(jqXHR, textStatus, errorThrown){
                swal('something went wrong','impossible','error');
            }});
           });
        });


</script>








@endsection
