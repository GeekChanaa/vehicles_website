<!-- Admin Navbar (layout) -->
@extends('layouts.admin')

@section('content')


<!-- General Statistics -->





<!-- List of posts (possiblity of filter by user / date / section ...) ability to delete or update -->
<section class="bg-light">

<table class="col-lg-12 table table-danger">
  <th scope="col"> ID </th>
  <th scope="col"> Title </th>
  <th scope="col"> Section </th>
  <th scope="col"> Content </th>
  <th scope="col"> UpVotes </th>
  <th scope="col"> Rating </th>
  <th scope="col"> Creation Date </th>
  <th scope="col"> Update Date </th>
  <th scope="col"> Comments </th>
  <th scope="col"> Delete </th>
  <th scope="col"> Modify </th>


  @foreach($list_posts as $post)
  <tr>
    <td>{{$post->id}} </td>
    <!-- Modify Post Form -->
    <form method="post" action="{{url('/blogmoderator/modifypost')}}">
      {{csrf_field()}}
      <td><input type="text" placeholder="{{$post->title}}" value="{{$post->title}}" name="title"> <input name="id" value="{{$post->id}}" type="hidden"> </td>
      <td><input type="text" placeholder="{{$post->section}}" value="{{$post->section}}" name="section"> </td>
      <td><input type="text" placeholder="{{$post->content}}" value="{{$post->content}}" name="content"> </td>
      <td><input type="text" placeholder="{{$post->upvotes}}" value="{{$post->upvotes}}" name="upvotes"> </td>
      <td><input type="text" placeholder="{{$post->rating}}" value="{{$post->rating}}" name="rating"> </td>
      <td>
        <button type="submit" class="btn btn-dark"> Modify </button>
      </td>
    </form>
    <td>{{$post->created_at}} </td>
    <td>{{$post->updated_at}} </td>
    <td><button class="btn btn-danger" data-toggle="modal" data-target="#post-{{$post->id}}"> Comments </button> </td>
    <td>
      <form method="post" action="{{url('/blogmoderator/deletepost')}}">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <input type="hidden" value="{{$post->id}}" name="id">
      <button type="submit" class="btn btn-primary"> Delete </button>
      </form>
    </td>

  </tr>


  <!-- Modal: Listing Of Comments And Replies -->
        <div class="modal fade" id="post-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$post->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- comments -->
                @foreach($list_comments as $comment)

                  @if($comment->post_id == $post->id)
                  <div>
                    {{$comment->content}}
                    <form method="post" action="{{url('/blogmoderator/deletecomment')}}">
                      {{method_field('DELETE')}}
                      {{csrf_field()}}
                      <input type="hidden" name="comid" value="{{$comment->id}}">
                      <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                      <button class="btn btn-primary">Modify</button>

                    <!--replies-->
                    @foreach($list_replies as $reply)

                      @if($reply->comment_id == $comment->id)
                        <div class="row col-lg-12 offset-lg-1"><span style="color:red">
                          <!-- Form to Update A reply -->
                          <form method="post" action="{{url('/blogmoderator/modifyreply')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$reply->id}}">
                            <input name="content" placeholder="{{$reply->content}}">
                          <button type="submit" class="btn btn-danger"> Modify </button>
                        </form>
                        </span>
                        <form method="POST" action="{{url('/blogmoderator/deletereply')}}">
                          {{method_field('DELETE')}}
                          {{csrf_field()}}
                          <input type="hidden" name="replyid" value="{{$reply->id}}">
                          <button type="submit" class="btn btn-dark"> Delete </button>
                        </form>
                      </div>
                      @endif

                    @endforeach
                  </div>
                  @endif

                @endforeach
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
  @endforeach

</table>

</section>




<!-- Add post -->



@endsection
