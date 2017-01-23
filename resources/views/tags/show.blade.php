@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h2>{{ $tag->name }}</h2>
		@foreach ($posts as $post)
			<div class="card clearfix">
				<h2 class="title"><a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->title }}</a></h2>
				<div class="meta">
					<span>by <a href="#">{{ $post->user->username }}</a></span> -
					<span>{{ $post->created_at->format('d M Y') }}</span>
				</div>
				<p class="content">{{ $post->content }}</p>

				<div class="pull-left">
					<span>Likes 147</span>
					<span>Comments 3</span>
				</div>
				<button class="btn btn-primary pull-right">Readmore</button>
			</div>
		@endforeach
	</div>
		
	<div class="col-md-12 text-center">
		{!! $posts->links() !!}
	</div>
</div>
@endsection