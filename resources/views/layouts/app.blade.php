<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
    
    <!-- ======= CSS ========== -->
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<link rel="stylesheet" href="{{ mix('css/app.min.css') }}">
	<link rel="stylesheet" href="{{ mix('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ mix('css/main.css') }}">

    <title>@yield('title') @lang(' | PHP Naitei Ecommerce')</title>
</head>
<body>
	@include('shared.header')
	
	@yield('content')
	
	@include('shared.footer')
	
	<!-- ========= JS ========= -->
	<script language="JavaScript" type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="https://kit.fontawesome.com/051b553a10.js"></script>
</body>
</html>
