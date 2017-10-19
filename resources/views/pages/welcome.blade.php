@extends('main')
@section('title', '| Homepage')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1 class="display-3">Welcome to Laravel blog!</h1>
				<p class="lead">It is a jumbotron-style component for calling extra attention to featured content or information.</p>
				<hr class="my-4">
				<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
				<p class="lead">
					<a class="btn btn-primary btn-lg" href="#" role="button">Popular post</a>
				<p>
			</div>
		</div>

	</div> <!-- end of the row -->
	<div class="row">
		<div class="col-md-8">
		@foreach($posts as $post)
			<div class="post">
				<h3>{{ $post->title }}</h3>
				<p>{{ substr($post->body,0,50) }} {{ strlen($post->body > 50) ? "..." : "" }}</p>
				<a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read more</a>
			</div>
			<hr>
		@endforeach
		</div>
		<div class="col-md-3 col-md-offset-1">
			<h2>Sidebar</h2>
		</div>
	</div>
@endsection

@section('scripts')
<script>
	confirm("this is some javascript");
</script>
@endsection
