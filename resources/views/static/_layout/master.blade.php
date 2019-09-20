<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/static/app.css') }}">
</head>
<body>

	<div class="app logged-in">

		
		<div class="menu">
			@if(auth()->user())
			<div class="user">
				#: <b> {{ auth()->user()->email }}</b>
			</div>
			@endif
			<div class="home">
				<span>- Home</span><br>
					<a class="active" href="{{ route('static.guest.wall') }}">- wall</a><br>
					@if(!auth()->user())
						<a href="{{ route('static.guest.login') }}">- login</a><br>
						<a href="{{ route('static.guest.register') }}">- register</a><br>
					@endif
			</div>

			@if(auth()->user())
			<div class="item">
				<span>- Item</span><br>
					<a href="{{ route('static.user.item.all') }}">- all</a><br>
					<a href="{{ route('static.user.item.create') }}">- create</a>
			</div>
			<div class="account">
				<span>- Account</span><br>
					<a href="{{ route('static.user.account.update-password') }}">- update password</a><br>
					<a href="{{ route('static.guest.logout') }}">- logout</a>
			</div>
			@endif

		</div>
		

		<div class="page">
			@yield('page-content')
		</div>
	</div>

</body>
</html>