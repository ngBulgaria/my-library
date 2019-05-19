<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book: {{ $book->name }}</title>
    <link href="../css/custom.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
@include('partials.navbar')

	<div class="container">
	<br><br>
	@if(auth()->check())
	@if(auth()->user()->id == $book->user_id)
	<a href="/editbook/{{ $book->id }}">Edit Book</a><br>
	@endif
	@endif
	@if(!$incollection)
	<div class="space"></div>
	<a href="/addbook/{{ $book->id }}">Add Book to collection</a>
	<div class="space"></div>
	@else
	<div class="space"></div>
	<a href="/removebook/{{ $book->id }}">Remove book from collection</a>
	<div class="space"></div>
	@endif
	<div class="p50 pright">Name:</div><div class="p50 pleft">{{ $book->name }}</div>
	<div class="p50 pright">ISBN:</div><div class="p50 pleft">{{ $book->isbn }}</div>
	<div class="p50 pright">Year:</div><div class="p50 pleft">{{ $book->year }}</div>
	<div class="p50 pright">Description:</div><div class="p50 pleft">{{ $book->description }}</div>
	<div class="space"></div>
	<img src="{{ Storage::url($book->cover_image) }}" alt="{{ $book->name }}">
	</div>
@include('partials.footercontent')