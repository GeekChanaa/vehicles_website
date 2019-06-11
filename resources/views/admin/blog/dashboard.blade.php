@extends('layouts.admin')

@section('content')

<!-- Admin Navbar (Layout) -->



<!-- Global Statistics -->



<!-- Routes for other blog Dashboards -->

<section class="content-wrapper">
  <!--  Container -->
  <div class="container-fluid e-container row">
    <div class="row col-12" style="justify-content:center;margin:1em 0">
      <!--  Posts -->
      <div class="row col-lg-3 col-md-6 col-12" style="margin:0 .5em">
          <div class="e-section">
            <ion-icon name="list-box"></ion-icon>
            <a href="{{url('/blogmoderator/posts')}}"> Posts </a>
            <a class="plus" href="{{url('/blogmoderator/addpost')}}"><ion-icon name="add"></ion-icon></a>
          </div>
      </div>
      <!-- Sections -->
      <div class="row col-lg-3 col-md-6 col-12" style="margin:0 .5em">
        <div class="e-section">
          <ion-icon name="apps"></ion-icon>
          <a href="{{url('/blogmoderator/sections')}}"> Sections </a>
          <a class="plus" href="{{url('/blogmoderator/addsection')}}"><ion-icon name="add"></ion-icon></a>
        </div>
      </div>
    </div>
  </div>
  <!-- <a class="col-lg-3 btn btn-danger"  href="{{url('/blogmoderator/statistics')}}"> Statistics </a> -->

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
        <input class="col-10 {{$one->state=='done'?'done':''}} update-content-todo content{{$one->id}}" data-id="{{$one->id}}" value="{{$one->content}}" disabled>

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
        <input class="col-10 {{$one->state=='done'?'done':''}} update-content-todo content{{$one->id}}" data-id="{{$one->id}}" value="{{$one->content}}" disabled>

        <button class="col-1 delete-btn" data-id="{{$one->id}}" type="submit"><ion-icon name="remove-circle"></ion-icon></button>
      </div>
      @endforeach
    </div>

    <!-- Create Todo -->
    <div class="add-todo">
      <input id="create-todo-content" class="col-12" type="text" placeholder="Type your todo ..">
      <div class="underline"></div>
      <button class="createTodo mx-auto" type="submit"><ion-icon name="add"></ion-icon></button>
    </div>
  </div>
</section>



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
                     section: 'Blog',
                      },
                  success: function(result){
                    $('.tasks-div').prepend('<div id="box-del'+result.id+'" class="todo row"><input id="id'+result.id+'" type="hidden" value="'+result.id+'" name="id"><button class="check-btn doneTodo" data-id="'+result.id+'" type="submit"></button><input class="col-10 update-content-todo content'+result.id+'" data-id="'+result.id+'" value="'+result.content+'" disabled><button class="col-1 delete-btn" data-id="'+result.id+'" type="submit"><ion-icon name="remove-circle"></ion-icon></button></div>')
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



<!-- Chat Window Between Moderators -->





@endsection
