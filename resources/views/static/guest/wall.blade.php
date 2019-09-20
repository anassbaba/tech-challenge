@extends('static._layout.master')

@section('title', 'Home - Wall')

@section('page-content')

	<div class="wall">

		@if(!\DB::table('items')->count())
			<b style="text-align: center; color: gray;">No items.</b>
		@endif

		@foreach ($items = \DB::table('items')->orderBy('id', 'desc')->paginate(3) as $item)
			<div class="card">
				<div class="card-info">
					<span>poster: {{ App\User::find($item->user_id)->email ?? 'Unknown' }}</span>
					<span class="date">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
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
			
			@if(\DB::table('items')->count())
				<span>({{ $items->currentPage() }})</span>
			@endif

			@if($items->hasMorePages())
				<a href="{{ $items->nextPageUrl() }}" style="text-align: center;text-decoration: none;">next ></a>
			@endif
		</div>
	</div>

@endsection