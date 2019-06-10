<!-- Admin Navbar (Layout) -->
@extends('layouts.admin')

@section('content')
<!-- Header -->







<!-- Most Important Statistics -->









<section class="content-wrapper">
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
      <h2 class="col-10">Website Todo</h2>
    </div>


<div class="tasks-div" id="todo-list">
      @foreach($list_undone_tasks as $one)
      <!-- the tasks -->
      <div id="box-del{{$one->id}}" class="todo row">

        <input id="id{{$one->id}}" type="hidden" value="{{$one->id}}" name="id">
        <button class="check-btn doneTodo" data-id="{{$one->id}}" type="submit"></button>

       <!-- Update Content of a Todo-->
        <input class="col-10 {{$one->state=='done'?'done':''}} update-content-todo content{{$one->id}}" data-id="{{$one->id}}" value="{{$one->content}}" disabled>

        <button class="col-1 delete-btn" data-id="{{$one->id}}" type="submit"><ion-icon name="remove-circle"></ion-icon></button>
      </div>
      @endforeach


      @foreach($list_done_tasks as $one)
      <!-- the tasks -->
      <div id="box-del{{$one->id}}" class="todo row">
      <!-- Undone Todo -->
        <input id="id{{$one->id}}" type="hidden" value="{{$one->id}}">
        <button class="check-btn undoneTodo" data-id="{{$one->id}}" type="submit"></button>
      <!-- Update Content of a Todo-->
        <input class="col-10 {{$one->state=='done'?'done':''}} update-content-todo content{{$one->id}}" data-id="{{$one->id}}" value="{{$one->content}}" disabled>

        <button class="col-1 delete-btn" data-id="{{$one->id}}" type="submit"><ion-icon name="remove-circle"></ion-icon></button>
      </div>
      @endforeach
</div>

      <!-- Create Todo -->
      <div class="add-todo">
        <input id="create-todo-content" class="col-12" type="text" placeholder="Type your todo ..">
        <div class="underline"></div>
        <button class="createTodo mx-auto" type="submit"><ion-icon name="add"></ion-icon></button>
      </div>
  </div>

</section>


<section class="bg-light" style="height:400px;">
  <div id="world-map" style="height:400px;"></div>
</section>






<!-- Side Bar (LEFT) -->







<!-- Chat Window For Admins -->












<!-- Ajax Functions -->
<script>

// Done Todo

jQuery(document).ready(function(){
        jQuery("#todo-list").on('click','.doneTodo',function(e){
        var todoid=$(this).data("id");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/admin/undoneTask",
            method: 'post',
            data: {
               id: $("#id"+todoid).val(),
                },
            success: function(result){

            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
      });

// Undone Todo

jQuery(document).ready(function(){
      jQuery("#todo-list").on('click','.undoneTodo',function(e){
        var todoid=$(this).data("id");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/admin/doneTask",
            method: 'post',
            data: {
               id: $("#id"+todoid).val(),
                },
            success: function(result){

            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
      });

// Delete Todo

jQuery(document).ready(function(){
      jQuery("#todo-list").on('click','.delete-btn',function(e){
        var todoid=$(this).data("id");
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }

        });
         jQuery.ajax({
            url: "/admin/deleteTask",
            method: 'delete',
            data: {
               id: $("#id"+todoid).val(),
            },
            success: function(result){
              $('#box-del'+todoid).html('').remove();
            },
            error: function(jqXHR, textStatus, errorThrown){
              swal('something went wrong','impossible','error');
          }});
         });
      });

// Add todo
      jQuery(document).ready(function(){
            jQuery(".createTodo").on('click',function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }

              });
               jQuery.ajax({
                  url: "/admin/createTask",
                  method: 'post',
                  data: {
                     content: $('#create-todo-content').val(),
                     section: 'Global',
                      },
                  success: function(result){
                    $('.tasks-div').prepend('<div id="box-del'+result.id+'" class="todo row"><input id="id'+result.id+'" type="hidden" value="'+result.id+'" name="id"><button class="check-btn doneTodo" data-id="'+result.id+'" type="submit"></button><input class="col-10 update-content-todo content'+result.id+'" data-id="'+result.id+'" value="'+result.content+'" disabled><button class="col-1 delete-btn" data-id="'+result.id+'" type="submit"><ion-icon name="remove-circle"></ion-icon></button></div>')
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    swal('something went wrong','impossible','error');
                }});
               });
            });

  jQuery(document).ready(function(){
        jQuery(".update-content-todo").on('blur',function(e){
          var todoid=$(this).data("id");
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }

          });
           jQuery.ajax({
              url: "/admin/updatecontentTask",
              method: 'post',
              data: {
                 id: $("#id"+todoid).val(),
                 content: $('.content'+todoid).val(),
                  },
              success: function(result){
              },
              error: function(jqXHR, textStatus, errorThrown){
                swal('something went wrong','impossible','error');
            }});
           });
        });


</script>


<!-- WORLD MAP -->
<script>



    $(function(){
  var maps = new jvm.Map({
    map: 'world_mill_en',
    container: $('#world-map'),
    regionLabelStyle: {
      initial: {
        fill: '#B90E32'
      },
      hover: {
        fill: 'black'
      }
    },
    series: {
    regions: [{
      scale: ['#ffc107', '#dc3545'],
      normalizeFunction: 'polynomial',


      values: {
  "BD" : @if(array_key_exists('Bangladesh',$nbr_users_by_country)) {{$nbr_users_by_country['Bangladesh']}} @else {{'0'}} @endif,
 	"BE" : @if(array_key_exists('Belgium',$nbr_users_by_country)) {{$nbr_users_by_country['Belgium']}} @else {{'0'}} @endif,
 	"BF" : @if(array_key_exists('Burkina Faso',$nbr_users_by_country)) {{$nbr_users_by_country['Burkina Faso']}} @else {{'0'}} @endif,
 	"BG" : @if(array_key_exists('Bulgaria',$nbr_users_by_country)) {{$nbr_users_by_country['Bulgaria']}} @else {{'0'}} @endif,
 	"BA" : @if(array_key_exists('Bosnia and Herz.',$nbr_users_by_country)) {{$nbr_users_by_country['Bosnia and Herz.']}} @else {{'0'}} @endif,
 	"BN" : @if(array_key_exists('Brunei',$nbr_users_by_country)) {{$nbr_users_by_country['Brunei']}} @else {{'0'}} @endif,
 	"BO" : @if(array_key_exists('Bolivia',$nbr_users_by_country)) {{$nbr_users_by_country['Bolivia']}} @else {{'0'}} @endif,
 	"JP" : @if(array_key_exists('Japan',$nbr_users_by_country)) {{$nbr_users_by_country['Japan']}} @else {{'0'}} @endif,
 	"BI" : @if(array_key_exists('Burundi',$nbr_users_by_country)) {{$nbr_users_by_country['Burundi']}} @else {{'0'}} @endif,
 	"BJ" : @if(array_key_exists('Benin',$nbr_users_by_country)) {{$nbr_users_by_country['Benin']}} @else {{'0'}} @endif,
 	"BT" : @if(array_key_exists('Bhutan',$nbr_users_by_country)) {{$nbr_users_by_country['Bhutan']}} @else {{'0'}} @endif,
 	"JM" : @if(array_key_exists('Jamaica',$nbr_users_by_country)) {{$nbr_users_by_country['Jamaica']}} @else {{'0'}} @endif,
 	"BW" : @if(array_key_exists('Botswana',$nbr_users_by_country)) {{$nbr_users_by_country['Botswana']}} @else {{'0'}} @endif,
 	"BR" : @if(array_key_exists('Brazil',$nbr_users_by_country)) {{$nbr_users_by_country['Brazil']}} @else {{'0'}} @endif,
 	"BS" : @if(array_key_exists('Bahamas',$nbr_users_by_country)) {{$nbr_users_by_country['Bahamas']}} @else {{'0'}} @endif,
 	"BY" : @if(array_key_exists('Belarus',$nbr_users_by_country)) {{$nbr_users_by_country['Belarus']}} @else {{'0'}} @endif,
 	"BZ" : @if(array_key_exists('Belize',$nbr_users_by_country)) {{$nbr_users_by_country['Belize']}} @else {{'0'}} @endif,
 	"RU" : @if(array_key_exists('Russia',$nbr_users_by_country)) {{$nbr_users_by_country['Russia']}} @else {{'0'}} @endif,
 	"RW" : @if(array_key_exists('Rwanda',$nbr_users_by_country)) {{$nbr_users_by_country['Rwanda']}} @else {{'0'}} @endif,
 	"RS" : @if(array_key_exists('Serbia',$nbr_users_by_country)) {{$nbr_users_by_country['Serbia']}} @else {{'0'}} @endif,
 	"TL" : @if(array_key_exists('Timor-Leste',$nbr_users_by_country)) {{$nbr_users_by_country['Timor-Leste']}} @else {{'0'}} @endif,
 	"TM" : @if(array_key_exists('Turkmenistan',$nbr_users_by_country)) {{$nbr_users_by_country['Turkmenistan']}} @else {{'0'}} @endif,
 	"TJ" : @if(array_key_exists('Tajikistan',$nbr_users_by_country)) {{$nbr_users_by_country['Tajikistan']}} @else {{'0'}} @endif,
 	"RO" : @if(array_key_exists('Romania',$nbr_users_by_country)) {{$nbr_users_by_country['Romania']}} @else {{'0'}} @endif,
 	"GW" : @if(array_key_exists('Guinea-Bissau',$nbr_users_by_country)) {{$nbr_users_by_country['Guinea-Bissau']}} @else {{'0'}} @endif,
 	"GT" : @if(array_key_exists('Guatemala',$nbr_users_by_country)) {{$nbr_users_by_country['Guatemala']}} @else {{'0'}} @endif,
 	"GR" : @if(array_key_exists('Greece',$nbr_users_by_country)) {{$nbr_users_by_country['Greece']}} @else {{'0'}} @endif,
 	"GQ" : @if(array_key_exists('Eq. Guinea',$nbr_users_by_country)) {{$nbr_users_by_country['Eq. Guinea']}} @else {{'0'}} @endif,
 	"GY" : @if(array_key_exists('Guyana',$nbr_users_by_country)) {{$nbr_users_by_country['Guyana']}} @else {{'0'}} @endif,
 	"GE" : @if(array_key_exists('Georgia',$nbr_users_by_country)) {{$nbr_users_by_country['Georgia']}} @else {{'0'}} @endif,
 	"GB" : @if(array_key_exists('United Kingdom',$nbr_users_by_country)) {{$nbr_users_by_country['United Kingdom']}} @else {{'0'}} @endif,
 	"GA" : @if(array_key_exists('Gabon',$nbr_users_by_country)) {{$nbr_users_by_country['Gabon']}} @else {{'0'}} @endif,
 	"GN" : @if(array_key_exists('Guinea',$nbr_users_by_country)) {{$nbr_users_by_country['Guinea']}} @else {{'0'}} @endif,
 	"GM" : @if(array_key_exists('Gambia',$nbr_users_by_country)) {{$nbr_users_by_country['Gambia']}} @else {{'0'}} @endif,
 	"GL" : @if(array_key_exists('Greenland',$nbr_users_by_country)) {{$nbr_users_by_country['Greenland']}} @else {{'0'}} @endif,
 	"GH" : @if(array_key_exists('Ghana',$nbr_users_by_country)) {{$nbr_users_by_country['Ghana']}} @else {{'0'}} @endif,
 	"OM" : @if(array_key_exists('Oman',$nbr_users_by_country)) {{$nbr_users_by_country['Oman']}} @else {{'0'}} @endif,
 	"TN" : @if(array_key_exists('Tunisia',$nbr_users_by_country)) {{$nbr_users_by_country['Tunisia']}} @else {{'0'}} @endif,
 	"JO" : @if(array_key_exists('Jordan',$nbr_users_by_country)) {{$nbr_users_by_country['Jordan']}} @else {{'0'}} @endif,
 	"HR" : @if(array_key_exists('Croatia',$nbr_users_by_country)) {{$nbr_users_by_country['Croatia']}} @else {{'0'}} @endif,
 	"HT" : @if(array_key_exists('Haiti',$nbr_users_by_country)) {{$nbr_users_by_country['Haiti']}} @else {{'0'}} @endif,
 	"HU" : @if(array_key_exists('Hungary',$nbr_users_by_country)) {{$nbr_users_by_country['Hungary']}} @else {{'0'}} @endif,
 	"HN" : @if(array_key_exists('Honduras',$nbr_users_by_country)) {{$nbr_users_by_country['Honduras']}} @else {{'0'}} @endif,
 	"PR" : @if(array_key_exists('Puerto Rico',$nbr_users_by_country)) {{$nbr_users_by_country['Puerto Rico']}} @else {{'0'}} @endif,
 	"PS" : @if(array_key_exists('Palestine',$nbr_users_by_country)) {{$nbr_users_by_country['Palestine']}} @else {{'0'}} @endif,
 	"PT" : @if(array_key_exists('Portugal',$nbr_users_by_country)) {{$nbr_users_by_country['Portugal']}} @else {{'0'}} @endif,
 	"PY" : @if(array_key_exists('Paraguay',$nbr_users_by_country)) {{$nbr_users_by_country['Paraguay']}} @else {{'0'}} @endif,
 	"PA" : @if(array_key_exists('Panama',$nbr_users_by_country)) {{$nbr_users_by_country['Panama']}} @else {{'0'}} @endif,
 	"PG" : @if(array_key_exists('Papua New Guinea',$nbr_users_by_country)) {{$nbr_users_by_country['Papua New Guinea']}} @else {{'0'}} @endif,
 	"PE" : @if(array_key_exists('Peru',$nbr_users_by_country)) {{$nbr_users_by_country['Peru']}} @else {{'0'}} @endif,
 	"PK" : @if(array_key_exists('Pakistan',$nbr_users_by_country)) {{$nbr_users_by_country['Pakistan']}} @else {{'0'}} @endif,
 	"PH" : @if(array_key_exists('Philippines',$nbr_users_by_country)) {{$nbr_users_by_country['Philippines']}} @else {{'0'}} @endif,
 	"PL" : @if(array_key_exists('Poland',$nbr_users_by_country)) {{$nbr_users_by_country['Poland']}} @else {{'0'}} @endif,
 	"ZM" : @if(array_key_exists('Zambia',$nbr_users_by_country)) {{$nbr_users_by_country['Zambia']}} @else {{'0'}} @endif,
 	"EH" : @if(array_key_exists('W. Sahara',$nbr_users_by_country)) {{$nbr_users_by_country['W. Sahara']}} @else {{'0'}} @endif,
 	"EE" : @if(array_key_exists('Estonia',$nbr_users_by_country)) {{$nbr_users_by_country['Estonia']}} @else {{'0'}} @endif,
 	"EG" : @if(array_key_exists('Egypt',$nbr_users_by_country)) {{$nbr_users_by_country['Egypt']}} @else {{'0'}} @endif,
 	"ZA" : @if(array_key_exists('South Africa',$nbr_users_by_country)) {{$nbr_users_by_country['South Africa']}} @else {{'0'}} @endif,
 	"EC" : @if(array_key_exists('Ecuador',$nbr_users_by_country)) {{$nbr_users_by_country['Ecuador']}} @else {{'0'}} @endif,
 	"IT" : @if(array_key_exists('Italy',$nbr_users_by_country)) {{$nbr_users_by_country['Italy']}} @else {{'0'}} @endif,
 	"VN" : @if(array_key_exists('Vietnam',$nbr_users_by_country)) {{$nbr_users_by_country['Vietnam']}} @else {{'0'}} @endif,
 	"SB" : @if(array_key_exists('Solomon Is.',$nbr_users_by_country)) {{$nbr_users_by_country['Solomon Is.']}} @else {{'0'}} @endif,
 	"ET" : @if(array_key_exists('Ethiopia',$nbr_users_by_country)) {{$nbr_users_by_country['Ethiopia']}} @else {{'0'}} @endif,
 	"SO" : @if(array_key_exists('Somalia',$nbr_users_by_country)) {{$nbr_users_by_country['Somalia']}} @else {{'0'}} @endif,
 	"ZW" : @if(array_key_exists('Zimbabwe',$nbr_users_by_country)) {{$nbr_users_by_country['Zimbabwe']}} @else {{'0'}} @endif,
 	"ES" : @if(array_key_exists('Spain',$nbr_users_by_country)) {{$nbr_users_by_country['Spain']}} @else {{'0'}} @endif,
 	"ER" : @if(array_key_exists('Eritrea',$nbr_users_by_country)) {{$nbr_users_by_country['Eritrea']}} @else {{'0'}} @endif,
 	"ME" : @if(array_key_exists('Montenegro',$nbr_users_by_country)) {{$nbr_users_by_country['Montenegro']}} @else {{'0'}} @endif,
 	"MD" : @if(array_key_exists('Moldova',$nbr_users_by_country)) {{$nbr_users_by_country['Moldova']}} @else {{'0'}} @endif,
 	"MG" : @if(array_key_exists('Madagascar',$nbr_users_by_country)) {{$nbr_users_by_country['Madagascar']}} @else {{'0'}} @endif,
 	"MA" : @if(array_key_exists('Morocco',$nbr_users_by_country)) {{$nbr_users_by_country['Morocco']}} @else {{'0'}} @endif,
 	"UZ" : @if(array_key_exists('Uzbekistan',$nbr_users_by_country)) {{$nbr_users_by_country['Uzbekistan']}} @else {{'0'}} @endif,
 	"MM" : @if(array_key_exists('Myanmar',$nbr_users_by_country)) {{$nbr_users_by_country['Myanmar']}} @else {{'0'}} @endif,
 	"ML" : @if(array_key_exists('Mali',$nbr_users_by_country)) {{$nbr_users_by_country['Mali']}} @else {{'0'}} @endif,
 	"MN" : @if(array_key_exists('Mongolia',$nbr_users_by_country)) {{$nbr_users_by_country['Mongolia']}} @else {{'0'}} @endif,
 	"MK" : @if(array_key_exists('Macedonia',$nbr_users_by_country)) {{$nbr_users_by_country['Macedonia']}} @else {{'0'}} @endif,
 	"MW" : @if(array_key_exists('Malawi',$nbr_users_by_country)) {{$nbr_users_by_country['Malawi']}} @else {{'0'}} @endif,
 	"MR" : @if(array_key_exists('Mauritania',$nbr_users_by_country)) {{$nbr_users_by_country['Mauritania']}} @else {{'0'}} @endif,
 	"UG" : @if(array_key_exists('Uganda',$nbr_users_by_country)) {{$nbr_users_by_country['Uganda']}} @else {{'0'}} @endif,
 	"MY" : @if(array_key_exists('Malaysia',$nbr_users_by_country)) {{$nbr_users_by_country['Malaysia']}} @else {{'0'}} @endif,
 	"MX" : @if(array_key_exists('Mexico',$nbr_users_by_country)) {{$nbr_users_by_country['Mexico']}} @else {{'0'}} @endif,
 	"IL" : @if(array_key_exists('Israel',$nbr_users_by_country)) {{$nbr_users_by_country['Israel']}} @else {{'0'}} @endif,
 	"FR" : @if(array_key_exists('France',$nbr_users_by_country)) {{$nbr_users_by_country['France']}} @else {{'0'}} @endif,
 	"XS" : @if(array_key_exists('Somaliland',$nbr_users_by_country)) {{$nbr_users_by_country['Somaliland']}} @else {{'0'}} @endif,
 	"FI" : @if(array_key_exists('Finland',$nbr_users_by_country)) {{$nbr_users_by_country['Finland']}} @else {{'0'}} @endif,
 	"FJ" : @if(array_key_exists('Fiji',$nbr_users_by_country)) {{$nbr_users_by_country['Fiji']}} @else {{'0'}} @endif,
 	"FK" : @if(array_key_exists('Falkland Is.',$nbr_users_by_country)) {{$nbr_users_by_country['Falkland Is.']}} @else {{'0'}} @endif,
 	"NI" : @if(array_key_exists('Nicaragua',$nbr_users_by_country)) {{$nbr_users_by_country['Nicaragua']}} @else {{'0'}} @endif,
 	"NL" : @if(array_key_exists('Netherlands',$nbr_users_by_country)) {{$nbr_users_by_country['Netherlands']}} @else {{'0'}} @endif,
 	"NO" : @if(array_key_exists('Norway',$nbr_users_by_country)) {{$nbr_users_by_country['Norway']}} @else {{'0'}} @endif,
 	"NA" : @if(array_key_exists('Namibia',$nbr_users_by_country)) {{$nbr_users_by_country['Namibia']}} @else {{'0'}} @endif,
 	"VU" : @if(array_key_exists('Vanuatu',$nbr_users_by_country)) {{$nbr_users_by_country['Vanuatu']}} @else {{'0'}} @endif,
 	"NC" : @if(array_key_exists('New Caledonia',$nbr_users_by_country)) {{$nbr_users_by_country['New Caledonia']}} @else {{'0'}} @endif,
 	"NE" : @if(array_key_exists('Niger',$nbr_users_by_country)) {{$nbr_users_by_country['Niger']}} @else {{'0'}} @endif,
 	"NG" : @if(array_key_exists('Nigeria',$nbr_users_by_country)) {{$nbr_users_by_country['Nigeria']}} @else {{'0'}} @endif,
 	"NZ" : @if(array_key_exists('New Zealand',$nbr_users_by_country)) {{$nbr_users_by_country['New Zealand']}} @else {{'0'}} @endif,
 	"NP" : @if(array_key_exists('Nepal',$nbr_users_by_country)) {{$nbr_users_by_country['Nepal']}} @else {{'0'}} @endif,
 	"XK" : @if(array_key_exists('Kosovo',$nbr_users_by_country)) {{$nbr_users_by_country['Kosovo']}} @else {{'0'}} @endif,
 	"CI" : @if(array_key_exists('Côte d\'Ivoire',$nbr_users_by_country)) {{$nbr_users_by_country['Côte d\'Ivoire']}} @else {{'0'}} @endif,
 	"CH" : @if(array_key_exists('Switzerland',$nbr_users_by_country)) {{$nbr_users_by_country['Switzerland']}} @else {{'0'}} @endif,
 	"CO" : @if(array_key_exists('Colombia',$nbr_users_by_country)) {{$nbr_users_by_country['Colombia']}} @else {{'0'}} @endif,
 	"CN" : @if(array_key_exists('China',$nbr_users_by_country)) {{$nbr_users_by_country['China']}} @else {{'0'}} @endif,
 	"CM" : @if(array_key_exists('Cameroon',$nbr_users_by_country)) {{$nbr_users_by_country['Cameroon']}} @else {{'0'}} @endif,
 	"CL" : @if(array_key_exists('Chile',$nbr_users_by_country)) {{$nbr_users_by_country['Chile']}} @else {{'0'}} @endif,
 	"XC" : @if(array_key_exists('N. Cyprus',$nbr_users_by_country)) {{$nbr_users_by_country['N. Cyprus']}} @else {{'0'}} @endif,
 	"CA" : @if(array_key_exists('Canada',$nbr_users_by_country)) {{$nbr_users_by_country['Canada']}} @else {{'0'}} @endif,
 	"CG" : @if(array_key_exists('Congo',$nbr_users_by_country)) {{$nbr_users_by_country['Congo']}} @else {{'0'}} @endif,
 	"CF" : @if(array_key_exists('Central African Rep.',$nbr_users_by_country)) {{$nbr_users_by_country['Central African Rep.']}} @else {{'0'}} @endif,
 	"CD" : @if(array_key_exists('Dem. Rep. Congo',$nbr_users_by_country)) {{$nbr_users_by_country['Dem. Rep. Congo']}} @else {{'0'}} @endif,
 	"CZ" : @if(array_key_exists('Czech Rep.',$nbr_users_by_country)) {{$nbr_users_by_country['Czech Rep.']}} @else {{'0'}} @endif,
 	"CY" : @if(array_key_exists('Cyprus',$nbr_users_by_country)) {{$nbr_users_by_country['Cyprus']}} @else {{'0'}} @endif,
 	"CR" : @if(array_key_exists('Costa Rica',$nbr_users_by_country)) {{$nbr_users_by_country['Costa Rica']}} @else {{'0'}} @endif,
 	"CU" : @if(array_key_exists('Cuba',$nbr_users_by_country)) {{$nbr_users_by_country['Cuba']}} @else {{'0'}} @endif,
 	"SZ" : @if(array_key_exists('Swaziland',$nbr_users_by_country)) {{$nbr_users_by_country['Swaziland']}} @else {{'0'}} @endif,
 	"SY" : @if(array_key_exists('Syria',$nbr_users_by_country)) {{$nbr_users_by_country['Syria']}} @else {{'0'}} @endif,
 	"KG" : @if(array_key_exists('Kyrgyzstan',$nbr_users_by_country)) {{$nbr_users_by_country['Kyrgyzstan']}} @else {{'0'}} @endif,
 	"KE" : @if(array_key_exists('Kenya',$nbr_users_by_country)) {{$nbr_users_by_country['Kenya']}} @else {{'0'}} @endif,
 	"SS" : @if(array_key_exists('S. Sudan',$nbr_users_by_country)) {{$nbr_users_by_country['S. Sudan']}} @else {{'0'}} @endif,
 	"SR" : @if(array_key_exists('Suriname',$nbr_users_by_country)) {{$nbr_users_by_country['Suriname']}} @else {{'0'}} @endif,
 	"KH" : @if(array_key_exists('Cambodia',$nbr_users_by_country)) {{$nbr_users_by_country['Cambodia']}} @else {{'0'}} @endif,
 	"SV" : @if(array_key_exists('El Salvador',$nbr_users_by_country)) {{$nbr_users_by_country['El Salvador']}} @else {{'0'}} @endif,
 	"SK" : @if(array_key_exists('Slovakia',$nbr_users_by_country)) {{$nbr_users_by_country['Slovakia']}} @else {{'0'}} @endif,
 	"KR" : @if(array_key_exists('Korea',$nbr_users_by_country)) {{$nbr_users_by_country['Korea']}} @else {{'0'}} @endif,
 	"SI" : @if(array_key_exists('Slovenia',$nbr_users_by_country)) {{$nbr_users_by_country['Slovenia']}} @else {{'0'}} @endif,
 	"KP" : @if(array_key_exists('Dem. Rep. Korea',$nbr_users_by_country)) {{$nbr_users_by_country['Dem. Rep. Korea']}} @else {{'0'}} @endif,
 	"KW" : @if(array_key_exists('Kuwait',$nbr_users_by_country)) {{$nbr_users_by_country['Kuwait']}} @else {{'0'}} @endif,
 	"SN" : @if(array_key_exists('Senegal',$nbr_users_by_country)) {{$nbr_users_by_country['Senegal']}} @else {{'0'}} @endif,
 	"SL" : @if(array_key_exists('Sierra Leone',$nbr_users_by_country)) {{$nbr_users_by_country['Sierra Leone']}} @else {{'0'}} @endif,
 	"KZ" : @if(array_key_exists('Kazakhstan',$nbr_users_by_country)) {{$nbr_users_by_country['Kazakhstan']}} @else {{'0'}} @endif,
 	"SA" : @if(array_key_exists('Saudi Arabia',$nbr_users_by_country)) {{$nbr_users_by_country['Saudi Arabia']}} @else {{'0'}} @endif,
 	"SE" : @if(array_key_exists('Sweden',$nbr_users_by_country)) {{$nbr_users_by_country['Sweden']}} @else {{'0'}} @endif,
 	"SD" : @if(array_key_exists('Sudan',$nbr_users_by_country)) {{$nbr_users_by_country['Sudan']}} @else {{'0'}} @endif,
 	"DO" : @if(array_key_exists('Dominican Rep.',$nbr_users_by_country)) {{$nbr_users_by_country['Dominican Rep.']}} @else {{'0'}} @endif,
 	"DJ" : @if(array_key_exists('Djibouti',$nbr_users_by_country)) {{$nbr_users_by_country['Djibouti']}} @else {{'0'}} @endif,
 	"DK" : @if(array_key_exists('Denmark',$nbr_users_by_country)) {{$nbr_users_by_country['Denmark']}} @else {{'0'}} @endif,
 	"DE" : @if(array_key_exists('Germany',$nbr_users_by_country)) {{$nbr_users_by_country['Germany']}} @else {{'0'}} @endif,
 	"YE" : @if(array_key_exists('Yemen',$nbr_users_by_country)) {{$nbr_users_by_country['Yemen']}} @else {{'0'}} @endif,
 	"DZ" : @if(array_key_exists('Algeria',$nbr_users_by_country)) {{$nbr_users_by_country['Algeria']}} @else {{'0'}} @endif,
 	"US" : @if(array_key_exists('United States',$nbr_users_by_country)) {{$nbr_users_by_country['United States']}} @else {{'0'}} @endif,
 	"UY" : @if(array_key_exists('Uruguay',$nbr_users_by_country)) {{$nbr_users_by_country['Uruguay']}} @else {{'0'}} @endif,
 	"LB" : @if(array_key_exists('Lebanon',$nbr_users_by_country)) {{$nbr_users_by_country['Lebanon']}} @else {{'0'}} @endif,
 	"LA" : @if(array_key_exists('Lao PDR',$nbr_users_by_country)) {{$nbr_users_by_country['Lao PDR']}} @else {{'0'}} @endif,
 	"TW" : @if(array_key_exists('Taiwan',$nbr_users_by_country)) {{$nbr_users_by_country['Taiwan']}} @else {{'0'}} @endif,
 	"TT" : @if(array_key_exists('Trinidad and Tobago',$nbr_users_by_country)) {{$nbr_users_by_country['Trinidad and Tobago']}} @else {{'0'}} @endif,
 	"TR" : @if(array_key_exists('Turkey',$nbr_users_by_country)) {{$nbr_users_by_country['Turkey']}} @else {{'0'}} @endif,
 	"LK" : @if(array_key_exists('Sri Lanka',$nbr_users_by_country)) {{$nbr_users_by_country['Sri Lanka']}} @else {{'0'}} @endif,
 	"LV" : @if(array_key_exists('Latvia',$nbr_users_by_country)) {{$nbr_users_by_country['Latvia']}} @else {{'0'}} @endif,
 	"LT" : @if(array_key_exists('Lithuania',$nbr_users_by_country)) {{$nbr_users_by_country['Lithuania']}} @else {{'0'}} @endif,
 	"LU" : @if(array_key_exists('Luxembourg',$nbr_users_by_country)) {{$nbr_users_by_country['Luxembourg']}} @else {{'0'}} @endif,
 	"LR" : @if(array_key_exists('Liberia',$nbr_users_by_country)) {{$nbr_users_by_country['Liberia']}} @else {{'0'}} @endif,
 	"LS" : @if(array_key_exists('Lesotho',$nbr_users_by_country)) {{$nbr_users_by_country['Lesotho']}} @else {{'0'}} @endif,
 	"TH" : @if(array_key_exists('Thailand',$nbr_users_by_country)) {{$nbr_users_by_country['Thailand']}} @else {{'0'}} @endif,
 	"TF" : @if(array_key_exists('Fr. S. Antarctic Lands',$nbr_users_by_country)) {{$nbr_users_by_country['Fr. S. Antarctic Lands']}} @else {{'0'}} @endif,
 	"TG" : @if(array_key_exists('Togo',$nbr_users_by_country)) {{$nbr_users_by_country['Togo']}} @else {{'0'}} @endif,
 	"TD" : @if(array_key_exists('Chad',$nbr_users_by_country)) {{$nbr_users_by_country['Chad']}} @else {{'0'}} @endif,
 	"LY" : @if(array_key_exists('Libya',$nbr_users_by_country)) {{$nbr_users_by_country['Libya']}} @else {{'0'}} @endif,
 	"AE" : @if(array_key_exists('United Arab Emirates',$nbr_users_by_country)) {{$nbr_users_by_country['United Arab Emirates']}} @else {{'0'}} @endif,
 	"VE" : @if(array_key_exists('Venezuela',$nbr_users_by_country)) {{$nbr_users_by_country['Venezuela']}} @else {{'0'}} @endif,
 	"AF" : @if(array_key_exists('Afghanistan',$nbr_users_by_country)) {{$nbr_users_by_country['Afghanistan']}} @else {{'0'}} @endif,
 	"IQ" : @if(array_key_exists('Iraq',$nbr_users_by_country)) {{$nbr_users_by_country['Iraq']}} @else {{'0'}} @endif,
 	"IS" : @if(array_key_exists('Iceland',$nbr_users_by_country)) {{$nbr_users_by_country['Iceland']}} @else {{'0'}} @endif,
 	"IR" : @if(array_key_exists('Iran',$nbr_users_by_country)) {{$nbr_users_by_country['Iran']}} @else {{'0'}} @endif,
 	"AM" : @if(array_key_exists('Armenia',$nbr_users_by_country)) {{$nbr_users_by_country['Armenia']}} @else {{'0'}} @endif,
 	"AL" : @if(array_key_exists('Albania',$nbr_users_by_country)) {{$nbr_users_by_country['Albania']}} @else {{'0'}} @endif,
 	"AO" : @if(array_key_exists('Angola',$nbr_users_by_country)) {{$nbr_users_by_country['Angola']}} @else {{'0'}} @endif,
 	"AR" : @if(array_key_exists('Argentina',$nbr_users_by_country)) {{$nbr_users_by_country['Argentina']}} @else {{'0'}} @endif,
 	"AU" : @if(array_key_exists('Australia',$nbr_users_by_country)) {{$nbr_users_by_country['Australia']}} @else {{'0'}} @endif,
 	"AT" : @if(array_key_exists('Austria',$nbr_users_by_country)) {{$nbr_users_by_country['Austria']}} @else {{'0'}} @endif,
 	"IN" : @if(array_key_exists('India',$nbr_users_by_country)) {{$nbr_users_by_country['India']}} @else {{'0'}} @endif,
 	"TZ" : @if(array_key_exists('Tanzania',$nbr_users_by_country)) {{$nbr_users_by_country['Tanzania']}} @else {{'0'}} @endif,
 	"AZ" : @if(array_key_exists('Azerbaijan',$nbr_users_by_country)) {{$nbr_users_by_country['Azerbaijan']}} @else {{'0'}} @endif,
 	"IE" : @if(array_key_exists('Ireland',$nbr_users_by_country)) {{$nbr_users_by_country['Ireland']}} @else {{'0'}} @endif,
 	"ID" : @if(array_key_exists('Indonesia',$nbr_users_by_country)) {{$nbr_users_by_country['Indonesia']}} @else {{'0'}} @endif,
 	"UA" : @if(array_key_exists('Ukraine',$nbr_users_by_country)) {{$nbr_users_by_country['Ukraine']}} @else {{'0'}} @endif,
 	"QA" : @if(array_key_exists('Qatar',$nbr_users_by_country)) {{$nbr_users_by_country['Qatar']}} @else {{'0'}} @endif,
 	"MZ" : @if(array_key_exists('Mozambique',$nbr_users_by_country)) {{$nbr_users_by_country['Mozambique']}} @else {{'0'}} @endif,
      }
    }]
  },
  onRegionClick: function (event, code) {
    var name = maps.mapData.paths[code].name;
    alert(name);
  },
  });
});


</script>






@endsection
