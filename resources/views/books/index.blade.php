@extends('master')
 
@section('content')
 	<h1>My Books</h1>
	<ul>
    @foreach($books as $book)
        <li><a href="/book/{{ $book->id }}">{{ $book->name }}</a> - <a href="/delete/{{ $book->id }}">Delete Book</a> - <a href="/editbook/{{ $book->id }}">Edit Book</a></li>
    @endforeach
	</ul>

 
 
    <form method="post" action="/books" enctype="multipart/form-data" id="add_book">
        {{ csrf_field() }}
        <h2>Add a book</h2>
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Book name</label>
            <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="name" placeholder="Book name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="isbn" class="col-sm-3 col-form-label">ISBN</label>
            <div class="col-sm-9">
                <input name="isbn" type="text" class="form-control" id="isbn"
                       placeholder="ISBN" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="year" class="col-sm-3 col-form-label">Year</label>
            <div class="col-sm-9">
                <input name="year" type="number" min="1" max="{{ date('Y') }}" max-size="4" class="form-control" id="year"
                       placeholder="Year" required>
            </div>
        </div>
         <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
				<textarea rows="4" cols="50" name="description" id="description" class="form-control" required></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-sm-3 col-form-label">Cover Image</label>
            <div class="col-sm-9">
                <input name="image" type="file" id="image" class="form-control" required>
                            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Add Book</button>
            </div>
        </div>
    @include('partials.formerrors')
    </form>
 
@endsection