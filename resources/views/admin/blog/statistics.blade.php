<!-- Admin Layout -->
@extends('layouts.admin')


@section('content')

<section class="col-lg-12" style="background-color:#bcd2f4;height:80vh;padding-top:4%;padding-bottom:4%;">
<h1 class="col-lg-12 text-center sect-title"> Global Numbers </h1>
<div class="row col-lg-12" style="margin-top:2%;">
  <div class="col-lg-2 offset-lg-1 stat-card">
    <div class="col-lg-12 stat-card-title text-center">
        Number of Posts
    </div>
    <div class="col-lg-8 offset-lg-2 text-center stat-card-nbr" style="background-image:url('{{asset('/img/dashboard/posts.png')}}');">
      <span> {{$nbr_posts['0']->sum}} </span>
    </div>
  </div>
  <div class="col-lg-2 offset-lg-2 stat-card">
    <div class="col-lg-12 stat-card-title text-center">
        Number of Comments
    </div>
    <div class="col-lg-8 offset-lg-2 text-center stat-card-nbr" style="background-image:url('{{asset('/img/dashboard/comments.png')}}');">
        <span> {{$nbr_comments['0']->sum}} </span>
    </div>
  </div>
  <div class="col-lg-2 offset-lg-2 stat-card">
    <div class="col-lg-12 stat-card-title text-center">
        Number of Replies
    </div>
    <div class="col-lg-8 offset-lg-2 text-center stat-card-nbr" style="background-image:url('{{asset('/img/dashboard/replies.png')}}');">
        <span> {{$nbr_replies['0']->sum}} </span>
    </div>
  </div>
</div>
<div class="row col-lg-12" style="margin-top:2%;">
  <div class="col-lg-2 offset-lg-1 stat-card">
    <div class="col-lg-12 stat-card-titlee text-center">
        Rate of posts by community
    </div>
    <div class="col-lg-8 offset-lg-2 text-center stat-card-nbr" style="background-image:url('{{asset('/img/dashboard/postsr.png')}}');">
      <span> {{$rate_posts_by_community}}  </span>
    </div>
  </div>
  <div class="col-lg-2 offset-lg-2 stat-card">
    <div class="col-lg-12 stat-card-titlee text-center">
        Rate of comments by post
    </div>
    <div class="col-lg-8 offset-lg-2 text-center stat-card-nbr" style="background-image:url('{{asset('/img/dashboard/commentsr.png')}}');">
        <span> {{$rate_comments_by_post}}   </span>
    </div>
  </div>
  <div class="col-lg-2 offset-lg-2 stat-card">
    <div class="col-lg-12 stat-card-titlee text-center">
        Rate of replies by comment
    </div>
    <div class="col-lg-8 offset-lg-2 text-center stat-card-nbr" style="background-image:url('{{asset('/img/dashboard/repliesr.png')}}');">
        <span> {{$rate_replies_by_comment}}  </span>
    </div>
  </div>
</div>
</section>

<section class="bg-dark col-lg-12" style="padding-top:4%;padding-bottom:4%">
  <div class="col-lg-6 offset-lg-3 text-center" style="padding-bottom:3%;">
    <div class="btn-group" role="group" aria-label="Basic example">
      <button onclick="listposts()" class="btn btn-danger">Posts</button>
      <button onclick="listcomments()" class="btn btn-danger">Comments</button>
      <button onclick="listreplies()" class="btn btn-danger">Replies</button>
    </div>
  </div>
<div class="row col-lg-8 offset-lg-2 text-center">


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



<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
  <h1 class="text-center sect-title"> Posts Statistics and Numbers </h1>
  <div>
    <div>
      <!-- get number by ajax -->
    </div>
    <!-- Chart Of posts By Community -->
    <div class="row">

      <div class="col-lg-6">
        <canvas id="postsbycommunity_chart" height="200vh"></canvas>
      </div>

      <div class="col-lg-6 text-center">
        <span class="chart-description-title">Number of Posts By Community</span> </br>
      </div>

    </div>


  </div>
  <div class="row col-lg-12" style="height:60vh;">
    <div class="col-lg-6 text-center">
      <span class="chart-description-title">Number of Posts</span> </br>
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Year</button>
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">2019</a>
          <a class="dropdown-item" href="#">2018</a>
          <a class="dropdown-item" href="#">2017</a>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <canvas id="posts_chart" height="200vh"></canvas>
    </div>
  </div>

</section>
<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
  <div class="row">

    <!-- Get number of posts by day -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Day </div>
      <div class="row"><input type="date" class="yearmonthday col-lg-5 offset-lg-2"> <button id="get_nbr_posts_by_day" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="col-lg-8 text-center offset-lg-2" style="margin-top:3%;">

      </div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
        <span id="nbrPostsByDay">
        </span>
      </div>
    </div>
    <!-- Get number of posts by month -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Month </div>
        <div class="row"><input type="text" class="yearmonth col-lg-5">
        <input type="text" class="month col-lg-5"> <button id="get_nbr_posts_by_month" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrPostsByMonth">
          </span>
      </div>
    </div>
    <!-- Get number of posts by year -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Year </div>
      <div class="row"><input type="text" class="year col-lg-5 offset-lg-2"> <button id="get_nbr_posts_by_year" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrPostsByYear">
          </span>
      </div>
    </div>


  </div>
</section>




<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
  <h1 class="text-center sect-title" style="color:white !important"> Comments Statistics and Numbers </h1>
  <div>
    <div>
      <!-- get number by community ajax -->
      <!-- get number by post ajax -->
    </div>
    <!-- Chart of Comments by Community -->
    <div class="row">
      <div class="col-lg-6">
        <canvas id="commentsbycommunity_chart" height="200vh"></canvas>
      </div>

      <div class="col-lg-6">
        <span class="chart-description-title" style="color:white !important">Comments By Community</span> </br>
      </div>
    </div>
  </div>
  <div class="row col-lg-12" style="height:60vh;">
    <div class="col-lg-6 text-center">
      <span class="chart-description-title" style="color:white !important"> Number of Comments</span> </br>
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Year</button>
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </button>
        <div class="dropdown-menu">
          <button class="dropdown-item" href="#">2019</button>
          <button class="dropdown-item" href="#">2018</button>
          <button class="dropdown-item" href="#">2017</button>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <canvas id="comments_chart" height="200vh"></canvas>
    </div>
  </div>
</section>

<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
  <div class="row">

    <!-- Get number of comments by day -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div" style="color:white !important"> By Day </div>
      <div class="row"><input type="date" class="cyearmonthday col-lg-5 offset-lg-2"> <button id="get_nbr_comments_by_day" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="col-lg-8 text-center offset-lg-2" style="margin-top:3%;">

      </div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
        <span id="nbrCommentsByDay">
        </span>
      </div>
    </div>
    <!-- Get number of comments by month -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div" style="color:white !important"> By Month </div>
        <div class="row"><input type="text" class="cyearmonth col-lg-5">
        <input type="text" class="cmonth col-lg-5"> <button id="get_nbr_comments_by_month" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrCommentsByMonth">
          </span>
      </div>
    </div>
    <!-- Get number of comments by year -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div" style="color:white !important"> By Year </div>
      <div class="row"><input type="text" class="cyear col-lg-5 offset-lg-2"> <button id="get_nbr_comments_by_year" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrCommentsByYear">
          </span>
      </div>
    </div>


  </div>
</section>




<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
  <h1 class="text-center sect-title"> Replies Statistics and Numbers </h1>
  <div>
    <h4 class="text-center sect-subtitle"> Number of replies </h4>
    <div class="row">

      <!-- Get number by community Ajax -->
      <div class="col-lg-6">
        <div class="col-lg-12 text-center by_div"> By Community </div>
        <input class="col-lg-8 offset-lg-2" id="livesearchCommunities" onkeyup="livesearchCommunities()">
        <div class="col-lg-8 text-center offset-lg-2" style="margin-top:3%;">
          <div class="btn-group col-lg-12">
            <button type="button" class="btn btn-primary">Community</button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div id="communities" class="dropdown-menu">
            </div>
          </div>
        </div>
        <div class="row text-center col-lg-3 offset-lg-5 circle_nbr_div">
          <span id="nbrRepliesByCommunityResult">
          </span>
        </div>
      </div>
      <!-- Get number by post Ajax -->
      <div class="col-lg-6">
        <div class="col-lg-12 text-center by_div"> By Post </div>
        <input class="col-lg-8 offset-lg-2" id="livesearchPosts" onkeyup="livesearchPosts()">
        <div class="col-lg-8 text-center offset-lg-2" style="margin-top:3%;">
          <div class="btn-group col-lg-12">
            <button type="button" class="btn btn-primary">Post</button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div id="posts" class="dropdown-menu">
            </div>

          </div>
        </div>
        <div class="row text-center col-lg-3 offset-lg-5 circle_nbr_div">
            <span id="nbrRepliesByPostResult">
            </span>
        </div>
      </div>


    </div>
    <!-- chart of Replies by Community -->
    <div class="row">
      <div class="col-lg-6">
        <canvas id="repliesbycommunity_chart" height="200vh"></canvas>
      </div>

      <div class="col-lg-6">
        <span class="chart-description-title">Number of Replies By Community</span> </br>
      </div>
    </div>
  </div>

  <div class="row col-lg-12" style="height:60vh;">
    <div class="col-lg-6 text-center">
      <span class="chart-description-title">Number of Replies</span> </br>
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Year</button>
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">2019</a>
          <a class="dropdown-item" href="#">2018</a>
          <a class="dropdown-item" href="#">2017</a>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <canvas id="replies_chart" height="200vh"></canvas>
    </div>
  </div>
</section>

<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
  <div class="row">

    <!-- Get number of replies by day -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Day </div>
      <div class="row"><input type="date" class="ryearmonthday col-lg-5 offset-lg-2"> <button id="get_nbr_replies_by_day" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="col-lg-8 text-center offset-lg-2" style="margin-top:3%;">

      </div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
        <span id="nbrRepliesByDay">
        </span>
      </div>
    </div>
    <!-- Get number of replies by month -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Month </div>
        <div class="row"><input type="text" class="ryearmonth col-lg-5">
        <input type="text" class="rmonth col-lg-5"> <button id="get_nbr_replies_by_month" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrRepliesByMonth">
          </span>
      </div>
    </div>
    <!-- Get number of replies by year -->
    <div class="col-lg-4">
      <div class="col-lg-12 text-center by_div"> By Year </div>
      <div class="row"><input type="text" class="ryear col-lg-5 offset-lg-2"> <button id="get_nbr_replies_by_year" class="col-lg-2 btn btn-primary">Go</button></div>
      <div class="row text-center col-lg-4 offset-lg-4 circle_nbr_div">
          <span id="nbrRepliesByYear">
          </span>
      </div>
    </div>


  </div>
</section>




<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
<!-- Most reported Posts -->
<h4 class="text-center sect-subtitle" style="color:white !important"> Most Reported Posts </h4>
<table class="table table-striped table-primary col-lg-8 offset-lg-2">
  <th>Post </th>
  <th>Number of Reports </th>
  <th>Remove Post </th>
  @foreach($most_reported_posts as $report)
  <tr>
    <td>{{$report->post_id}}  </td>
    <td>{{$report->total}}  </td>
    <td><button class="btn btn-danger deletepost" data-id="{{$report->post_id}}"> Remove </button> </td>
  </tr>
  @endforeach
</table>
<!-- Most Reported Comments -->
<table class="table table-striped table-primary col-lg-8 offset-lg-2">
  <th>Comment </th>
  <th>Number of Reports  </th>
  <th>Delete Comments </th>
      @foreach($most_reported_comments as $reported)
  <tr>
    <td>{{$reported->comment_id}} </td>
    <td>{{$reported->total}} </td>
    <td><button class="btn btn-danger deletecomment" data-id="{{$reported->comment_id}}"> Remove </button> </td>
  </tr>
      @endforeach
</table>
<!-- Most Reported Replies -->
<table class="table table-striped table-primary col-lg-8 offset-lg-2">
  <th>Reply </th>
  <th>Number of Reports  </th>
  <th>Delete Replies </th>
  @foreach($most_reported_replies as $reported)
  <tr>
    <td>{{$reported->reply_id}} </td>
    <td>{{$reported->total}} </td>
    <td><button class="btn btn-danger deletereply" data-id="{{$reported->reply_id}}"> Remove </button> </td>
  </tr>
  @endforeach
</table>
</section>

<section class="bg-dark" style="padding-top:4%;padding-bottom:4%">
<!-- Most Reporting Posts Users (with routing to the posts reported) -->
<h4 class="text-center sect-subtitle"> Most Reporting Users</h4>
<table class="table table-striped table-primary col-lg-8 offset-lg-2">
  <th>User </th>
  <th>Number of Reports </th>
  <th> List Posts </th>
  @foreach($posts_mru as $report)
  <tr>
    <td>{{$report->user_id}}</td>
    <td>{{$report->nbr}}</td>
    <td><a href="{{url('/blogmoderator/reportedposts/'.$report->user_id.'')}}" class="btn btn-primary">List Posts</a></td>
  </tr>
  @endforeach
</table>
<!-- Most Reporting Comments Users (with routing to the posts of the comments reported) -->
<table class="table table-striped table-primary col-lg-8 offset-lg-2">
  <th>User  </th>
  <th>Number of Reports  </th>
  <th>List Comments </th>
  @foreach($comments_mru as $report)
  <tr>
    <td>{{$report->user_id}} </td>
    <td>{{$report->nbr}} </td>
    <td><a href="{{url('/blogmoderator/reportedcomments/'.$report->user_id.'')}}" class="btn btn-primary">List Comments</a></td>
  </tr>
  @endforeach
</table>
<!-- Most Reporting Replies Users (with routing to the posts of the replies reported) -->
<table class="table table-striped table-primary col-lg-8 offset-lg-2">
  <th>User</th>
  <th>Number of Reports</th>
  <th>List Replies </th>
  @foreach($replies_mru as $report)
  <tr>
    <td>{{$report->user_id}} </td>
    <td>{{$report->nbr}} </td>
    <td><a href="{{url('/blogmoderator/reportedreplies/'.$report->user_id.'')}}" class="btn btn-primary">List Replies</a></td>
  </tr>
  @endforeach
</table>
</section>










<script>
// CHART POSTS BY COMMUNITY
var cx1 = document.getElementById("postsbycommunity_chart");
var posts_chart = new Chart(cx1, {
  type : 'pie',
  data : {
    labels : ['none' @foreach($list_communities as $community) ,'{{$community->title}}' @endforeach],
    datasets: [{
      label : "number of posts",
      data :[0 @foreach($posts_by_community_array as $nbr) ,{{$nbr}} @endforeach],
      backgroundColor: '#5d9afc',
    }],
  },
});

// CHART COMMENTS BY COMMUNITY
var cx2 = document.getElementById("commentsbycommunity_chart");
var comments_chart = new Chart(cx2, {
  type : 'pie',
  options : {
    legend: {
      labels: {
          fontColor: "white",
      }
    }
  },
  data : {
    labels : ['none' @foreach($list_communities as $community) ,'{{$community->title}}' @endforeach],
    datasets: [{
      label : "number of comments",
      data :[0 @foreach($comments_by_community_array as $nbr) ,{{$nbr}} @endforeach],
      backgroundColor: '#5d9afc',
    }],
  },
});

// CHART REPLIES BY COMMUNITY
var cx3 = document.getElementById("repliesbycommunity_chart");
var replies_chart = new Chart(cx3, {
  type : 'pie',
  data : {
    labels : ['none' @foreach($list_communities as $community) ,'{{$community->title}}' @endforeach],
    datasets: [{
      label : "number of replies",
      data :[0 @foreach($replies_by_community_array as $nbr) ,{{$nbr}} @endforeach],
      backgroundColor: '#5d9afc',
    }],
  },
});



var c2 = document.getElementById("posts_chart");
var posts_chart = new Chart(c2, {
  type : 'line',
  options : {
    scales: {
        xAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
            ticks : {
              fontColor: 'white'
            },
        }],
        yAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
            ticks : {
              fontColor: 'white'
            },
        }]
    },
  },
  data : {
    labels : ["@lang('msg.m01')","@lang('msg.m02')","@lang('msg.m03')","@lang('msg.m04')","@lang('msg.m05')","@lang('msg.m06')","@lang('msg.m07')","@lang('msg.m08')","@lang('msg.m09')","@lang('msg.m10')","@lang('msg.m11')","@lang('msg.m12')"],
    datasets: [{
      label : "number of posts",
      data :['{{$nbr_recent_posts_month['1']['0']->sum}}','{{$nbr_recent_posts_month['2']['0']->sum}}','{{$nbr_recent_posts_month['3']['0']->sum}}','{{$nbr_recent_posts_month['4']['0']->sum}}','{{$nbr_recent_posts_month['5']['0']->sum}}','{{$nbr_recent_posts_month['6']['0']->sum}}','{{$nbr_recent_posts_month['7']['0']->sum}}','{{$nbr_recent_posts_month['8']['0']->sum}}','{{$nbr_recent_posts_month['9']['0']->sum}}','{{$nbr_recent_posts_month['10']['0']->sum}}','{{$nbr_recent_posts_month['11']['0']->sum}}','{{$nbr_recent_posts_month['12']['0']->sum}}'],
      backgroundColor: '#5d9afc',
    }],
  },
});

var c1 = document.getElementById("comments_chart");
var comments_chart = new Chart(c1, {
  type : 'line',
  options : {
    legend: {
      labels: {
          fontColor: "white",
      }
    },
    scales: {
        xAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
            ticks : {
              fontColor: 'white'
            },
        }],
        yAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
            ticks : {
              fontColor: 'white',
            },
        }]
    },
  },
  data : {
    labels : ["@lang('msg.m01')","@lang('msg.m02')","@lang('msg.m03')","@lang('msg.m04')","@lang('msg.m05')","@lang('msg.m06')","@lang('msg.m07')","@lang('msg.m08')","@lang('msg.m09')","@lang('msg.m10')","@lang('msg.m11')","@lang('msg.m12')"],
    datasets: [{
      label : "number of comments",
      data :['{{$nbr_recent_comments_month['1']['0']->sum}}','{{$nbr_recent_comments_month['2']['0']->sum}}','{{$nbr_recent_comments_month['3']['0']->sum}}','{{$nbr_recent_comments_month['4']['0']->sum}}','{{$nbr_recent_comments_month['5']['0']->sum}}','{{$nbr_recent_comments_month['6']['0']->sum}}','{{$nbr_recent_comments_month['7']['0']->sum}}','{{$nbr_recent_comments_month['8']['0']->sum}}','{{$nbr_recent_comments_month['9']['0']->sum}}','{{$nbr_recent_comments_month['10']['0']->sum}}','{{$nbr_recent_comments_month['11']['0']->sum}}','{{$nbr_recent_comments_month['12']['0']->sum}}'],
      backgroundColor: '#5d9afc',
    }]
  },
});

var c0 = document.getElementById("replies_chart");
var replies_chart = new Chart(c0, {
  type : 'line',
  options : {
    scales: {
        xAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
            ticks : {
              fontColor: 'white'
            },
        }],
        yAxes: [{
            gridLines: {
                color: "rgba(0, 0, 0, 0)",
            },
            ticks : {
              fontColor: 'white'
            },
        }]
    },
  },
  data : {
    labels : ["@lang('msg.m01')","@lang('msg.m02')","@lang('msg.m03')","@lang('msg.m04')","@lang('msg.m05')","@lang('msg.m06')","@lang('msg.m07')","@lang('msg.m08')","@lang('msg.m09')","@lang('msg.m10')","@lang('msg.m11')","@lang('msg.m12')"],
    datasets: [{
      label : "number of replies",
      data :['{{$nbr_recent_replies_month['1']['0']->sum}}','{{$nbr_recent_replies_month['2']['0']->sum}}','{{$nbr_recent_replies_month['3']['0']->sum}}','{{$nbr_recent_replies_month['4']['0']->sum}}','{{$nbr_recent_replies_month['5']['0']->sum}}','{{$nbr_recent_replies_month['6']['0']->sum}}','{{$nbr_recent_replies_month['7']['0']->sum}}','{{$nbr_recent_replies_month['8']['0']->sum}}','{{$nbr_recent_replies_month['9']['0']->sum}}','{{$nbr_recent_replies_month['10']['0']->sum}}','{{$nbr_recent_replies_month['11']['0']->sum}}','{{$nbr_recent_replies_month['12']['0']->sum}}'],
      backgroundColor: '#5d9afc',
    }]
  },
});




 jQuery("#get_nbr_posts_by_year").on('click',function(e){
   var year=$('.year').val();
    e.preventDefault();
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       }

   });
    jQuery.ajax({
       url: "/ajax/NbrPostsByYear",
       method: 'get',
       data: {
         year : year,
       },
       success: function(result){
         anime({
           targets: '#nbrPostsByYear',
           innerHTML: [0, result.nbr],
           easing: 'linear',
           duration : 400,
           round: 10 // Will round the animated value to 1 decimal
         });  },
       error: function(jqXHR, textStatus, errorThrown){
         swal('something went wrong','impossible','error');
     }});
    });


    jQuery("#get_nbr_posts_by_day").on('click',function(e){
      var date=$('.yearmonthday').val();
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
       jQuery.ajax({
          url: "/ajax/NbrPostsByDay",
          method: 'get',
          data: {
            date : date,
          },
          success: function(result){
            anime({
              targets: '#nbrPostsByDay',
              innerHTML: [0, result.nbr],
              easing: 'linear',
              duration : 400,
              round: 10 // Will round the animated value to 1 decimal
            });  },
          error: function(jqXHR, textStatus, errorThrown){
            swal('something went wrong','impossible','error');
        }});
       });


       jQuery("#get_nbr_posts_by_month").on('click',function(e){
         var year=$('.yearmonth').val();
         var month=$('.month').val();
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }

         });
          jQuery.ajax({
             url: "/ajax/NbrPostsByMonth",
             method: 'get',
             data: {
               year : year,
               month : month
             },
             success: function(result){
               anime({
                 targets: '#nbrPostsByMonth',
                 innerHTML: [0, result.nbr],
                 easing: 'linear',
                 duration : 400,
                 round: 10 // Will round the animated value to 1 decimal
               });  },
             error: function(jqXHR, textStatus, errorThrown){
               swal('something went wrong','impossible','error');
           }});
          });


  jQuery("#get_nbr_comments_by_year").on('click',function(e){
    var year=$('.cyear').val();
     e.preventDefault();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }

    });
     jQuery.ajax({
        url: "/ajax/NbrCommentsByYear",
        method: 'get',
        data: {
          year : year,
        },
        success: function(result){
          anime({
            targets: '#nbrCommentsByYear',
            innerHTML: [0, result.nbr],
            easing: 'linear',
            duration : 400,
            round: 10 // Will round the animated value to 1 decimal
          });  },
        error: function(jqXHR, textStatus, errorThrown){
          swal('something went wrong','impossible','error');
      }});
     });


     jQuery("#get_nbr_comments_by_day").on('click',function(e){
       var date=$('.cyearmonthday').val();
        e.preventDefault();
        $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }
         });
        jQuery.ajax({
           url: "/ajax/NbrCommentsByDay",
           method: 'get',
           data: {
             date : date,
           },
           success: function(result){
             anime({
               targets: '#nbrCommentsByDay',
               innerHTML: [0, result.nbr],
               easing: 'linear',
               duration : 400,
               round: 10 // Will round the animated value to 1 decimal
             });  },
           error: function(jqXHR, textStatus, errorThrown){
             swal('something went wrong','impossible','error');
         }});
        });


        jQuery("#get_nbr_comments_by_month").on('click',function(e){
          var year=$('.cyearmonth').val();
          var month=$('.cmonth').val();
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }

          });
           jQuery.ajax({
              url: "/ajax/NbrCommentsByMonth",
              method: 'get',
              data: {
                year : year,
                month : month
              },
              success: function(result){
                anime({
                  targets: '#nbrCommentsByMonth',
                  innerHTML: [0, result.nbr],
                  easing: 'linear',
                  duration : 400,
                  round: 10 // Will round the animated value to 1 decimal
                });  },
              error: function(jqXHR, textStatus, errorThrown){
                swal('something went wrong','impossible','error');
            }});
           });




   jQuery("#get_nbr_replies_by_year").on('click',function(e){
     var year=$('.ryear').val();
      e.preventDefault();
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }

     });
      jQuery.ajax({
         url: "/ajax/NbrRepliesByYear",
         method: 'get',
         data: {
           year : year,
         },
         success: function(result){
           anime({
             targets: '#nbrRepliesByYear',
             innerHTML: [0, result.nbr],
             easing: 'linear',
             duration : 400,
             round: 10 // Will round the animated value to 1 decimal
           });  },
         error: function(jqXHR, textStatus, errorThrown){
           swal('something went wrong','impossible','error');
       }});
      });


      jQuery("#get_nbr_replies_by_day").on('click',function(e){
        var date=$('.ryearmonthday').val();
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
          });
         jQuery.ajax({
            url: "/ajax/NbrRepliesByDay",
            method: 'get',
            data: {
              date : date,
            },
            success: function(result){
              anime({
                targets: '#nbrRepliesByDay',
                innerHTML: [0, result.nbr],
                easing: 'linear',
                duration : 400,
                round: 10 // Will round the animated value to 1 decimal
              });  },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });


         jQuery("#get_nbr_replies_by_month").on('click',function(e){
           var year=$('.ryearmonth').val();
           var month=$('.rmonth').val();
            e.preventDefault();
            $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               }

           });
            jQuery.ajax({
               url: "/ajax/NbrRepliesByMonth",
               method: 'get',
               data: {
                 year : year,
                 month : month
               },
               success: function(result){
                 anime({
                   targets: '#nbrRepliesByMonth',
                   innerHTML: [0, result.nbr],
                   easing: 'linear',
                   duration : 400,
                   round: 10 // Will round the animated value to 1 decimal
                 });  },
               error: function(jqXHR, textStatus, errorThrown){
                 swal('something went wrong','impossible','error');
             }});
            });



      jQuery("#communities").on('click','.getNbrRepliesByCommunity',function(e){
        var community=$(this).data("community");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/ajax/NbrRepliesByCommunity",
            method: 'get',
            data: {
              community : community,
            },
            success: function(result){
              anime({
                targets: '#nbrRepliesByCommunityResult',
                innerHTML: [0, result.nbr_replies],
                easing: 'linear',
                duration : 400,
                round: 10 // Will round the animated value to 1 decimal
              });  },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });

       jQuery("#posts").on('click','.getNbrRepliesByPost',function(e){
         var postid=$(this).data("id");
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }

         });
          jQuery.ajax({
             url: "/ajax/NbrRepliesByPost",
             method: 'get',
             data: {
                postid : postid,
             },
             success: function(result){
               anime({
                 targets: '#nbrRepliesByPostResult',
                 innerHTML: [0, result.nbr_replies],
                 easing: 'linear',
                 duration : 400,
                 round: 10 // Will round the animated value to 1 decimal
               });
             },
             error: function(jqXHR, textStatus, errorThrown){
               swal('something went wrong','impossible','error');
           }});
          });


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

function livesearchCommunities(){
  var title = $('#livesearchCommunities').val();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/searchCommunities",
      method: 'get',
      data: {
        title : title,
      },
      success: function(result){
        $("#communities").html('');
        $.each(result.communities, function(i,index){
          $("#communities").append('<button class="getNbrRepliesByCommunity dropdown-item" data-community="'+index.title+'" href="#">'+index.title+'</button>');

        });
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
}

function livesearchPosts(){
  var post = $('#livesearchPosts').val();
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }

  });
   jQuery.ajax({
      url: "/ajax/searchPosts",
      method: 'get',
      data: {
        title : post,
      },
      success: function(result){

        $("#posts").html('');
        $.each(result.posts, function(i,index){
          $("#posts").append('<button class="getNbrRepliesByPost dropdown-item" data-id="'+index.id+'" href="#">'+index.title+'</button>');
        });
      },
      error: function(jqXHR, textStatus, errorThrown){
        swal('something went wrong','impossible','error');
    }});
}



</script>




@endsection
