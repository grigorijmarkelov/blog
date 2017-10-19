@extends('main')
@section('title', '| Edit Blog Post')

@section('stylesheets')
<link rel='stylesheet' href='/css/select2.min.css'>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
tinymce.init({ selector: 'textarea',
               menubar: false });
</script>
@endsection
@section('content')
<div class="row">
    <div class="col-md-8">
	<form method="POST" action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<div class="form-group">
	<label for="title">Title:</label>
	    <input type="text" class="form-control input-lg" id="title" name="title" value="{{ $post->title }}">
        </div>
	<div class="form-group">
	<label for="slug">URL Slug:</label>
	    <input type="text" class="form-control input-lg" id="slug" name="slug" value="{{ $post->slug }}">
        </div>
        <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control"  id="category_id" name="category_id" required>
        @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        </select>
        </div>
        <div class="form-group">
                <label for="tags">Tags:</label>
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
                </select>
        </div>
        <div class="form-group">
                <label for="featured_image">Update featured image:</label>
                <input type="file" class="form-control-file" id="featured_image" name="featured_image">
        </div>
        <div class="form-group">
	    <label for="body">Body:</label>
	    <textarea type="text" class="form-control input-lg" id="body" name="body" rows="7">{{ $post->body }}</textarea>
        </div>
    </div>
    <div class="col-md-4">
	<div class="well">
	    <dl class="dl-horizontal">
		<label>URL Slug:</label>
		<p class="text-muted"><a href="{{ url($post->slug) }}">{{ url($post->slug) }}</a></p>
	    </dl>
	    <dl class="dl-horizontal">
		<label>Category:</label>
		<p class="text-muted">{{ $post->category->name }}</p>
	    </dl>
	    <dl class="dl-horizontal">
		<label>Created At:</label>
		<p class="text-muted">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
	    </dl>
	    <dl class="dl-horizontal">
		<label>Last updated At:</label>
		<p class="text-muted">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
	    </dl>
	    <hr>
	    <div class="row">
		<div class="col-sm-6">
		    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>	
		</div>
		<div class="col-sm-6">
		    <button type="submit" value="Save Changes" class="btn btn-success btn-block">Save Changes</button>	
		</div>
            </form>
	    </div>
	</div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/js/select2.min.js"></script>
<script>
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
</script>
@endsection
