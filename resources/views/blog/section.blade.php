<!-- blog layout -->

@extends('layouts.blog')

@section('content')

<h1>
  {{$section}}
</h1>

<section class="bg-light">
@foreach($list_posts as $post)
<div>
  <h1> <a href="{{url('/blog/'.$section.'/'.$post->id.'')}}"> {{$post->title}} </a> </h1>
  <!-- UPVOTE POST -->
  <button class="upvotepost" data-postid="{{$post->id}}" data-userid="{{auth::user()->id}}"> UpVote </button>
    <button class="downvotepost" data-postid="{{$post->id}}" data-userid="{{auth::user()->id}}"> DownVote </button>
  <span> {{$post->content}} </span>

  <!-- Listing Of All Comments Of A Post -->
  @foreach($post->comments as $comment)
    <div style="background-color:black;">
      {{$comment->content}}
      <button class="upvotecomment" data-commentid="{{$comment->id}}" data-userid="{{auth::user()->id}}"> UpVote </button>
      <button class="downvotecomment" data-commentid="{{$comment->id}}" data-userid="{{auth::user()->id}}"> DownVote </button>
    </div>

    <!-- Listing Of All Replies Of A Comment -->
    @foreach($comment->replies as $reply)
      <div style="background-color:red;">
        {{$reply->content}}
        <button class="upvotereply" data-replyid="{{$reply->id}}" data-userid="{{auth::user()->id}}"> UpVote </button>
        <button class="downvotereply" data-replyid="{{$reply->id}}" data-userid="{{auth::user()->id}}"> DownVote </button>

      </div>
    @endforeach

      <!-- Add Reply to the comment form -->
      <h4> add reply </h4>
      @if(Auth::check())
      <form method="post" action="{{url('/blog/createreply')}}">
        {{csrf_field()}}
        <input type="hidden" name="user_id" value="{{auth::user()->id}}">
        <input type="hidden" name="comment_id" value="{{$comment->id}}">
        <input type="text" name="content">
        <button type="submit" class="btn btn-primary"> Reply </button>
      </form>

      @else
      <span> Log in to reply !!</span>
      @endif
  @endforeach



  <!-- ADD COMMENT FORM -->
      <h3> add comment </h3>
      @if(Auth::check())
      <form class="" action="{{url('/blog/createcomment')}}" method="post">
        {{csrf_field()}}
        <input type="text" name="content">
        <input type="hidden" name="user_id" value="{{auth::user()->id}}">
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <button class="btn btn-dark" type="submit"> Comment </button>
      </form>
      @else
      <span> Log in to Comment !!</span>
      @endif



</div>
@endforeach



</section>

<a class="btn btn-dark" href="{{url('/blog/'.$section.'/go/new_post')}}"> New Post </a>


<script>
jQuery(document).ready(function(){
      jQuery(".upvotepost").on('click',function(e){
        var postid=$(this).data("postid");
        var userid=$(this).data("userid");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/ajax/upvotePost",
            method: 'post',
            data: {
               postid: postid,
               userid: userid,
            },
            success: function(result){
              swal('deleted','NICE','success');
            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });


       jQuery(".upvotecomment").on('click',function(e){
         var commentid=$(this).data("commentid");
         var userid=$(this).data("userid");
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }

         });
          jQuery.ajax({
             url: "/ajax/upvoteComment",
             method: 'post',
             data: {
                commentid: commentid,
                userid: userid,
             },
             success: function(result){
               swal('deleted','NICE','success');
             },
             error: function(jqXHR, textStatus, errorThrown){
               swal('something went wrong','impossible','error');
           }});
          });


        jQuery(".upvotereply").on('click',function(e){
          var replyid=$(this).data("replyid");
          var userid=$(this).data("userid");
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }

          });
           jQuery.ajax({
              url: "/ajax/upvoteReply",
              method: 'post',
              data: {
                 replyid: replyid,
                 userid: userid,
              },
              success: function(result){
                swal('deleted','NICE','success');
              },
              error: function(jqXHR, textStatus, errorThrown){
                swal('something went wrong','impossible','error');
            }});
           });


           jQuery(".downvotepost").on('click',function(e){
             var postid=$(this).data("postid");
             var userid=$(this).data("userid");
              e.preventDefault();
              $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                 }

             });
              jQuery.ajax({
                 url: "/ajax/downvotePost",
                 method: 'post',
                 data: {
                    postid: postid,
                    userid: userid,
                 },
                 success: function(result){
                   swal('deleted','NICE','success');
                 },
                 error: function(jqXHR, textStatus, errorThrown){
                   swal('something went wrong','impossible','error');
               }});
              });


            jQuery(".downvotecomment").on('click',function(e){
              var commentid=$(this).data("commentid");
              var userid=$(this).data("userid");
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }

              });
               jQuery.ajax({
                  url: "/ajax/downvoteComment",
                  method: 'post',
                  data: {
                     commentid: commentid,
                     userid: userid,
                  },
                  success: function(result){
                    swal('deleted','NICE','success');
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    swal('something went wrong','impossible','error');
                }});
               });


             jQuery(".downvotereply").on('click',function(e){
               var replyid=$(this).data("replyid");
               var userid=$(this).data("userid");
                e.preventDefault();
                $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                   }

               });
                jQuery.ajax({
                   url: "/ajax/downvoteReply",
                   method: 'post',
                   data: {
                      replyid: replyid,
                      userid: userid,
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
