@extends('main')
@section('title','Create New Post')
@section('stylesheets')
<link rel='stylesheet' href='/css/parsley.css'>
<link rel='stylesheet' href='/css/select2.min.css'>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
tinymce.init({ selector: 'textarea',
               menubar: false });
</script>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			
			 <form data-parsley-validate action="{{route('posts.store') }}"  method='POST' enctype="multipart/form-data">
				<div class="form-group">
					<label for='title'>Title</label>
					<input type='text' name='title' class='form-control' maxlength='7' required>
				</div>
				<div class="form-group">
					<label for="slug">Slug</label>
					<input type='text' name='slug' class='form-control' maxlength='255' minlength='5' required>
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
                                <div class='form-group'>
                                        <label for="featured_image">Upload featured image:</label>
                                        <input type="file" class="form-control-file" id="featured_image" name="featured_image">
                                </div>
                           
				<div class='form-group'>
                                        <label for="body">Subject</label>   
    <textarea type="text" name="body" class="form-control input-lg" id="body" rows="7"></textarea>
				</div>
				<br>
				<input type="submit" value='Create Post' class='btn btn-success btn-lg btn-block'>
				<input type='hidden' name='_token' value="{{Session::token() }}">
			</form>
		</div>
	</div>
@endsection

@section('scripts')
<script src="/js/parsley.js"></script>
<script src="/js/select2.min.js"></script>
<script>
        $('.select2-multi').select2();
</script>
@endsection
