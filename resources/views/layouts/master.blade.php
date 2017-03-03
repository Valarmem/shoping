<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}">

	@yield('styles')
</head>
<body>
@include('partials.header')
<div class="container">
	@yield('content')
</div>
<script src="{{ URL::to('/js/jquery.1.12.4.js') }}"></script>
<script src="{{ URL::to('/bootstrap/js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>
</html>
