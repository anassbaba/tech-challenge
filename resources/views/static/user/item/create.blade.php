@extends('static._layout.master')

@section('title', 'Item - Create')

@section('page-content')

	<div class="wall card-container">
		<div class="card">
			<form method="POST" action="{{ route('static.user.item.create') }}" enctype="multipart/form-data">
				
				@if ($errors->any())
				<div class="errors">
					@foreach ($errors->all() as $error)
                		<span>- {{ $error }}</span>
            		@endforeach
				</div>
				@endif

				@csrf
				<input type="file" name="image" placeholder="Upload image">
				<input type="text" name="title" placeholder="Item title">
				<textarea name="description" rows="10" cols="30" placeholder="Item Description"></textarea>
				<input type="submit" name="create" value="Create">
			</form>
		</div>
	</div>

@endsection