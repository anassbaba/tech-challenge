@extends('static._layout.master')

@section('title', 'Login')

@section('page-content')

	<div class="login">
		<form>
			<input type="text" name="email" placeholder="Email adress">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="submit" placeholder="Login">
			<span class="divider"></span>
			<span>- <a href="#">Register</a></span>
			<span>- <a href="#">Reset password</a></span>
		</form>
	</div>

@endsection