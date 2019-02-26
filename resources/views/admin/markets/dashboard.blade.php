<!-- Admin navbar (layout) -->
@extends('layouts.admin')

@section('content')

<!-- General Statistics -->




<!-- Routes to other Market Dashboards -->
<section class="bg-light">
<div class="row">

  <a href="{{ url('/marketmoderator/newcarparts') }}" class=" dashboard-route col-lg-3 btn btn-outline-danger">
    New CarParts
  </a>
  <a href="{{ url('/marketmoderator/usedcarparts') }}" class=" dashboard-route col-lg-3 btn btn-outline-danger">
    New Vehicles
  </a>
  <a href="{{ url('/marketmoderator/newvehicles') }}" class=" dashboard-route col-lg-3 btn btn-outline-danger">
    Used Carparts
  </a>
  <a href="{{ url('/marketmoderator/usedvehicles') }}" class=" dashboard-route col-lg-3 btn btn-outline-danger">
    Used Vehicles
  </a>

</div>

<div class="row">
  <a href="{{ url('/marketmoderator/statistics') }}" class="col-lg-3 btn btn-outline-danger"> Statistics </a>


  <!-- Route to Make A user Special ! -->


</div>
</section>




@endsection
