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
      <h2>Website Todo</h2>
    </div>

      @foreach($list_tasks as $one)
      <!-- the tasks -->
    <div class="todo row">
      @if($one->state == 'done')
      <!-- Undone Todo -->
        <input id="id{{$one->id}}" type="hidden" value="{{$one->id}}">
        <button class="undoneTodo" data-id="{{$one->id}}" style=" background-color:red ;" type="submit"></button>
      </form>
      @else
      <!-- done Todo -->
        <input id="id{{$one->id}}" type="hidden" value="{{$one->id}}" name="id">
        <button class="doneTodo" data-id="{{$one->id}}" type="submit"></button>
       @endif

       <!-- Update Content of a Todo-->
      <input class="update-content-todo content{{$one->id}}" data-id="{{$one->id}}" value="{{$one->content}}">

      <!-- Update deadline of a Todo-->
      <input type="date" class="update-deadline-todo deadline{{$one->id}}" data-id="{{$one->id}}" placeholder="{{$one->deadline}}" value="{{$one->deadline}}">

        <button class="delete-btn" data-id="{{$one->id}}" type="submit"><ion-icon name="trash"></ion-icon></button>
    </div>
      @endforeach

      <!-- Create Todo -->
      <input id="create-todo-content" class="col-12" type="text" placeholder="Type your todo ..">
      <input id="create-todo-deadline" type="date">
      <button class="createTodo mx-auto" type="submit"><ion-icon name="add"></ion-icon></button>
  </div>

</section>



<!-- Side Bar (LEFT) -->







<!-- Chat Window For Admins -->












<!-- Ajax Functions -->
<script>

// Done Todo

jQuery(document).ready(function(){
      jQuery(".undoneTodo").on('click',function(e){
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
      jQuery(".doneTodo").on('click',function(e){
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

            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
      });

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
                     content: $('#create-todo-content').val(),
                     deadline: $('#create-todo-deadline').val(),
                      },
                  success: function(result){

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
