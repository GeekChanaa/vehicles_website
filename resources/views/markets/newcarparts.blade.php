@extends('layouts.market')



@section('content')


<section class="bg-light">

<h1> Articles Available </h1>

@foreach($list_ncp as $ncp)
<div class="row col-lg-8 offset-lg-2">
  <li><a href="{{url('/market/newcarparts/'.$ncp->id.'')}}"> {{$ncp->id}} </a></li>
  <li>{{$ncp->name}} </li>
  <li>{{$ncp->country}} </li>
  <li>{{$ncp->city}} </li>
  <button class="report" data-id="{{$ncp->id}}"> report </button>
  <button class="addtofav" data-id="{{$ncp->id}}"> Add To Favorite </button>
</div>



@endforeach
{{$list_ncp->links()}}
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
                  url: "/ajax/addncpfav",
                  method: 'post',
                  data: {
                     id: articleid,
                  },
                  success: function(result){
                    swal('deleted','NICE','success');
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    swal('something went wrong','impossible','error');
                }});
               });

jQuery(".report").on('click',function(e){
         var articleid=$(this).data("id");
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }

         });
          jQuery.ajax({
             url: "/ajax/reportncp",
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
    });
</script>



@endsection
