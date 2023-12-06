@extends('layouts.main')


@section('container')

<h1>Create Book</h1>

<form action = "/store-book" method = "POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Book Title</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "title" value = "{{ old('title') }}">
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
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection