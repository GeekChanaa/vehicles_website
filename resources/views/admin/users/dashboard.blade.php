@extends('layouts.admin')


@section('content')

<div class="row col-lg-12">
  <a href="{{url('/admin/usersDashboard/allUsers')}}" class="col-lg-3 btn btn-primary">all users </a>
  <a href="{{url('/admin/usersDashboard/BlogModerators')}}" class="col-lg-3 btn btn-primary">blog moderators </a>
  <a href="{{url('/admin/usersDashboard/MarketModerators')}}" class="col-lg-3 btn btn-primary">market moderators </a>
  <a href="{{url('/admin/usersDashboard/ServicesModerators')}}" class="col-lg-3 btn btn-primary">services moderators </a>
  <a href="{{url('/admin/usersDashboard/EncyclopediaModerators')}}" class="col-lg-3 btn btn-primary">encyclopedia moderators </a>
  <a href="{{url('/admin/usersDashboard/Statistics')}}" class="col-lg-3 btn btn-primary">statistics </a>
</div>




@endsection
