<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>User-name | @yield('title')</title>
  <link rel="icon" href="{{asset('media/logo/favicon.png')}}" />
  @yield('meta')
  @yield('style1')
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="https://kit.fontawesome.com/ce564b7b65.js" crossorigin="anonymous"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('style2')

  </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <!-- Navbar -->
  @include('components.post.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('components.post.leftbar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('body')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('components.post.rightbar')
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('components.post.footer')
</div>
@yield('script1')
<script src="{{asset('js/app.js')}}"></script>
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  </script>
@yield('script2')
</body>
</html>
