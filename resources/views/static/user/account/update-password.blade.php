@extends('static._layout.master')

@section('title', 'Update Password')

@section('page-content')

	<div class="login-register">
		<form method="POST" action="{{ route('static.user.account.update-password') }}">
			@if ($errors->any())
				<div class="errors">
					@foreach ($errors->all() as $error)
                		<span>- {{ $error }}</span>
            		@endforeach
				</div>
			@endif

			@if (session('messages') != null)
				@if(isset(session('messages')['errors']))
				    <div class="errors">
				    	@foreach(session('messages')['errors'] as $error)
					    	<span>- {{ $error }}</span>
				    	@endforeach
				    </div>
				@endif
			

				@if (isset(session('messages')['success']))
					<div class="errors">
						@foreach(session('messages')['success'] as $success)
							<span style="color:green">- {{ $success }}</span>
						@endforeach
					</div>
				@endif
            @endif
            
            @csrf
			<input type="password" name="old_password" placeholder="Old password" autocomplete="on">
			<input type="password" name="new_password" placeholder="New password" autocomplete="on">
			<input type="password" name="new_password_confirmation" placeholder="Confirm new wassword" autocomplete="on">
			<input type="submit" name="submit" value="Update">
		</form>
	</div>

@endsection
