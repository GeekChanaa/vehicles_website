<!-- Admin Layout -->
@extends('layouts.admin')


@section('content')

<section class="bg-dark col-lg-12">
<h1> Global Numbers </h1>
<div class="row">
  <a href="" class="btn btn-outline-primary">number of posts :<span> {{$nbr_posts['0']->sum}} </span>  </a>
  <a href="" class="btn btn-outline-primary">number of comments :<span> {{$nbr_comments['0']->sum}} </span> </a>
  <a href="" class="btn btn-outline-primary">number of replies :<span> {{$nbr_replies['0']->sum}} </span> </a>
</div>
<div class="row">
  <a href="" class="btn btn-outline-primary">Rate of posts by community :<span>{{$rate_posts_by_community}}  </span> </a>
  <a href="" class="btn btn-outline-primary">Rate of comments by post :<span>{{$rate_comments_by_post}}  </span> </a>
  <a href="" class="btn btn-outline-primary">Rate of replies by comment :<span> {{$rate_replies_by_comment}} </span> </a>
</div>
</section>

<section class="bg-light col-lg-12">
  <div class="col-lg-6 offset-lg-3 text-center">
    <div class="btn-group" role="group" aria-label="Basic example">
      <button onclick="listposts()" class="btn btn-danger">Posts</button>
      <button onclick="listcomments()" class="btn btn-danger">Comments</button>
      <button onclick="listreplies()" class="btn btn-danger">Replies</button>
    </div>
  </div>
<div class="row col-lg-8 offset-lg-2">
  <h3> List Of Posts </h3>
  <h3 class="listcomments" style="display:none;"> List Of Comments </h3>
  <h3 class="listreplies" style="display:none;"> List Of Replies </h3>

  <table class="listposts table table-dark">
    <th>Title </th>
    <th>Community </th>
    <th>Creation Date </th>
    <th>Delete </th>
    @foreach($list_posts as $post)
    <tr>
      <td>{{$post->title}} </td>
      <td>{{$post->community}} </td>
      <td>{{$post->created_at}} </td>
      <td>
        <button type="submit" class="btn btn-danger deletepost" data-id="{{$post->id}}"> Delete </button>
      </td>
    </tr>
    @endforeach
  </table>


  <table style="display:none;" class="listcomments table table-dark">
    <th>Post Id </th>
    <th>Content </th>
    <th>Creation Date </th>
    <th> Delete </th>
    @foreach($list_comments as $comment)
    <tr>
      <td>{{$comment->post_id}} </td>
      <td>{{$comment->content}} </td>
      <td>{{$comment->created_at}} </td>
      <td>
        <button type="submit" class="btn btn-danger deletecomment" data-id="{{$comment->id}}"> Delete </button>
      </td>
    </tr>
    @endforeach
  </table>


  <table style="display:none;" class="listreplies table table-dark">
    <th>Comment Id </th>
    <th>Content </th>
    <th>Creation Date </th>
    <th>Delete </th>
    @foreach($list_replies as $reply)
    <tr>
      <td>{{$reply->comment_id}} </td>
      <td>{{$reply->content}} </td>
      <td>{{$reply->created_at}} </td>
      <td>
        <button type="submit" class="btn btn-danger deletereply" data-id="{{$reply->id}}"> Delete </button>
      </td>
    </tr>
    @endforeach
  </table>
</div>
<span class="listposts">{{$list_posts->links()}} </span>
<span class="listcomments" style="display:none;">{{$list_comments->links()}} </span>
<span class="listreplies" style="display:none;">{{$list_replies->links()}} </span>
</section>



<section class="bg-light>">
  <h1> Posts Statistics and Numbers </h1>
  <div>
    <h4> Number of posts by community </h4>
    <div>
      <!-- get number by ajax -->
    </div>
    <!-- Chart Of posts By Community -->
    <div>
    </div>
  </div>
  <div>
    <canvas id="posts_chart"></canvas>
  </div>
</section>





<section>
  <h1> Comments Statistics and Numbers </h1>
  <div>
    <h4> Number of comments by community </h4>
    <div>
      <!-- get number by community ajax -->
      <!-- get number by post ajax -->
    </div>
    <!-- Chart of Comments by Community -->
    <div>
    </div>
  </div>
  <div>
    <canvas id="comments_chart"></canvas>
  </div>
</section>

<section>
  <h1> Replies Statistics and Numbers </h1>
  <div>
    <h4> Number of replies by community </h4>
    <div>
      <!-- Get number by community Ajax -->
      <!-- Get number by post Ajax -->
      <!-- Get number by reply Ajax -->
    </div>
    <!-- chart of Replies by Community -->
    <div>
    </div>
  </div>
  <div>
    <canvas id="replies_chart"></canvas>
  </div>
</section>

<script>
var c2 = document.getElementById("posts_chart");
var posts_chart = new Chart(c2, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "number of posts",
      data :['{{$nbr_recent_posts_month['1']['0']->sum}}','{{$nbr_recent_posts_month['2']['0']->sum}}','{{$nbr_recent_posts_month['3']['0']->sum}}','{{$nbr_recent_posts_month['4']['0']->sum}}','{{$nbr_recent_posts_month['5']['0']->sum}}','{{$nbr_recent_posts_month['6']['0']->sum}}','{{$nbr_recent_posts_month['7']['0']->sum}}','{{$nbr_recent_posts_month['8']['0']->sum}}','{{$nbr_recent_posts_month['9']['0']->sum}}','{{$nbr_recent_posts_month['10']['0']->sum}}','{{$nbr_recent_posts_month['11']['0']->sum}}','{{$nbr_recent_posts_month['12']['0']->sum}}'],
    }]
  },
});

var c1 = document.getElementById("comments_chart");
var comments_chart = new Chart(c1, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "number of comments",
      data :['{{$nbr_recent_comments_month['1']['0']->sum}}','{{$nbr_recent_comments_month['2']['0']->sum}}','{{$nbr_recent_comments_month['3']['0']->sum}}','{{$nbr_recent_comments_month['4']['0']->sum}}','{{$nbr_recent_comments_month['5']['0']->sum}}','{{$nbr_recent_comments_month['6']['0']->sum}}','{{$nbr_recent_comments_month['7']['0']->sum}}','{{$nbr_recent_comments_month['8']['0']->sum}}','{{$nbr_recent_comments_month['9']['0']->sum}}','{{$nbr_recent_comments_month['10']['0']->sum}}','{{$nbr_recent_comments_month['11']['0']->sum}}','{{$nbr_recent_comments_month['12']['0']->sum}}'],
    }]
  },
});

var c0 = document.getElementById("replies_chart");
var replies_chart = new Chart(c0, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "number of replies",
      data :['{{$nbr_recent_replies_month['1']['0']->sum}}','{{$nbr_recent_replies_month['2']['0']->sum}}','{{$nbr_recent_replies_month['3']['0']->sum}}','{{$nbr_recent_replies_month['4']['0']->sum}}','{{$nbr_recent_replies_month['5']['0']->sum}}','{{$nbr_recent_replies_month['6']['0']->sum}}','{{$nbr_recent_replies_month['7']['0']->sum}}','{{$nbr_recent_replies_month['8']['0']->sum}}','{{$nbr_recent_replies_month['9']['0']->sum}}','{{$nbr_recent_replies_month['10']['0']->sum}}','{{$nbr_recent_replies_month['11']['0']->sum}}','{{$nbr_recent_replies_month['12']['0']->sum}}'],
    }]
  },
});


jQuery(document).ready(function(){
      jQuery(".deletepost").on('click',function(e){
        var postid=$(this).data("id");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/ajax/deletePost",
            method: 'delete',
            data: {
               id: postid,
            },
            success: function(result){
              swal('deleted','NICE','success');
            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });


       jQuery(".deletecomment").on('click',function(e){
         var commentid=$(this).data("id");
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }

         });
          jQuery.ajax({
             url: "/ajax/deleteComment",
             method: 'delete',
             data: {
                id: commentid,
             },
             success: function(result){
               swal('deleted','NICE','success');
             },
             error: function(jqXHR, textStatus, errorThrown){
               swal('something went wrong','impossible','error');
           }});
          });

        jQuery(".deletereply").on('click',function(e){
          var replyid=$(this).data("id");
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }

          });
           jQuery.ajax({
              url: "/ajax/deleteReply",
              method: 'delete',
              data: {
                 id: replyid,
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
