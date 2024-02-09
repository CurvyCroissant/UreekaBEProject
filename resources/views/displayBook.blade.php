@extends('layouts.main')

@section('container')


<img src="{{ asset('/storage/book_images/'.$book->image) }}" alt="{{ $book->title }} Cover">
<h2>Book Title: {{ $book['title'] }}</h2>
<h3>Book Genre: {{ $book->genre->name }}</h3>
<p>Author: {{ $book['author'] }}</p>
<p>Description: {{ $book['description'] }}</p>

<form action="/delete-book/{{ $book->id }}" method = "POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" onclick = "return confirm('Are you sure you want to delete?')">Delete</button>
</form>

<a href="/edit-book/{{ $book->id }}"><button type="button" class="btn btn-warning mt-2">Edit</button></a>

<h2 class="mt-5">Bought By:</h2>
<ul>
@foreach($book->customer as $customer)

<li>{{ $customer->name }}</li>

@endforeach()
</ul>
@endsection