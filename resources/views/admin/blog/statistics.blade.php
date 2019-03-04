<!-- Admin Layout -->
@extends('layouts.admin')


@section('content')

<section>
<h1> Global Numbers </h1>
<div class="row">
  <a href="" class="btn btn-outline-primary">number of posts <span> {{$nbr_posts}} </span>  </a>
  <a href="" class="btn btn-outline-primary">number of comments <span> {{$nbr_comments}} </span> </a>
  <a href="" class="btn btn-outline-primary">number of replies <span> {{$nbr_replies}} </span> </a>
</div>
</section>

<section>
  <h1> Posts Statistics and Numbers </h1>
  <div class="row">
    <a href="" class="btn btn-outline-primary">number of last day posts <span> {{$nbr_posts_last_day}} </span> </a>
    <a href="" class="btn btn-outline-primary">number of last week posts <span> {{$nbr_posts_last_week}} </span> </a>
    <a href="" class="btn btn-outline-primary">number of last month posts <span> {{$nbr_posts_last_month}} </span> </a>
    <a href="" class="btn btn-outline-primary">number of last year posts <span> {{$nbr_posts_last_year}} </span> </a>

  </div>

  <div>
    <canvas id="posts_chart"></canvas>
  </div>
</section>

<section>
  <h1> Comments Statistics and Numbers </h1>
  <div class="row">
    <a href="" class="btn btn-outline-primary">number of last day comments <span> {{$nbr_comments_last_day}} </span> </a>
    <a href="" class="btn btn-outline-primary">number of last week comments <span> {{$nbr_comments_last_week}} </span> </a>
    <a href="" class="btn btn-outline-primary">number of last month comments <span> {{$nbr_comments_last_month}} </span> </a>
    <a href="" class="btn btn-outline-primary">number of last year comments <span> {{$nbr_comments_last_year}} </span> </a>

  </div>

  <div>
    <canvas id="comments_chart"></canvas>
  </div>
</section>

<section>
  <h1> Replies Statistics and Numbers </h1>
  <div class="row">
    <a href="" class="btn btn-outline-primary">number of last day replies <span> {{$nbr_replies_last_day}} </span> </a>
    <a href="" class="btn btn-outline-primary">number of last week replies <span> {{$nbr_replies_last_week}} </span> </a>
    <a href="" class="btn btn-outline-primary">number of last month replies <span> {{$nbr_replies_last_month}} </span> </a>
    <a href="" class="btn btn-outline-primary">number of last year replies<span> {{$nbr_replies_last_year}} </span> </a>

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
      data :['{{$nbr_posts_last_month}}','{{$nbr_posts_2nd_month}}','{{$nbr_posts_3rd_month}}','{{$nbr_posts_4th_month}}','{{$nbr_posts_5th_month}}','{{$nbr_posts_6th_month}}','{{$nbr_posts_7th_month}}','{{$nbr_posts_8th_month}}','{{$nbr_posts_9th_month}}','{{$nbr_posts_10th_month}}','{{$nbr_posts_11th_month}}','{{$nbr_posts_12th_month}}'],
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
      data :['{{$nbr_comments_last_month}}','{{$nbr_comments_2nd_month}}','{{$nbr_comments_3rd_month}}','{{$nbr_comments_4th_month}}','{{$nbr_comments_5th_month}}','{{$nbr_comments_6th_month}}','{{$nbr_comments_7th_month}}','{{$nbr_comments_8th_month}}','{{$nbr_comments_9th_month}}','{{$nbr_comments_10th_month}}','{{$nbr_comments_11th_month}}','{{$nbr_comments_12th_month}}'],
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
      data :['{{$nbr_replies_last_month}}','{{$nbr_replies_2nd_month}}','{{$nbr_replies_3rd_month}}','{{$nbr_replies_4th_month}}','{{$nbr_replies_5th_month}}','{{$nbr_replies_6th_month}}','{{$nbr_replies_7th_month}}','{{$nbr_replies_8th_month}}','{{$nbr_replies_9th_month}}','{{$nbr_replies_10th_month}}','{{$nbr_replies_11th_month}}','{{$nbr_replies_12th_month}}'],
    }]
  },
});
</script>




@endsection
