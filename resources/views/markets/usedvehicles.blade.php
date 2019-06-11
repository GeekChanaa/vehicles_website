@extends('layouts.market')



@section('content')


<section class="bg-light">

<h1> Articles Available </h1>

@foreach($list_uv as $uv)
<div class="row col-lg-8 offset-lg-2">
  <li><a href="{{url('/market/usedvehicle/'.$uv->id.'')}}"> {{$uv->id}}</a> </li>
  <li>{{$uv->name}} </li>
  <li>{{$uv->price}} </li>
  <li>{{$uv->country}} </li>
  <li>{{$uv->city}} </li>
  <button class="report" data-id="{{$uv->id}}"> report </button>
  <button class="addtofav" data-id="{{$uv->id}}"> Add To Favorite </button>
</div>


@endforeach
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

jQuery(".report").on('click',function(e){
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
              swal('deleted','NICE','success');
            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
    });
</script>


@endsection
