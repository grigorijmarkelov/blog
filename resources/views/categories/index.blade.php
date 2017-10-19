@extends('main')

@section('title', '| All Categories')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>Categories</h1>
                <table class="table">
                        <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                                <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                </tr>
                       @endforeach 
                        </tbody>

                </table>
    </div> <!-- end of col-md-8 -->
    <div class="col-md-3">
        <div class="card card-block bg-faded">
            <h2 class="card-header card-title">New Category</h2>          
            <form action="{{ route('categories.store') }}" method="POST">
                <div class="card-block">
                <div class="form-group">
                    <label id="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                </div>
                <br>
                <input type="submit" value="Create New Category" class="btn btn-success btn-block">
                <input type="hidden" name="_token" value="{{Session::token() }}">
                
            </form>
        </div>
    </div>
</div>

@endsection
