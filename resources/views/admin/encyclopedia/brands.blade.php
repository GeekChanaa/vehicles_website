<!-- Admin Layout -->
@extends('layouts.admin')
@section('content')


<!-- Header For Page -->
<section>
<h1> Statistics </h1>
<div class="row col-lg-12">
  <button class="btn btn-outline-danger col-lg-4"> {{$nbr_brands}} </button>
  <button class="btn btn-outline-danger col-lg-4"> {{$nbr_carpart_brands}} </button>
  <button class="btn btn-outline-danger col-lg-4"> {{$nbr_vehicle_brands}} </button>
</div>
</section>



<!-- Listing of Brands -->
<section class="bg-light col-lg-12">
<h1> Brands Without Logos </h1>
<table class="table table-dark">
  <thead>
    <th> id </th>
    <th> Name </th>
    <th> Foundation year </th>
    <th> Headquarters </th>
    <th> CEO </th>
    <th> Website </th>
    <th> Production Output </th>
    <th> Revenue </th>
    <th> Net Income </th>
    <th> Number of Employees </th>
    <th> Description </th>
    <th> Specialty </th>
    <th> Added Date </th>
    <th> Modify </th>
    <th> Logo </th>
    <th> Delete </th>
  </thead>
  <tbody>

    @foreach($list_brands as $one)
  @if(!Storage::disk('public')->exists('brands/'.$one->name.'.png'))
  <tr id="brand{{$one->id}}">
    <form method="post" action="{{url('/encyclopediamoderator/modifybrand')}}">
      {{csrf_field()}}
    <td>{{$one->id}} </td>
    <td><input value="{{$one->name}}" placeholder="{{$one->name}}" name="name"> <input type="hidden" name="id" value="{{$one->id}}"></td>
    <td><input value="{{$one->year_foundation}}" placeholder="{{$one->year_foundation}}" name="year_foundation"> </td>
    <td><input value="{{$one->headquarters}}" placeholder="{{$one->headquarters}}" name="headquarters"> </td>
    <td><input value="{{$one->CEO}}" placeholder="{{$one->CEO}}" name="CEO"> </td>
    <td><input value="{{$one->website}}" placeholder="{{$one->website}}" name="website"> </td>
    <td><input value="{{$one->production_output}}" placeholder="{{$one->production_output}}" name="production_output"> </td>
    <td><input value="{{$one->revenue}}" placeholder="{{$one->revenue}}" name="revenue"> </td>
    <td><input value="{{$one->net_income}}" placeholder="{{$one->net_income}}" name="net_income"> </td>
    <td><input value="{{$one->nbr_of_employees}}" placeholder="{{$one->nbr_of_employees}}" name="nbr_of_employees"> </td>
    <td><input value="{{$one->description}}" placeholder="{{$one->description}}" name="description"> </td>
    <td>{{$one->specialty}} </td>

    <td>{{$one->created_at}} </td>
    <td> <button class="btn btn-primary" type="submit"> modify </button> </td>
  </form>
  <td>
    <form action="{{url('/encyclopediamoderator/uploadLogo')}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="file" name="imagef">
      <input type="hidden" name="name" value="{{$one->name}}">
      <button class="btn btn-primary"> upload </button>
    </form>
  </td>
    <td>
      <form class="" method="post">
        {{method_field('DELETE')}}
        <input id="id{{$one->id}}" type="hidden" value="{{$one->id}}" name="id">
        <button data-id="{{$one->id}}" class="btn btn-primary deletebrand"> delete </button>
      </form>
    </td>
  </tr>
  @endif
    @endforeach

  </tbody>
</table>
{{$list_brands->links()}}

</section>



<!-- Important Statistics About Brands -->










<!-- Ajax Functionalities -->
<script>
jQuery(document).ready(function(){
      jQuery(".deletebrand").on('click',function(e){
        var brandid=$(this).data("id");
         e.preventDefault();
         console.log('ok');
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/encyclopediamoderator/deletebrand",
            method: 'delete',
            data: {
               id: $("#id"+brandid).val(),
            },
            success: function(result){
              swal('deleted','NICE','success');
              $('#brand'+brandid).html('');
            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
      });
</script>

@endsection
