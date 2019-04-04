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

    <script src="{{ asset('js/jquery.min.js') }}"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<<<<<<< HEAD
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
=======
>>>>>>> fdcc61d13df0bf5661f4612b36a5fb4118e0794c

</head>
<body>
    <nav class="navbar navbar-expand navbar-primary main-nav">
        <a class="navbar-brand" href="#">
          <img src="{{asset('img/logo.png')}}" alt="">
        </a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <ion-icon name="create" class="align-middle"></ion-icon>
          </li>
          <li class="nav-item">
            <ion-icon name="chatboxes" class="align-middle"></ion-icon>
          </li>
          <li class="nav-item">
            <ion-icon name="notifications" class="align-middle"></ion-icon>
          </li>
          <li class="nav-item nav-avatar ">
            <img src="{{asset('img/avatar.jpg')}}" alt="">
          </li>
        </ul>
    </nav>




        @yield('content')

    <!-- Scripts -->

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>


</body>
</html>
