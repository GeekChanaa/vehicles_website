<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="description" content="">
    <meta name="author" content="">
   <meta name="_token" content="{{csrf_token()}}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-jvectormap-world-mill.js') }}">

    <script src="{{ asset('js/jquery.min.js') }}"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand navbar-primary main-nav">
        <a class="navbar-brand" href="{{url('/Dashboard')}}">
          <img src="{{asset('img/logo.png')}}" alt="">
        </a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <ion-icon name="create" class="align-middle"></ion-icon>
          </li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
            <ion-icon name="chatboxes" class="align-middle"></ion-icon>
          </li>
          <li class="nav-item">
            <ion-icon name="notifications" class="align-middle"></ion-icon>
          </li>
          <li class="nav-item nav-avatar ">
            <div class="pdp-box" style="background-image: url('{{asset('storage/users_pdp/'.Auth::user()->num_tel.'.jpg')}}');" alt="">
          </li>
        </ul>
    </nav>
    <div class="wrapper">
      <div class="sidebar">
        <div class="user-section">
          <div class="user-avatar" style="background-image: url('{{asset('storage/users_pdp/'.Auth::user()->num_tel.'.jpg')}}');">
          </div>
          <a href="">{{Auth::user()->name}}</a>
          <nav class="navbar navbar-expand navbar-primary secondary-nav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <ion-icon name="create" class="align-middle"></ion-icon>
              </li>
              <li class="nav-item">
                <ion-icon name="chatboxes" class="align-middle"></ion-icon>
              </li>
              <li class="nav-item">
                <ion-icon name="notifications" class="align-middle"></ion-icon>
              </li>
            </ul>
        </nav>
        </div>
        <div class="routes-section">
          <div class="row">
            <ion-icon name="car" class="col-2"></ion-icon>
            <a href="{{url('/MarketDashboard')}}" class="col-10">Market Dashboard</a>
          </div>
          <div class="row">
            <ion-icon name="quote" class="col-2"></ion-icon>
            <a href="{{url('/BlogDashboard')}}" class="col-10">Blog Dashboard</a>
          </div>
          <div class="row">
            <ion-icon name="hammer" class="col-2"></ion-icon>
            <a href="{{url('/ServicesDashboard')}}" class="col-10">Services Dashboard</a>
          </div>
          <div class="row">
            <ion-icon name="school" class="col-2"></ion-icon>
            <a href="{{url('/EncyclopediaDashboard')}}" class="col-10">Encyclopedia Dashboard</a>
          </div>
        </div>
        <ion-icon class="collapse-btn" name="menu"></ion-icon>
      </div>
    </div>
      @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>


</body>
</html>
