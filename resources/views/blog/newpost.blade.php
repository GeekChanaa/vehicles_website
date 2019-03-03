@extends('layouts.blog')
@section('content')


<form class="" action="{{url('/createpost')}}" method="post">
  {{csrf_field()}}
  <label>Title:</label> <input name="title" type="text">

  <label>Section: </label> <select name="section">
            @foreach($list_sections as $section)
              <option> {{$section->title }}</option>
            @endforeach
           </select>
  <label>Content: </label><input name="content" type="text">
  <button type="submit" class="btn btn-primary"> Create </button>
</form>









@endsection
