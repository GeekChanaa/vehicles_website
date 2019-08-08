@extends('layouts.market')



@section('content')


<section class="bg-light">

<h1> Articles Available </h1>
<div id="articles">
@foreach($list_ucp as $ucp)
<div class="row col-lg-8 offset-lg-2 articles">
  <li><a href="{{url('/market/usedcarpart/'.$ucp->id.'')}}"> {{$ucp->id}}</a> </li>
  <li>{{$ucp->name}} </li>
  <li>{{$ucp->price}} </li>
  <li>{{$ucp->country}} </li>
  <li>{{$ucp->city}} </li>
  <?php $check = false; ?>
  @foreach($ucp->reports as $one) @if($one->user_id == Auth::user()->id) <?php $check = true; ?> @break @endif @endforeach
  <button class="btn @if($check) btn-primary unreport @else btn-danger report @endif" data-id="{{$ucp->id}}">@if($check) unreport @else report @endif </button>
  <button class="addtofav" data-id="{{$ucp->id}}"> Add To Favorite </button>
</div>


@endforeach
</div>
{{$list_ucp->links()}}
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
                  url: "/ajax/adducpfav",
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
                 url: "/ajax/reportucp",
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
             url: "/ajax/unreportucp",
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
