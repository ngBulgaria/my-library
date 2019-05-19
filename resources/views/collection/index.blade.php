@extends('master')
 
@section('content')
 	<h1>My Collection</h1>
	<ul>
    @foreach($books as $book)
        <li><a href="/book/{{ $book->id }}">{{ $book->name }}</a> - <a href="/removebook/{{$book->id}}">Remove from collection</a> </li>
    @endforeach
	</ul>

 
@endsection