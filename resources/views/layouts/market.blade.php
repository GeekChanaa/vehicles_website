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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" href="{{ asset('slick/slick-theme.css') }}"/>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
</head>
<body>
      <nav class="main-nav navbar navbar-default">
        <div class="container">
          <!-- Navbar Header [contains both toggle button and navbar brand] -->
          <div class="navbar-header col-3">
            <!-- Toggle Button [handles opening navbar components on mobile screens]-->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#exampleNavComponents" aria-expanded="false">
              <i class="glyphicon glyphicon-align-center"></i>
            </button>

            <!-- Navbar Brand -->
            <a href="{{url('/')}}" class="navbar-brand">
              <img src="{{asset('img/logo.png')}}" alt="">
            </a>
          </div>

          <!-- Navbar Collapse [contains navbar components such as navbar menu and forms ] -->
          <div class="collapse navbar-collapse col-9" id="exampleNavComponents">

            <!-- Navbar Button -->
            @guest
            <button type="button" class="navbar-right"><a href="{{ route('login') }}">Login</a></button>
            <button type="button" class="navbar-right"><a href="{{ route('register') }}">Register</a></button>
            @else
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
          @endguest

        </div>
        </div>
      </nav>


        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/frontend.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('slick/slick.min.js') }}"></script>

</body>
</html>
