@extends('static._layout.master')

@section('title', 'Update Password')

@section('page-content')

	<div class="login">
		<form>
		<div class="errors">
			<span>- Wrong email or password.</span>
		</div>
			<input type="password" name="password" placeholder="Old password">
			<input type="password" name="password" placeholder="New password">
			<input type="password" name="password" placeholder="Confirm new wassword">
			<input type="submit" name="submit" value="Update">
		</form>
	</div>

@endsection