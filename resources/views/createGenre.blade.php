@extends('layouts.main')


@section('container')

<h1>Create Category</h1>

<form action = "/store-category" method="post" class="mt-5">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Category Name</label>
      <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name = "name" value = "{{ old('name') }}">
      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection