<!DOCTYPE html>
<html lang="en">
<head>
<title>ADS | @yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="ADS Public School">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="{{asset('media/logo/favicon.png')}}" />
@yield('style1')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="https://kit.fontawesome.com/ce564b7b65.js" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('style2')
</head>
<body>

<div class="super_container" id="app">

	<!-- Header -->

	@include('components.pre.header')
	
	<!-- Home -->

	<!-- Features -->

	@yield('body')
	<!-- Newsletter -->

	@include('components.pre.newsletter')

	<!-- Footer -->
    @include('components.pre.footer')

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