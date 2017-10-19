@extends('main')
@section('title','| All Posts')

@section('content')
<div class="row">
	<div class="col-md-10">
		<h1>All Posts</h1>
	</div>
	<div class="col-md-2">
		<a href="{{ route('posts.create') }}" class="btn btn-primary btn-block btn-h1-spacing">Create New Post</a>
	</div>
	<div class="col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created At</th>
				<th></th>
			</thead>
			<tbody>
				@foreach($posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->title }}</th>
						<td>{{ substr($post->body,0,50) }} {{ strlen($post->body > 50) ? "..." : "" }}</td>
						<td>{{ date('M j, Y', strtotime($post->created_at)) }}</th>
						<td><a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-default">View</a><a href="{{ route('posts.edit', [$post->id]) }}" class="btn btn-default">Edit</a></th>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-xs-center">
		{!! $posts->links('vendor.pagination.bootstrap-4') !!}
		</div>
	</div>
</div>
@endsection
