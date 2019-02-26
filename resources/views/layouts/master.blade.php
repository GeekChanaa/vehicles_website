<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link href = {{ asset("css/dashboard.css") }} rel="stylesheet" />
    <link href = {{ asset("css/bootstrap.min.css") }} rel="stylesheet" />
  </head>
  <body>
    <!-- content -->
    @yield('content')
    <!-- Essential Libraries -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src={{ asset("js/jquery.min.js") }}></script>
    <script src={{ asset("js/pooper.min.js") }}></script>
    <script src={{ asset("js/bootstrap.js") }}></script>
   </body>
</html>
