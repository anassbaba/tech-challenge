@extends('static._layout.master')

@section('title', 'Login')

@section('page-content')

	<div class="reset-password">
		<form>
			<input type="text" name="email" placeholder="Email adress">
			<input type="submit" name="submit" value="reset">
		</form>
	</div>

@endsection