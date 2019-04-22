<!-- blog layout -->

@extends('layouts.blog')

@section('content')

<h1>
  {{$section}}
</h1>

<section class="bg-light">
@foreach($list_posts as $post)
<div class="row col-lg-12">
  <h1> <a href="{{url('/blog/'.$section.'/'.$post->id.'')}}"> {{$post->title}} </a> </h1>
  <span> {{$post->content}} </span>

  <!-- Listing Of All Comments Of A Post -->
  @foreach($list_comments as $comment)
    <div class="row col-lg-10 offset-lg-2">
      {{$comment->content}}
    </div>

    <!-- Listing Of All Replies Of A Comment -->
    @foreach($list_replies as $reply)
      <div class="row col-lg-10 offset-lg-2">
        {{$reply->content}}
      </div>
    @endforeach

      <!-- Add Reply to the comment form -->
      <h4> add reply </h4>
      <form method="post" action="{{url('/blog/createreply')}}">
        {{csrf_field()}}
        <input type="hidden" name="user_id" value="{{auth::user()->id}}">
        <input type="hidden" name="comment_id" value="{{$comment->id}}">
        <input type="text" name="content">
        <button type="submit" class="btn btn-primary"> Reply </button>
      </form>
  @endforeach



  <!-- ADD COMMENT FORM -->
      <h3> add comment </h3>
      <form class="" action="{{url('/blog/createcomment')}}" method="post">
        {{csrf_field()}}
        <input type="text" name="content">
        <input type="hidden" name="user_id" value="{{auth::user()->id}}">
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <button class="btn btn-dark" type="submit"> Comment </button>
      </form>



</div>
@endforeach

<div class="row col-lg-12 offset-lg-3">
  <form action="{{url('/blog/createpost')}}" method="post">
    {{csrf_field()}}

    <span> title : </span> <input type="text" name="title"> <br>
    <span> content : </span> <input type="text" name="content"> <br>
    <input type="hidden" value="{{$section}}" name="section">
    <button class="btn btn-danger"> Create </button>
  </form>
</div>

</section>







@endsection
