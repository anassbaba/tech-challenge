@extends('static._layout.master')

@section('title', 'Home - Wall')

@section('page-content')

	<div class="wall">

		@if (session('success') != null)
		<span  style="color:green; text-align: center;">
			<span> {{ session('success') }}</span>
		</span>
		@endif

		@if(!auth()->user()->items()->count())
			<b style="text-align: center; color: gray;">You have no items.</b>
		@endif

		@foreach ($items = auth()->user()->items()->orderBy('id', 'desc')->paginate(3) as $item)
			<div class="card">
				<div class="card-info">
					<a href="{{ route('static.user.item.remove', $item->id) }}" class="remove" style="color: red;">(id: {{ $item->id }}) Remove</a>
					<span class="date">{{ $item->created_at->diffForHumans() }}</span>
				</div>
				<img src="{{ asset($item->image) }}">
				<b class="title">{{ $item->title }}</b>
				<p> {{ $item->description }}</p>
			</div>
		@endforeach

		
		<div class="paginate" style="display: inline-block;text-align: center;">
			@if($items->previousPageUrl())
				<a href="{{ $items->previousPageUrl() }}" style="text-align: center;text-decoration: none;">< prev</a>
			@endif

			@if(auth()->user()->items()->count())
				<span>({{ $items->currentPage() }})</span>
			@endif

			@if($items->hasMorePages())
				<a href="{{ $items->nextPageUrl() }}" style="text-align: center;text-decoration: none;">next ></a>
			@endif
		</div>
	</div>

@endsection