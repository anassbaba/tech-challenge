@extends('static._layout.master')

@section('title', 'Register')

@section('page-content')
	<div class="register">
		<form method="POST" action="{{ route('static.guest.register') }}">
			
			@if ($errors->any())
			<div class="errors">
				@foreach ($errors->all() as $error)
                	<span>- {{ $error }}</span>
            	@endforeach
			</div>
			@endif

			@csrf
			
			<input type="text" name="email" placeholder="Email adress">
			<input type="password" name="password" placeholder="Password">
			<input type="password" name="password_confirmation" placeholder="Password confirmation">
			<input type="submit" name="submit" value="Register">
			<span class="divider"></span>
			<span>- Already member: <a href="{{ route('static.guest.login') }}">login</a></span>
		</form>
	</div>

@endsection