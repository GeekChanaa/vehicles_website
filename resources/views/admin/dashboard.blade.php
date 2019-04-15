<!-- Admin Navbar (Layout) -->
@extends('layouts.admin')

@section('content')
<!-- Header -->







<!-- Most Important Statistics -->









<section class="container mx-auto">
    <!-- Routes to other Dashboards -->
  <div class="sections row">
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3" style="background:#519EF7">
        <ion-icon name="car" class="align-middle"></ion-icon>
      </div>
      <a class="col-9 btn" href="{{url('/MarketDashboard')}}"> Market Dashboard </a>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3"  style="background:#488EE2">
        <ion-icon name="quote" class="align-middle"></ion-icon>
      </div>
      <a class="col-9 btn" href="{{url('/BlogDashboard')}}"> Blog Dashboard </a>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3" style="background:#3B78BD">
        <ion-icon name="hammer" class="align-middle"></ion-icon>
      </div>
      <a class="col-9 btn" href="{{url('/ServicesDashboard')}}"> Services Dashboard </a>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3" style="background:#30629F">
        <ion-icon name="school" class="align-middle"></ion-icon>
      </div>
      <a class="col-9 btn" href="{{url('/EncyclopediaDashboard')}}"> Encyclopedia Dashboard </a>
    </div>
  </div>

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



<!-- Side Bar (LEFT) -->







<!-- Chat Window For Admins -->












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
            url: "/admin/undoneTodo",
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
            url: "/admin/doneTodo",
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
      jQuery(".delete-btn").on('click',function(e){
        var todoid=$(this).data("id");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/admin/deleteTodo",
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
                  url: "/admin/createTodo",
                  method: 'post',
                  data: {
                     content: $('#create-todo-content').val()
                      },
                  success: function(result){
                    $('.tasks-div').prepend('<div id="box-del+'+result.id+'" class="todo row"><input id="id'+result.id+'" type="hidden" value="'+result.id+'" name="id"><button class="check-btn doneTodo" data-id="'+result.id+'" type="submit"></button><input class="col-10 update-content-todo content'+result.id+'" data-id="'+result.id+'" value="'+result.content+'" disabled><button class="col-1 delete-btn" data-id="'+result.id+'" type="submit"><ion-icon name="remove-circle"></ion-icon></button></div>')
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
              url: "/admin/updatecontentTodo",
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

  jQuery(document).ready(function(){
        jQuery(".update-deadline-todo").on('blur',function(e){
          var todoid=$(this).data("id");
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }

          });
           jQuery.ajax({
              url: "/admin/updatedeadlineTodo",
              method: 'post',
              data: {
                 id: $("#id"+todoid).val(),
                 deadline: $('.deadline'+todoid).val(),
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
