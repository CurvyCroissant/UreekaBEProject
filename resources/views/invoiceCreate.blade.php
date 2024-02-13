@extends('layouts.main')

@section('container')
    <h1>Create Invoice</h1>
    <br>
    <h3>Invoice ID: {{ $cart->id }}</h3>
    <br>

    <form action="{{ route('invoice.store', ['cart' => $cart->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @php
            $total = 0;
        @endphp
        @foreach ($cart->item as $index => $item)
            @if ($item->quantity > 0)
                <ul>
                    <li>
                        <h5>{{ $item->name }}</h5>
                    </li>
                </ul>

                <div class="mb-2">
                    <label for="category{{ $index }}" class="form-label">Category:</label>
                    <input type="text" class="form-control" id="category{{ $index }}" name="category[]"
                        value="{{ $item->category->name }}" readonly>
                </div>
                <div class="mb-2">
                    <label for="quantity{{ $index }}" class="form-label">Quantity:</label>
                    <select class="form-select" name="quantity[]" required onchange="updateSubtotal({{ $index }})"
                        id="quantity{{ $index }}">
                        @for ($i = 0; $i <= $item->quantity; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-2">
                    <label for="subtotal{{ $index }}" class="form-label">Sub-Total:</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" name="subtotal[]"
                            value="{{ $item->price * old('quantity.' . $index, 0) }}" readonly
                            id="subtotal{{ $index }}">
                    </div>
                </div>
                @php
                    $total += $item->price * old('quantity.' . $index, 0);
                @endphp
                <br>
            @else
                <ul>
                    <li>
                        <h5>{{ $item->name }}</h5>
                    </li>
                </ul>
                <h5>Item is out of stock! Please wait for admin to restock.</h5>
            @endif
        @endforeach
        <br>
        <div class="mb-2">
            <label for="total" class="form-label"><strong>Total:</strong></label>
            <div class="input-group">
                <span class="input-group-text">Rp.</span>
                <input type="text" class="form-control" id="total" name="total" value="{{ $total }}"
                    readonly>
            </div>
        </div>
        <div class="mb-2">
            <label for="sender_address" class="form-label">Sender Address:</label>
            <input type="text" class="form-control" id="sender_address" name="sender_address" required>
        </div>
        <div class="mb-2">
            <label for="post_code" class="form-label">Post Code:</label>
            <input type="text" class="form-control" id="post_code" name="post_code" required>
        </div>
        <br>
        <button type="submit" class="btn btn-dark">Create</button>
    </form>

    <script>
        function updateSubtotal(index) {
            var quantity = document.getElementsByName('quantity[]')[index].value;
            var price = {{ $cart->item[$index]->price }};
            var subtotal = quantity * price;
            document.getElementsByName('subtotal[]')[index].value = subtotal;
            updateTotal();
        }

        function updateTotal() {
            var total = 0;
            var subtotals = document.getElementsByName('subtotal[]');
            subtotals.forEach(function(subtotal) {
                total += parseFloat(subtotal.value);
            });
            document.getElementById('total').value = total;
        }
    </script>
    <br>
    <br>
@endsection
