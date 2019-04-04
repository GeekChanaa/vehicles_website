<!-- Admin Navbar (Layout) -->
@extends('layouts.admin')

@section('content')
<!-- Header -->








<!-- Most Important Statistics -->









<section class="container mx-auto">
    <!-- Routes to other Dashboards -->
  <div class="sections row">
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3" style="background:#519EF7">
        <ion-icon name="car" class="align-middle"></ion-icon>
      </div>
      <a class="col-9 btn" href="{{url('/MarketDashboard')}}"> Market Dashboard </a>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3"  style="background:#488EE2">
        <ion-icon name="quote" class="align-middle"></ion-icon>
      </div>
      <a class="col-9 btn" href="{{url('/BlogDashboard')}}"> Blog Dashboard </a>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3" style="background:#3B78BD">
        <ion-icon name="hammer" class="align-middle"></ion-icon>
      </div>
      <a class="col-9 btn" href="{{url('/ServicesDashboard')}}"> Services Dashboard </a>
    </div>
    <div class="section row col-md-6 col-lg-3 ">
      <div class="col-3" style="background:#30629F">
        <ion-icon name="school" class="align-middle"></ion-icon>
      </div>
      <a class="col-9 btn" href="{{url('/EncyclopediaDashboard')}}"> Encyclopedia Dashboard </a>
    </div>
  </div>


  <!-- Todo List -->
  <div class="todos col-sm-12 col-md-8 col-lg-6">
    <div class="row todo-heading">
      <ion-icon name="menu"></ion-icon>
      <h2>Website Todo</h2>
    </div>

      @foreach($list_tasks as $one)
      <!-- the tasks -->
    <div class="todo row">
      <form class="check-btn col-1 text-center" action="{{url('/admin/updateTodo')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" value="{{$one->id}}" name="id">
        <button style="@if($one->state == 'done') background-color:red ; @endif" type="submit"></button>
      </form>
      <h4 class="col-10"> {{$one->content}} </h4>
      <form class="col-1 text-center" action="{{url('/admin/deleteTodo')}}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="hidden" value="{{$one->id}}" name="id">
        <button class="delete-btn" type="submit"><ion-icon name="trash"></ion-icon></button>
      </form>
    </div>
      @endforeach
    <form class="row add-todo" action="{{url('/admin/createTodo')}}" method="post">
      {{ csrf_field() }}
      <input class="col-12" type="text" name="content" placeholder="Type your todo ..">
      <button class="mx-auto" type="submit"><ion-icon name="add"></ion-icon></button>
    </form>
  </div>

</section>



<!-- Side Bar (LEFT) -->







<!-- Chat Window For Admins -->














@endsection
