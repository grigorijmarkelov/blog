@extends('main')
@section('title','| View Post')

@section('content')
<div class="row">
    <div class="col-md-8">
        <img src="{{ asset('images/' . $post->image)}}" alt="This is the photo">
	<h1>{{ $post->title }}</h1>
        <p class='lead'>{{ $post->body }}</p>
        <hr>
        <div class="any">
        @foreach ($post->tags as $tag)
                <span class="badge badge-primary badge-pill">{{ $tag->name }}</span>
        @endforeach
        </div>
        <div id="backend-comments" class="mt-5">
                <h3>Comments  <small>{{ $post->comments()->count() }} total</small></h3>
                <table class="table">
                        <thead>
                                <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th width="70px"></th>
                                </tr>
                        </thead>
                        <tbody>
                        @foreach ($post->comments as $comment)
                                <tr>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ $comment->email }}</td>
                                        <td>{{ $comment->comment }}</td>
                                        <td><a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-info">Edit</a>
                                            <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger">Delete</a></td>
                                </tr>
                        @endforeach
                        </tbody>
                </table>
        </div>            
    </div>
    <div class="col-md-4">
	<div class="jumbotron">
	    <dl class="dl-horizontal">
		<label>URL Slug:</label>
		<p><a href="{{ route('blog.single',$post->slug) }}">{{ route('blog.single',$post->slug) }}</a></p>
	    </dl>
	    <dl class="dl-horizontal">
                <label>Category:</label>
                <p>{{ $post->category->name }}</p>
	    </dl>
	    <dl class="dl-horizontal">
		<label>Created At:</label>
		<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
	    </dl>
	    <dl class="dl-horizontal">
		<label>Last updated At:</label>
		<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
	    </dl>
	    <hr>
	    <div class="row">
		<div class="col-sm-6">
		    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>	
		</div>
		<div class="col-sm-6">
		    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
			<input type="submit" value="Delete" class="btn btn-danger btn-block">
			<input type="hidden" name="_token" value="{{Session::token() }}">
			{{ method_field('DELETE') }}
		    </form>
		</div>
	    </div>
	    <br>
	    <div class="row">
		<div class="col-md-12">
		    <a href="{{ route('posts.index') }}" class="btn btn-block btn-h1-spacing alert alert-light"> See All Posts</a>
		</div>
	    </div>
	</div>
    </div>
</div>
@endsection
