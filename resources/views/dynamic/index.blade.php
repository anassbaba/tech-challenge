<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/static/app.css') }}">

	<noscript>
    	<meta HTTP-EQUIV="REFRESH" content="0; url=http://static.tech-chalange.test"> 
	</noscript>

</head>
<body>
	<div id="app" class="app">
		<menu-component></menu-component>

		<router-view></router-view>
	</div>
	
	<script type="text/javascript">      
  		window.csrf_token = "{{ csrf_token() }}"
	</script>
	<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>