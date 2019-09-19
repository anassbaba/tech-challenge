@extends('static._layout.master')

@section('title', 'Item - Create')

@section('page-content')

	<div class="wall card-container">
		<div class="card">
			<form>
				<div class="errors">
					<span>- Wrong email or password.</span>
				</div>
				<input type="file" name="image" placeholder="Upload image">
				<input type="text" name="title" placeholder="Item title">
				<textarea name="message" rows="10" cols="30" placeholder="Item Description"></textarea>
				<input type="submit" name="create" value="Create">
			</form>
		</div>
	</div>

@endsection