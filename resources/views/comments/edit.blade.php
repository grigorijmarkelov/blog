@extends('main')

@section('title', '| Edit Comment')

@section('content')
        <h2>Edit Comment</h2>
        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
                <label for="name">Name</label>
                <textarea type="text" class="form-control" id="name" name="name" rows="1" style="resize:none;" readonly>{{ $comment->name }}</textarea>
        </div>
        <div class="form-group">
                <label for="email">Email</label>
                <textarea type="text" class="form-control" id="email" name=email" rows="1" style="resize:none;" readonly>{{ $comment->email }}</textarea>
        </div>
        <div class="form-group">
                <label for="comment">Comment</label>
                <textarea type="text" class="form-control" id="comment" name="comment">{{ $comment->comment }}</textarea>
        </div>
        <button type="submit" value="Save Changes" class="btn btn-success btn-block">Update Comment</button>

        </form>
@endsection
