@extends('layouts.main')


@section('container')
    <h1>Create Invoice</h1>

    <p>Item Data: {{ $itemData }}</p>

    <form action="/store-invoice/{{ $invoice->id }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <label for="sender_address">Sender Address:</label>
        <input type="text" name="sender_address" id="sender_address" required>

        <button type="submit">Create</button>
    </form>
    
@endsection
