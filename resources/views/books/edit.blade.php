@extends('master')
 
@section('content')
 

    <form method="post" action="/editbook/{{$book->id}}" enctype="multipart/form-data" id="add_book">
         {{ csrf_field() }}
        <h2>Edit a book</h2>
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Book name</label>
            <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="name" value="{{$book->name}}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="isbn" class="col-sm-3 col-form-label">ISBN</label>
            <div class="col-sm-9">
                <input name="isbn" type="text" class="form-control" id="isbn"
                       value="{{$book->isbn}}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="year" class="col-sm-3 col-form-label">Year</label>
            <div class="col-sm-9">
                <input name="year" type="number"  min="1" max="{{ date('Y') }}" class="form-control" id="year"
                       value="{{$book->year}}" required>
            </div>
        </div>
         <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
				<textarea rows="4" cols="50" name="description" id="description" class="form-control" required>{{$book->description}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-sm-3 col-form-label">Cover Image</label>
            <div class="col-sm-9">
                <input name="image" type="file" id="image" class="form-control">
                            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    @include('partials.formerrors')
    </form>
 
@endsection