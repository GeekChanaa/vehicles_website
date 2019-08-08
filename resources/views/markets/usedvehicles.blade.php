@extends('layouts.market')



@section('content')


<section class="bg-light">

<h1> Articles Available </h1>
<div id="articles">
@foreach($list_uv as $uv)
<div class="row col-lg-8 offset-lg-2 articles">
  <li><a href="{{url('/market/usedvehicle/'.$uv->id.'')}}"> {{$uv->id}}</a> </li>
  <li>{{$uv->name}} </li>
  <li>{{$uv->price}} </li>
  <li>{{$uv->country}} </li>
  <li>{{$uv->city}} </li>
  <?php $check = false; ?>
  @foreach($uv->reports as $one) @if($one->user_id == Auth::user()->id) <?php $check = true; ?> @break @endif @endforeach
  <button class="btn @if($check) btn-primary unreport @else btn-danger report @endif" data-id="{{$uv->id}}">@if($check) unreport @else report @endif </button>
  <button class="addtofav" data-id="{{$uv->id}}"> Add To Favorite </button>
</div>


@endforeach
</div>
{{$list_uv->links()}}
</section>



<script>
jQuery(document).ready(function(){
  jQuery(".addtofav").on('click',function(e){
              var articleid=$(this).data("id");
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }

              });
               jQuery.ajax({
                  url: "/ajax/adduvfav",
                  method: 'post',
                  data: {
                     articleid: articleid,
                  },
                  success: function(result){
                    swal('deleted','NICE','success');
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    swal('something went wrong','impossible','error');
                }});
               });

    jQuery("#articles").on('click','.report',function(e){
             report_btn = $(this);
             var articleid=$(this).data("id");
              e.preventDefault();
              $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                 }

             });
              jQuery.ajax({
                 url: "/ajax/reportuv",
                 method: 'post',
                 data: {
                    id: articleid,
                 },
                 success: function(result){
                   report_btn.removeClass('btn-danger');
                   report_btn.addClass('btn-primary');
                   report_btn.removeClass('report');
                   report_btn.addClass('unreport');
                   report_btn.html('unreport');
                 },
                 error: function(jqXHR, textStatus, errorThrown){
                   swal('something went wrong','impossible','error');
               }});
              });
jQuery("#articles").on('click','.unreport',function(e){
         unreport_btn = $(this);
         var articleid=$(this).data("id");
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }

         });
          jQuery.ajax({
             url: "/ajax/unreportuv",
             method: 'delete',
             data: {
                articleid: articleid,
             },
             success: function(result){
               unreport_btn.removeClass('btn-primary');
               unreport_btn.addClass('btn-danger');
               unreport_btn.addClass('report');
               unreport_btn.removeClass('unreport');
               unreport_btn.html('report');
             },
             error: function(jqXHR, textStatus, errorThrown){
               swal('something went wrong','impossible','error');
           }});
          });
 });
</script>


@endsection
