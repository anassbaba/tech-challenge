@extends('static._layout.master')

@section('title', 'Item - Edit')

@section('page-content')

	<div class="wall card-container">
		<div class="card">
			<form>
				<input type="file" name="image" placeholder="Upload image">
				<input type="text" name="title" placeholder="Item title">
				<textarea name="message" rows="10" cols="30" placeholder="Item Description"></textarea>
			</form>
		</div>
	</div>

@endsection