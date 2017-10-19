@extends('main')

@section('title','| DELETE COMMENT?')

@section('content')
        <div class="row">
                <div class="col-md-8 mx-auto">
                        <h1>ARE YOU SURE YOU WANT TO DELETE THIS COMMENT?</h1>
                        <p><strong>Name:</strong>{{ $comment->name }}</p>
                        <p><strong>Email:</strong>{{ $comment->email }}</p>
                        <p><strong>Comment:</strong>{{ $comment->comment }}</p>
		        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
			<input type="submit" value="Delete" class="btn btn-danger btn-block btn-lg">
			<input type="hidden" name="_token" value="{{Session::token() }}">
			{{ method_field('DELETE') }}
		        </form>
                </div>
        </div>
@endsection
