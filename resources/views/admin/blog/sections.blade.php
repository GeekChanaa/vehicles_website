<!-- admin layout -->
@extends('layouts.admin')




@section('content')

<!-- listing of all sections -->

<section class="bg-light">
  <table class="table table-danger">
    <th scope="col"> ID </th>
    <th scope="col"> Title </th>
    <th scope="col"> Creation Date </th>
    <th scope="col"> Update Date </th>


      @foreach($list_sections as $section)
          <tr>
              <td>  {{$section->id}} </td>
              <td>  {{$section->title}} </td>
              <td>  {{$section->created_at}} </td>
              <td>  {{$section->updated_at}} </td>
          </tr>
      @endforeach






  </table>




</section>












@endsection
