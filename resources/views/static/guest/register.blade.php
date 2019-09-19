@extends('static._layout.master')

@section('title', 'Register')

@section('page-content')

	<div class="register">
		<form>
			<input type="text" name="email" placeholder="Email adress">
			<input type="password" name="password" placeholder="Password">
			<input type="password" name="password_confirmation" placeholder="Password confirmation">
			<input type="submit" name="submit" value="Register">
			<span class="divider"></span>
			<span>- Already member: <a href="{{ route('static.guest.login') }}">login</a></span>
			<span>- <a href="#">Reset password</a></span>
		</form>
	</div>

@endsection