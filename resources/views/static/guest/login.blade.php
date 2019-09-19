@extends('static._layout.master')

@section('title', 'Login')

@section('page-content')

	<div class="login">
		<form method="POST" action="{{ route('static.guest.login') }}">
			@if ($errors->any())
			<div class="errors">
				@foreach ($errors->all() as $error)
                	<span>- {{ $error }}</span>
            	@endforeach
			</div>
			@endif

			@if (session('error') != null)
			<div class="errors">
				<span>- {{ session('error') }}</span>
			</div>
			@endif

			@if (session('success') != null)
			<div class="errors">
				<span style="color:green">- {{ session('success') }}</span>
			</div>
			@endif
            
            @csrf
            
			<input type="text" name="email" placeholder="Email adress">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="submit" value="Login">
			<span class="divider"></span>
			<span>- <a href="{{ route('static.guest.register') }}">Register</a></span>
		</form>
	</div>

@endsection