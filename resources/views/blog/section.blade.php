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
  <span> {{$post->content}} </span>

  <!-- Listing Of All Comments Of A Post -->
  @foreach($list_comments as $comment)
    <div>
      {{$comment->content}}
    </div>

    <!-- Listing Of All Replies Of A Comment -->
    @foreach($list_replies as $reply)
      <div>
        {{$reply->content}}
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







@endsection
