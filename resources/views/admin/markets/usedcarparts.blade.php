<!-- Admin navbar (layout) -->
@extends('layouts.admin')
@section('content')

<!-- Most Important Statistics -->
<section class="bg-light">
  <h1> Statistics </h1>
  <div class="row col-lg-12">
    <button class="btn btn-outline-danger">
      Number of Articles (last day) : {{$nbr_recent_ucp_today}}
    </button>
    <button class="btn btn-outline-danger">
      Number of Articles (last week) : {{$nbr_recent_ucp_last_week}}
    </button>
    <button class="btn btn-outline-danger">
      Number of Articles (last month) : {{$nbr_recent_ucp_last_month}}
    </button>
    <button class="btn btn-outline-danger">
      Number of Articles (last year) : {{$nbr_recent_ucp_last_year}}
    </button>
  </div>
  <div class="row col-lg-12">
    <div> Last week added articles (by day) </div>
    <div>
      <canvas id="ucp_chart_last_week"></canvas>
    </div>
    <div> Last week added articles (by month) </div>
    <div>
      <canvas id="ucp_chart_last_year"></canvas>
    </div>
  </div>
</section>



<!-- List of Newcarparts by users (delete and update and add) -->
<section class="bg-light">
  <h1> List New Carparts </h1>
<div class="col-lg-12">
<table class="table table-danger">
  <th scope="col">ID</th>
  <th scope="col">Name </th>
  <th scope="col">Brand </th>
  <th scope="col">Category </th>
  <th scope="col">Compatible_cars </th>
  <th scope="col">Description </th>
  <th scope="col">User_id </th>
  <th scope="col">Creation Date </th>
  <th scope="col">Update Date </th>
  <th scope="col">Delete</th>
  <th scope="col"> Modify </th>

  @foreach($list_ucp as $ucp)
  <tr>
    <tr>
      <form class="" action="{{url('/marketmoderator/updateucp')}}" method="post">
  {{csrf_field()}}
  <input type="hidden" value="{{$ucp->id}}" name="id">
      <td>{{$ucp->id}}</td>
      <td><input name="name" value="{{$ucp->name}}"> </td>
      <td><input name="brand" value="{{$ucp->brand}}"> </td>
      <td><input name="category" value="{{$ucp->category}}"> </td>
      <td><input name="compatible_cars" value="{{$ucp->compatible_cars}}"> </td>
      <td><input name="description" value="{{$ucp->description}}"> </td>
      <td>{{$ucp->user_id}} </td>
      <td>{{$ucp->created_at}} </td>
      <td>{{$ucp->updated_at}} </td>
      <td>
        <button class="btn btn-primary" type="submit" > Update </button>
      </td>
      </form>
    <td>
      <form class="" action="{{url('/marketmoderator/deleteucp')}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input name="id" value="{{$ucp->id}}" type="hidden">
        <button class="btn btn-danger" type="submit"> Delete </button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

</div>
</section>

<script>
var c2 = document.getElementById("ucp_chart_last_year");
var replies_chart = new Chart(c2, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "Number of New Carparts",
      data :['{{$nbr_recent_ucp_last_month}}','{{$nbr_recent_ucp_last_2nd_month}}','{{$nbr_recent_ucp_last_3rd_month}}','{{$nbr_recent_ucp_last_4th_month}}','{{$nbr_recent_ucp_last_5th_month}}','{{$nbr_recent_ucp_last_6th_month}}','{{$nbr_recent_ucp_last_7th_month}}','{{$nbr_recent_ucp_last_8th_month}}','{{$nbr_recent_ucp_last_9th_month}}','{{$nbr_recent_ucp_last_10th_month}}','{{$nbr_recent_ucp_last_11th_month}}','{{$nbr_recent_ucp_last_12th_month}}'],
    }]
  },
});

var c1 = document.getElementById("ucp_chart_last_week");
var replies_chart = new Chart(c1, {
  type : 'line',
  data : {
    labels : ["first day","second day","third day","forth day","fifth day","sixth day","seventh day"],
    datasets: [{
      label : "Number of New Carparts",
      data :['{{$nbr_recent_ucp_today}}','{{$nbr_recent_ucp_last_2nd_day}}','{{$nbr_recent_ucp_last_3rd_day}}','{{$nbr_recent_ucp_last_4th_day}}','{{$nbr_recent_ucp_last_5th_day}}','{{$nbr_recent_ucp_last_6th_day}}','{{$nbr_recent_ucp_last_7th_day}}'],
    }]
  },
});
</script>




@endsection
