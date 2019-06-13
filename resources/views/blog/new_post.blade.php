@extends('layouts.blog')



@section('content')

<div class="row col-lg-12 offset-lg-3">
  <form action="{{url('/blog/createpost')}}" method="post">
    {{csrf_field()}}

    <span> title : </span> <input type="text" name="title"> <br>
    <span> content : </span><textarea class="span6" name="content" rows="3" placeholder="What's up?" required></textarea><br>
    <input type="hidden" value="{{$community}}" name="section">
    <button class="btn btn-danger"> Create </button>
  </form>
</div>












@endsection
