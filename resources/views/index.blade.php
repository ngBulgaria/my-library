@extends('master')
 
@section('content')
 
	<ul>
    @foreach($books as $book)
        <li><a href="/book/{{ $book->id }}">{{ $book->name }}</a></li>
    @endforeach
	</ul>
 
@endsection