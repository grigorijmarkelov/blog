@extends('main')

@section('title', '| All Tags')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>Tags</h1>
                <table class="table">
                        <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                </tr>
                        </thead>
                        <tbody>
                        @foreach ($tags as $tag)
                                <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                                </tr>
                       @endforeach 
                        </tbody>

                </table>
    </div> <!-- end of col-md-8 -->
    <div class="col-md-3">
        <div class="card card-block bg-faded">
            <h2 class="card-header card-title">New Tag</h2>          
            <form action="{{ route('tags.store') }}" method="POST">
                <div class="card-block">
                <div class="form-group">
                    <label id="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                </div>
                <br>
                <input type="submit" value="Create New Tag" class="btn btn-success btn-block">
                <input type="hidden" name="_token" value="{{Session::token() }}">
                
            </form>
        </div>
    </div>
</div>

@endsection
