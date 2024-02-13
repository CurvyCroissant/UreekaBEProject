@extends('layouts.main')

@section('container')
    <img src="{{ asset('storage/images/' . $item->image) }}" alt="&nbsp;&nbsp;'{{ $item->name }}' Image" height="70">
    <br>
    <br>
    <p><strong>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong>{{ $item['name'] }}</p>
    <p><strong>Category&nbsp;&nbsp;: </strong>{{ $item->category->name }}</p>
    <p><strong>Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong>Rp.{{ $item['price'] }},00.</p>
    <p><strong>Quantity&nbsp;&nbsp;&nbsp;: </strong>{{ $item['quantity'] }}</p>
    <br>

    @auth
        @if (auth()->user()->isAdmin())
            <a href="/edit-item/{{ $item->id }}"><button type="button" class="btn btn-warning mt-2">Edit</button></a>
            <br>
            <br>
            <form action="/delete-item/{{ $item->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to DELETE?')">Delete</button>
            </form>
        @endif

        <br>

        @if (auth()->check())
            @if ($cart)
                @php $itemInCart = $cart->item->contains($item->id); @endphp

                @if ($itemInCart)
                    <p>This item is already in your cart.</p>
                @else
                    <form action="{{ route('cart.store', $cart->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                @endif
            @else
                <p>You don't have a cart. Please create one to add items.</p>
            @endif
        @else
            <p>Please log in to add items to your cart.</p>
        @endif

    @endauth

@endsection