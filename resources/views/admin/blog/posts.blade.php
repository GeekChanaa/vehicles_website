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
    <td>{{$post->title}} </td>
    <td>{{$post->section}} </td>
    <td>{{$post->content}} </td>
    <td>{{$post->upvotes}} </td>
    <td>{{$post->rating}} </td>
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
    <td>
      <button class="btn btn-dark"> Modify </button>
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
                    {{$comment->content}}
                    <!--replies-->
                    @foreach($list_replies as $reply)

                      @if($reply->comment_id == $comment->id)
                        <span style="color:red">{{$reply->content}}</span>
                      @endif

                    @endforeach

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
