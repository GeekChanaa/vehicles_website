@extends('layouts.services')




@section('content')


<section class="bg-light">


<div class="row col-lg-12">
  <a href="{{url('/services/workshops-ui')}}" class="btn btn-danger col-lg-3 offset-lg-1"> Workshop owner interface </a>
  <a href="{{url('/services/workshops')}}" class="btn btn-danger col-lg-3 offset-lg-1"> Workshops </a>
  <a href="{{url('/services/newworkshop')}}" class="btn btn-danger col-lg-3 offset-lg-1"> Add new workshop </a>

</div>
<div class="row col-lg-12">
  <a href="{{url('/services/carwashes-ui')}}" class="btn btn-danger col-lg-3 offset-lg-1"> Carwash owner interface </a>
  <a href="{{url('/services/carwashes')}}" class="btn btn-danger col-lg-3 offset-lg-1"> Carwashes </a>
  <a href="{{url('/services/newcarwash')}}" class="btn btn-danger col-lg-3 offset-lg-1"> Add new Carwash </a>

</div>



</section>




















@endsection
