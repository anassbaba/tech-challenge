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
					<a href="{{ route('static.guest.wall') }}"><span class="@if(Request::path() == 'wall') active @endif">- wall</span></a><br>
					@if(!auth()->user())
						<a href="{{ route('static.guest.login') }}"><span class="@if(Request::path() == 'login') active @endif">- login</span></a><br>
						<a href="{{ route('static.guest.register') }}"><span class="@if(Request::path() == 'register') active @endif">- register</span></a><br>
					@endif
			</div>

			@if(auth()->user())
			<div class="item">
				<span>- Item</span><br>
					<a href="{{ route('static.user.item.all') }}"><span class="@if(Request::path() == 'user/item/all') active @endif">- all</span></a><br>
					<a href="{{ route('static.user.item.create') }}"><span class="@if(Request::path() == 'user/item/create') active @endif">- create</span></a>
			</div>
			<div class="account">
				<span>- Account</span><br>
					<a href="{{ route('static.user.account.update-password') }}"><span class="@if(Request::path() == 'user/account/update-password') active @endif">- update password</span></a><br>
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