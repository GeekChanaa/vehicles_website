<!-- Admin navbar (layout) -->
@extends('layouts.admin')
@section('content')

<!-- Most Important Statistics -->
<section class="bg-light">
  <h1> Statistics </h1>
  <button class="btn btn-outline-danger">
    Number of Articles : {{$nbr_ncp_articles['0']->sum}}
  </button>
  <div class="row col-lg-12">

    <div> Number of New Carparts by Year </div>
    <div>
      <canvas id="ncp_chart_last_year"></canvas>
    </div>
  </div>
</section>




<!-- List of Newcarparts by users (delete and update and add) -->
<section class="bg-light">
  <h1> List New Carparts </h1>
<div class="col-lg-12">
<table class="table table-danger">
  <th scope="col">ID </th>
  <th scope="col">Name </th>
  <th scope="col">Brand </th>
  <th scope="col">Category </th>
  <th scope="col">Compatible_cars </th>
  <th scope="col">Description </th>
  <th scope="col">User_id </th>
  <th scope="col">Creation Date </th>
  <th scope="col">Update Date </th>
  <th scope="col"> Modify </th>
  <th scope="col">Delete </th>


  @foreach($list_ncp as $ncp)
  <tr>
    <form class="" action="{{url('/marketmoderator/updatencp')}}" method="post">
{{csrf_field()}}
<input type="hidden" value="{{$ncp->id}}" name="id">
    <td>{{$ncp->id}}</td>
    <td><input name="name" value="{{$ncp->name}}"> </td>
    <td><input name="brand" value="{{$ncp->brand}}"> </td>
    <td><input name="category" value="{{$ncp->category}}"> </td>
    <td><input name="compatible_cars" value="{{$ncp->compatible_cars}}"> </td>
    <td><input name="description" value="{{$ncp->description}}"> </td>
    <td>{{$ncp->user_id}} </td>
    <td>{{$ncp->created_at}} </td>
    <td>{{$ncp->updated_at}} </td>
    <td>
      <button class="btn btn-primary" type="submit" > Update </button>
    </td>
    </form>
    <td>
      <form class="" action="{{url('/marketmoderator/deletencp')}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input name="id" value="{{$ncp->id}}" type="hidden">
        <button class="btn btn-danger" type="submit"> Delete </button>
      </form>
    </td>

  </tr>
  @endforeach
</table>

</div>
{{$list_ncp->links()}}
</section>


<script>
var c2 = document.getElementById("ncp_chart_last_year");
var replies_chart = new Chart(c2, {
  type : 'line',
  data : {
    labels : ["first month","second month","third month","forth month","fifth month","sixth month","seventh month","eighth month","nineth month","tenth month","eleventh month","twelveth month"],
    datasets: [{
      label : "Number of New Carparts",
      data :['{{$nbr_recent_ncp_month['1']['0']->sum}}','{{$nbr_recent_ncp_month['2']['0']->sum}}','{{$nbr_recent_ncp_month['3']['0']->sum}}','{{$nbr_recent_ncp_month['4']['0']->sum}}','{{$nbr_recent_ncp_month['5']['0']->sum}}','{{$nbr_recent_ncp_month['6']['0']->sum}}','{{$nbr_recent_ncp_month['7']['0']->sum}}','{{$nbr_recent_ncp_month['8']['0']->sum}}','{{$nbr_recent_ncp_month['9']['0']->sum}}','{{$nbr_recent_ncp_month['10']['0']->sum}}','{{$nbr_recent_ncp_month['11']['0']->sum}}','{{$nbr_recent_ncp_month['12']['0']->sum}}'],
    }]
  },
});

</script>




@endsection
