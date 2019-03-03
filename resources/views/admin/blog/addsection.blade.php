<!-- Admin Layout-->
@extends('layouts.admin')



@section('content')


<form method="post" action="{{url('/blogmoderator/createsection')}}">
{{csrf_field()}}
<span> title :  </span>  <input type="text" name="title">


<button type="submit" class="btn btn-primary"> create </button>
</form>















@endsection
