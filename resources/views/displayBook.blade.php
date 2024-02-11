@extends('layouts.main')

@section('container')
    <img src="{{ asset('storage/images/' . $book->image) }}" alt="&nbsp;&nbsp;'{{ $book->name }}' Image">
    <br>
    <br>
    <p><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong>{{ $book['name'] }}</p>
    <p><strong>Category&nbsp;&nbsp;: </strong>{{ $book->genre->name }}</p>
    <p><strong>Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong>Rp.{{ $book['price'] }},00.</p>
    <p><strong>Quantity&nbsp;&nbsp;&nbsp;: </strong>{{ $book['quantity'] }}</p>
    <br>

    @auth
        @if(auth()->user()->isAdmin())
            <a href="/edit-item/{{ $book->id }}"><button type="button" class="btn btn-warning mt-2">Edit</button></a>
            <br>
            <br>
            <form action="/delete-item/{{ $book->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to DELETE?')">Delete</button>
            </form>
        @endif
    @endauth

    <h2 class="mt-5">Bought By:</h2>
    <ul>
        @foreach ($book->customer as $customer)
            <li>{{ $customer->name }}</li>
        @endforeach()
    </ul>
@endsection
