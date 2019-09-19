@extends('static._layout.master')

@section('title', 'Update Password')

@section('page-content')

	<div class="login">
		<form method="POST" action="{{ route('static.user.account.update-password') }}">
		
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
			<input type="password" name="old_password" placeholder="Old password">
			<input type="password" name="new_password" placeholder="New password">
			<input type="password" name="new_password_confirmation" placeholder="Confirm new wassword">
			<input type="submit" name="submit" value="Update">
		</form>
	</div>

@endsection