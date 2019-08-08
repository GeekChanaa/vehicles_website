<!-- blog layout -->

@extends('layouts.blog')

@section('content')

<h1>
  {{$community}}
  <button class="joincommunity btn btn-primary" data-id="{{$community}}" data-userid="{{Auth::user()->id}}"> join </button>
</h1>

<section class="bg-light">
@foreach($list_posts as $post)
<div id="posts">
  <h1> <a href="{{url('/blog/community/'.$community.'/'.$post->id.'')}}"> {{$post->title}} </a> </h1>
  <!-- UPVOTE POST -->
  <button class="upvotepost" data-postid="{{$post->id}}" data-userid="{{auth::user()->id}}"> UpVote </button>
    <button class="downvotepost" data-postid="{{$post->id}}" data-userid="{{auth::user()->id}}"> DownVote </button>
    <?php $check = false; ?>
    @foreach($post->reports as $one) @if($one->user_id == Auth::user()->id) <?php $check = true; ?> @break @endif @endforeach
    <button class="btn @if($check) btn-primary unreportpost @else btn-danger reportpost @endif" data-postid="{{$post->id}}" data-userid="{{auth::user()->id}}">@if($check) unreport @else report @endif </button>
  <span> {{$post->content}} </span>

  <!-- Listing Of All Comments Of A Post -->
  @foreach($post->comments as $comment)
    <div class="comments-div" style="background-color:black;">
      {{$comment->content}}
      <button class="upvotecomment" data-commentid="{{$comment->id}}" data-userid="{{auth::user()->id}}"> UpVote </button>
      <button class="downvotecomment" data-commentid="{{$comment->id}}" data-userid="{{auth::user()->id}}"> DownVote </button>
      <?php $checkc = false; ?>
      @foreach($comment->reports as $one) @if($one->user_id == Auth::user()->id) <?php $checkc = true; ?> @break @endif @endforeach
      <button class="btn @if($checkc) btn-primary unreportcomment @else btn-danger reportcomment @endif" data-commentid="{{$comment->id}}" data-userid="{{auth::user()->id}}">@if($checkc) unreport @else report @endif </button>
    </div>

    <!-- Listing Of All Replies Of A Comment -->
    @foreach($comment->replies as $reply)
      <div class="replies-div" style="background-color:red;">
        {{$reply->content}}
        <button class="upvotereply" data-replyid="{{$reply->id}}" data-userid="{{auth::user()->id}}"> UpVote </button>
        <button class="downvotereply" data-replyid="{{$reply->id}}" data-userid="{{auth::user()->id}}"> DownVote </button>
        <?php $checkr = false; ?>
        @foreach($reply->reports as $one) @if($one->user_id == Auth::user()->id) <?php $checkr = true; ?> @break @endif @endforeach
        <button class="btn @if($checkr) btn-primary unreportreply @else btn-danger reportreply @endif" data-replyid="{{$reply->id}}" data-userid="{{auth::user()->id}}">@if($checkr) unreport @else report @endif </button>

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

<a class="btn btn-dark" href="{{url('/blog/'.$community.'/go/new_post')}}"> New Post </a>


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

          jQuery("#posts").on('click','reportPost',function(e){
            btn = $(this);
            var postid=$(this).data("postid");
            var userid=$(this).data("userid");
             e.preventDefault();
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }

            });
             jQuery.ajax({
                url: "/ajax/reportPost",
                method: 'post',
                data: {
                   postid: postid,
                   userid: userid,
                },
                success: function(result){
                  btn.removeClass('btn-danger');
                  btn.addClass('btn-primary');
                  btn.removeClass('reportpost');
                  btn.addClass('unreportpost');
                  btn.html('unreport');
                },
                error: function(jqXHR, textStatus, errorThrown){
                  swal('something went wrong','impossible','error');
              }});
          });


          jQuery("#posts").on('click','.unreportpost',function(e){
            btn = $(this);
            var postid=$(this).data("postid");
            var userid=$(this).data("userid");
             e.preventDefault();
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }

            });
             jQuery.ajax({
                url: "/ajax/unreportPost",
                method: 'delete',
                data: {
                   postid: postid,
                   userid: userid,
                },
                success: function(result){
                  btn.removeClass('btn-primary');
                  btn.addClass('btn-danger');
                  btn.removeClass('unreportpost');
                  btn.addClass('reportpost');
                  btn.html('report');
                },
                error: function(jqXHR, textStatus, errorThrown){
                  swal('something went wrong','impossible','error');
              }});
          });







           jQuery("#posts").on('click','.reportcomment',function(e){
             btn = $(this);
             var commentid=$(this).data("commentid");
             var userid=$(this).data("userid");
              e.preventDefault();
              $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                 }

             });
              jQuery.ajax({
                 url: "/ajax/reportComment",
                 method: 'post',
                 data: {
                    commentid: commentid,
                    userid: userid,
                 },
                 success: function(result){
                   btn.removeClass('btn-danger');
                   btn.addClass('btn-primary');
                   btn.removeClass('reportcomment');
                   btn.addClass('unreportcomment');
                   btn.html('unreport');
                 },
                 error: function(jqXHR, textStatus, errorThrown){
                   swal('something went wrong','impossible','error');
               }});
              });

        jQuery("#posts").on('click',".unreportcomment",function(e){
          btn = $(this);
          var commentid=$(this).data("commentid");
          var userid=$(this).data("userid");
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }

          });
           jQuery.ajax({
              url: "/ajax/unreportComment",
              method: 'delete',
              data: {
                 commentid: commentid,
                 userid: userid,
              },
              success: function(result){
                btn.removeClass('btn-primary');
                btn.addClass('btn-danger');
                btn.removeClass('unreportcomment');
                btn.addClass('reportcomment');
                btn.html('report');
              },
              error: function(jqXHR, textStatus, errorThrown){
                swal('something went wrong','impossible','error');
            }});
        });



            jQuery("#posts").on('click','.reportreply',function(e){
              btn = $(this);
              var replyid=$(this).data("replyid");
              var userid=$(this).data("userid");
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }

              });
               jQuery.ajax({
                  url: "/ajax/reportReply",
                  method: 'post',
                  data: {
                     replyid: replyid,
                     userid: userid,
                  },
                  success: function(result){
                    btn.removeClass('btn-danger');
                    btn.addClass('btn-primary');
                    btn.removeClass('reportreply');
                    btn.addClass('unreportreply');
                    btn.html('unreport');
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    swal('something went wrong','impossible','error');
                }});
               });



       jQuery("#posts").on('click','.unreportreply',function(e){
         btn = $(this);
         var replyid=$(this).data("replyid");
         var userid=$(this).data("userid");
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }

         });
          jQuery.ajax({
             url: "/ajax/unreportReply",
             method: 'delete',
             data: {
                replyid: replyid,
                userid: userid,
             },
             success: function(result){
               btn.removeClass('btn-primary');
               btn.addClass('btn-danger');
               btn.removeClass('unreportreply');
               btn.addClass('reportreply');
               btn.html('report');
             },
             error: function(jqXHR, textStatus, errorThrown){
               swal('something went wrong','impossible','error');
           }});
       });

     jQuery(".joincommunity").on('click',function(e){
       var community=$(this).data("id");
       var userid=$(this).data("userid");
        e.preventDefault();
        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }

       });
        jQuery.ajax({
           url: "/ajax/joinCommunity",
           method: 'post',
           data: {
              community: community,
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
