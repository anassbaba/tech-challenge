<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/static/app.css') }}">
</head>
<body>

	<div class="app logged-in">

		<div class="menu">
			<div class="user">
				Email: <b> elmehdiabdi@hotmil.com</b>
			</div>
			<div class="item">
				<span>- Item</span><br>
					<a href="{{ route('static.user.item.all') }}">- all</a><br>
					<a href="{{ route('static.user.item.create') }}">- create</a>
			</div>
			<div class="account">
				<span>- Account</span><br>
					<a href="{{ route('static.user.account.update-password') }}">- update password</a><br>
					<a href="{{ route('static.user.item.create') }}">- logout</a>
			</div>
		</div>

		<div class="page">
			@yield('page-content')
		</div>
	</div>

</body>
</html>