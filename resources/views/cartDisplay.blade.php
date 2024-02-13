@extends('layouts.main')

@section('container')
    <h1 class="mb-4">Cart</h1>
    <br>

    @if ($cartData && $cartData->isNotEmpty())
        <a href="/create-invoice/{{ $cart['id'] }}" class="btn btn-dark">Invoice</a>
        <br>
    @endif
    <br>
    <h3>Items:</h3>
    <br>
    @forelse($cart->item as $item)
        <div class="mb-4">
            <ul>
                <li><strong>{{ $item->name }}</strong></li>
                <ul>
                    <li>Category&nbsp;&nbsp;: {{ $item->category->name }}</li>
                    <li>Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.{{ $item->price }},00.</li>
                    <li>Quantity&nbsp;&nbsp;&nbsp;: {{ $item->quantity }}</li>
                    <li>Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <img src="{{ $item->image }}"
                            alt="&nbsp;&nbsp;'{{ $item->name }}' Image" height="50"></li>
                </ul>
            </ul>
        </div>
    @empty
        <p>Your cart is currently empty.</p>
    @endforelse

    <br>
@endsection
