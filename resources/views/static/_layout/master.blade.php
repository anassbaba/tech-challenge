<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/static/app.css') }}">
</head>
<body>

	<div class="app">
		@yield('page-content')
	</div>

</body>
</html>