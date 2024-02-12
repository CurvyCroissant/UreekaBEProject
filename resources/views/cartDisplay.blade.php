@extends('layouts.main')

@section('container')
    <h1 class="mb-4">Cart</h1>
    <br>

    <h3>Items:</h3>
    <ul>
        @forelse($cart->item as $item)
            <li><strong>- {{ $item->name }}</strong></li>
        @empty
            <li>Your cart is currently empty..</li>
        @endforelse
    </ul>

    <br>
@endsection
