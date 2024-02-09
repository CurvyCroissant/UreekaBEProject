@extends('layouts.main')


@section('container')

<h1>Create Book</h1>

<form action = "/store-book" method = "POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Book Title</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "title" value = "{{ old('title') }}">
      @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Book Genre</label>
      <select type="text" class="form-select" id="exampleInputEmail1" aria-describedby="emailHelp" name = "genre_id" value = "{{ old('title') }}">
        <option selected>Open this Select Menu</option>
        @foreach($genres as $genre)
        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
      </select>
      @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Author</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name = "author" value = "{{ old('author') }}">
      @error('author')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Description</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name = "description" value = "{{ old("description") }}">
      @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Book Cover</label>
      <input type="file" class="form-control" id="exampleInputPassword1" name = "image" value = "{{ old("image") }}">
      @error('image')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection