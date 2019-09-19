@extends('static._layout.master')

@section('title', 'Home - Wall')

@section('page-content')

	<div class="wall">

		@if (session('success') != null)
		<div class="errors">
			<p style="color:green; text-align: center;"> {{ session('success') }}</p>
		</div>
		@endif

		@foreach (auth()->user()->items as $item)
			<div class="card">
				<div class="card-info">
					<a href="{{ route('static.user.item.remove', $item->id) }}" class="remove" style="color: red;">Remove</a>
					<span class="date">{{ $item->created_at->diffForHumans() }}</span>
				</div>
				<img src="{{ asset($item->image) }}">
				<b class="title">{{ $item->title }}</b>
				<p> {{ $item->description }}</p>
			</div>
		@endforeach
	</div>

@endsection