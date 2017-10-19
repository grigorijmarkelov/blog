@extends('main')

@section('title',"| $post->title ")

@section('content')
<div class="row">
        <div class="col-md-8 mx-auto">
                <img src="{{ asset('images/' . $post->image) }}" height="400" width="800">
		<h1>{{ $post->title }}</h1>
		<p>{{ $post->body }}</p>
		<hr>
                <p>Posted in: {{ $post->category->name }}</p>
                <h3><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comments</h3>
                @foreach ($post->comments->sortByDesc('id') as $comment)
                <div class="media">
                        <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" class="img-thumbnail d-flex mr-3 rounded-circle"> 
                        <div class="media-body">
                               <h4>{{ $comment->name }}</h4>
                               <p class="font-italic">{{ $comment->created_at->diffForHumans() }}</p>
                                {{ $comment->comment }}
                        </div>
                <hr>
                </div>
        @endforeach
<div class="row">
        <div id="comment-form">
               <form action="{{ route('comments.store',$post->id) }}" method="POST">
                        <div class="row">
                                <div class="col-md-6 md-auto">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" class="form-control" required></input> 
                                </div>
                                <div class="col-md-6 md-auto">
                                        <label for="email">Email:</label>
                                        <input type="text" name="email" class="form-control" required></input>  
                                </div>
                                <div class="col-md-12">
                                        <label for="comment">Comment:</label>
                                        <textarea type="text" name="comment" class="form-control" required></textarea>
                                </div>
                        </div>
                        <input type="submit" value="Add Comment" class="btn btn-success btn-lg btn-block">
                        <input type='hidden' name='_token' value="{{Session::token() }}">
                </form>
        </div>
</div>
</div>
</div>
@endsection
