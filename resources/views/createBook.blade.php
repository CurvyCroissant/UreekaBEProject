@extends('layouts.main')


@section('container')

<h1>Create Item</h1>

<form action = "/store-item" method = "POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name = "name" value = "{{ old('name') }}">
      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" id="category" aria-describedby="emailHelp" name = "genre_id" value = "{{ old('genre_id') }}">
        <option selected>Select One</option>
        @foreach($genres as $genre)
        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
      </select>
      @error('genre_id')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <div class="input-group">
        <span class="input-group-text">Rp.</span>
        <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
    </div>
      @error('price')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="quantity" class="form-label">Quantity</label>
      <input type="number" class="form-control" id="quantity" name = "quantity" value = "{{ old('quantity') }}">
      @error('quantity')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" class="form-control" id="image" name = "image" value = "{{ old('image') }}">
      @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection