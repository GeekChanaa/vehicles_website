@extends('layouts.market')



@section('content')


<section class="bg-light">

<h1> Articles Available </h1>

@foreach($list_ucp as $ucp)
<div class="row col-lg-8 offset-lg-2">
  <li><a href="{{url('/market/usedcarparts/'.$ucp->id.'')}}"> {{$ucp->id}}</a> </li>
  <li>{{$ucp->name}} </li>
  <li>{{$ucp->country}} </li>
  <li>{{$ucp->city}} </li>
  <button class="report" data-id="{{$ucp->id}}"> report </button>
  <button class="addtofav" data-id="{{$ucp->id}}"> Add To Favorite </button>
</div>


@endforeach
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
jQuery(".report").on('click',function(e){
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
              swal('deleted','NICE','success');
            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
    });
</script>




@endsection
