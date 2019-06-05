<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="shortcut icon" href="img/fav.png">
    
    <!-- ======= CSS ========== -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>@yield('title') @lang(' | PHP Naitei Ecommerce')</title>
</head>
<body>
	@include('shared.header')
	
	@yield('content')
	
	@include('shared.footer')
	
	<!-- ========= JS ========= -->
	<script src="{{ asset('js/app.min.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
</body>
</html>
