@extends('layouts.main')

@section('container')


<h1>Library</h1>
@foreach($books as $book)
<br>
<a href="/display-book/{{ $book['id'] }}"><h2>Book Title: {{ $book['title'] }}</h2></a>
<p>Author: {{ $book['author'] }}</p>
<p>Description: {{ $book['description'] }}</p>
@endforeach


@endsection