<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<!--JQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!--JS propio-->
	<script type="text/javascript" src="/js/script.js"></script>
	
	<!--Bootstrap-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">

	<!--Font Awesome (iconos)-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


</head>
<body>
	<br>
	<div class="container">
	  @yield('content')
	</div>
</body>
</html>