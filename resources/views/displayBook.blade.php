@extends('layouts.main')

@section('container')

<h2>Book Title: {{ $book['title'] }}</h2>
<p>Author: {{ $book['author'] }}</p>
<p>Description: {{ $book['description'] }}</p>

<form action="/delete-book/{{ $book->id }}" method = "POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" onclick = "return confirm('Are you sure you want to delete?')">Delete</button>
</form>

<a href="/edit-book/{{ $book->id }}"><button type="button" class="btn btn-warning mt-2">Edit</button></a>

@endsection