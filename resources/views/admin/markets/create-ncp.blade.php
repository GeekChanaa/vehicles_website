<!-- admin layout -->
@extends('layouts.admin')


@section('content')
<!-- Create Form -->

<form  action="{{url('/marketmoderator/addncp')}}" method="post">
{{csrf_field()}}
<span>Name: </span> <input name="name" type="text"><br>
<span>Brand: </span> <input name="brand" type="text"><br>
<span>Category: </span> <input name="category" type="text"><br>
<span>Compatible Cars: </span> <input name="compatible_cars" type="text"><br>
<span>Description: </span> <input name="description" type="text"><br>

<button type="submit" class="btn btn-primary"> Create </button>
</form>









@endsection
