@extends('static._layout.master')

@section('title', 'Home - Wall')

@section('page-content')

	<div class="wall">
		<div class="card">
			<div class="card-info">
				<a href="#" class="edit" style="color: blue">Edit</a>
				<a href="#" class="remove" style="color: red">Remove</a>
				<span class="date">23 munite ago</span>
			</div>
			<img src="https://picsum.photos/300/150?random=1">
			<div class="title">Technologies to use</div>
			<p>
				Read the instructions carefully and do not hesitate to check the Links and resources section before you start.
				Join us in slack, then join #tech-challenge and do not hesitate to address any question,
			</p>
		</div>
	</div>

@endsection