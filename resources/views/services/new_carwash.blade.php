@extends('layouts.services')



@section('content')


<section class="bg-light">



<form method="post" action="{{url('/services/createcarwash')}}">
{{csrf_field()}}
<input type="text" name="name">

<button class="btn btn-primary" type="submit"> Go </button>
</form>





</section>










@endsection
