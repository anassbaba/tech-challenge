@extends('static._layout.master')

@section('title', 'Login')

@section('page-content')

	<div class="login">
		<form>
			<div class="errors">
				<span>- Wrong email or password.</span>
			</div>
			<input type="text" name="email" placeholder="Email adress">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="submit" value="Login">
			<span class="divider"></span>
			<span>- <a href="{{ route('static.guest.reset-password') }}">Reset password</a></span>
			<span>- <a href="{{ route('static.guest.register') }}">Register</a></span>
		</form>
	</div>

@endsection