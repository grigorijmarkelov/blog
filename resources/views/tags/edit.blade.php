@extends('main')

@section('title', "| Edit Tag")
@section('content')

	<form method="POST" action="{{ route('tags.update',$tag->id) }}">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<div class="form-group">
	<label for="name">Name:</label>
	    <textarea type="text" class="form-control input-lg" id="name" name="name" rows="1" style="resize:none;">{{ $tag->name }}</textarea>
        </div>
	<button type="submit" value="Save Changes" class="btn btn-success">Save Changes</button>	
        </form>
@endsection
