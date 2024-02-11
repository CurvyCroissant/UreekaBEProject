@extends('layouts.main')

@section('container')
    <img src="{{ asset('storage/images/' . $item->image) }}" alt="&nbsp;&nbsp;'{{ $item->name }}' Image">
    <br>
    <br>
    <p><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong>{{ $item['name'] }}</p>
    <p><strong>Category&nbsp;&nbsp;: </strong>{{ $item->category->name }}</p>
    <p><strong>Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong>Rp.{{ $item['price'] }},00.</p>
    <p><strong>Quantity&nbsp;&nbsp;&nbsp;: </strong>{{ $item['quantity'] }}</p>
    <br>

    @auth
        @if(auth()->user()->isAdmin())
            <a href="/edit-item/{{ $item->id }}"><button type="button" class="btn btn-warning mt-2">Edit</button></a>
            <br>
            <br>
            <form action="/delete-item/{{ $item->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to DELETE?')">Delete</button>
            </form>
        @else
            <a href="{{ url('/') }}" class="btn btn-dark">Add to Cart</a>
        @endif
    @endauth

@endsection
