@extends('static._layout.master')

@section('title', 'Login')

@section('page-content')

	<div class="login-register">
		<form method="POST" action="{{ route('static.guest.login') }}">
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
            
			<input type="text" name="email" placeholder="Email adress">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="submit" value="Login">
			<span class="divider"></span>
			<span>- <a href="{{ route('static.guest.register') }}">Register</a></span>
		</form>
	</div>

@endsection