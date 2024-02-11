@extends('layouts.main')


@section('container')

<h1>Edit</h1>

<form action = "/update-item/{{ $item->id }}" method = "POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name = "name" value = "{{ old('name', $item->name) }}">
      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" class="form-control" id="price" name = "price" value = "{{ old('price', $item->price) }}">
      @error('price')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="quantity" class="form-label">Quantity</label>
      <input type="number" class="form-control" id="quantity" name = "quantity" value = "{{ old("quantity", $item->quantity) }}">
      @error('quantity')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Change</button>
</form>

@endsection