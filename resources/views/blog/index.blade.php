@extends('main')

@section('title', '| Blog')
	<div class="row">
		<div class="col-md-10 mx-auto">
			<h1>Blog</h1>
		</div>
	</div>
@foreach($posts as $post)
	<div class="row">
		<div class="col-md-8 mx-auto">
			<h2>{{ $post->title }}</h2>
			<h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
			<p>{{ substr($post->body,0,50) }}{{ strlen($post->body)>0 ? "..." : ""}}</p>
			<a href="{{ route('blog.single', $post->slug)}}" class="btn btn-primary">Read more</a>
			<hr>
		</div>
	</div>
	@endforeach
	<div class="row">
		<div class="col-md-12">
			<div class="text-xs-center">
				{!! $posts->links('vendor.pagination.bootstrap-4') !!}
			</div>			
		</div>
	</div>
@section('content')

@endsection
