@extends('layouts.app')

@section('content')
	<div class="col-md-8">
		@foreach ($posts as $post)
			<div class="card clearfix">
				<div class="manage-button pull-right">
					<a href="{{ route('posts.edit', ['post' => $post])}}"><button class="btn btn-warning">Edit</button></a>
					<a href=""><button class="btn btn-danger">Delete</button></a>
				</div>
				<h2 class="title"><a href="">{{ $post->title }}</a></h2>
						
				<div class="meta">
					<span>by <a href="#">{{ $post->user->username }}</a></span> -
					<span>{{ $post->created_at->format('d M Y') }}</span>
				</div>
				<p class="content">{{ $post->content }}</p>

				<div class="pull-left">
					<span>Likes 147</span>
					<span>Comments 3</span>
				</div>
			</div>
		@endforeach
	</div>
@endsection
