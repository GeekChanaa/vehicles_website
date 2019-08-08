@extends('layouts.market')



@section('content')


<section class="bg-light">

<h1> Articles Available </h1>
<div id="articles">
@foreach($list_nv as $nv)
<div class="row col-lg-8 offset-lg-2 articles">
  <li><a href="{{url('/market/newvehicle/'.$nv->id.'')}}"> {{$nv->id}}</a> </li>
  <li>{{$nv->name}} </li>
  <li>{{$nv->price}} </li>
  <li>{{$nv->country}} </li>
  <li>{{$nv->city}} </li>
  <?php $check = false; ?>
  @foreach($nv->reports as $one) @if($one->user_id == Auth::user()->id) <?php $check = true; ?> @break @endif @endforeach
  <button class="btn @if($check) btn-primary unreport @else btn-danger report @endif" data-id="{{$nv->id}}">@if($check) unreport @else report @endif </button>
  <button class="addtofav" data-id="{{$nv->id}}"> Add To Favorite </button>
</div>


@endforeach
</div>
{{$list_nv->links()}}
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
                  url: "/ajax/addnvfav",
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
              url: "/ajax/reportnv",
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
                url: "/ajax/unreportnv",
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
