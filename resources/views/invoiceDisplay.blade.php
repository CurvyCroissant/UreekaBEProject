@extends('layouts.main')

@section('container')
    <h1 class="mb-4">Invoice Display</h1>
    <br>

    <h3>Invoice ID: {{ $invoice->id }}</h3>
    <br>

    <h2>Items</h2>
    @forelse ($item as $item)
        <div class="mb-4">
            <ul>
                <li><strong>{{ $item->name }}</strong></li>
                <ul>
                    <li>Category&nbsp;&nbsp;: {{ $item->category->name }}</li>
                    <li>Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.{{ $item->price }},00.</li>
                    <li>Quantity&nbsp;&nbsp;&nbsp;: {{ $item->pivot->quantity }}</li>
                    <li>Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <img src="{{ $item->image }}"
                            alt="&nbsp;&nbsp;'{{ $item->name }}' Image" height="50"></li>
                </ul>
            </ul>
        </div>
    @empty
        <p>No items found in the cart.</p>
    @endforelse

    <ul>
        <li><strong>Sender Address&nbsp;:</strong> {{ $invoice->sender_address }}</li>
        <li><strong>Post Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
            {{ $invoice->post_code }}</li>
        <li><strong>Subtotal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
            {{ $invoice->subtotal }}</li>
        <li><strong>Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
            {{ $invoice->total }}</li>
    </ul>
@endsection
