@extends('layouts.main')


@section('container')
    <h1>Add a New Book</h1>

    <form action = "/store-item" method = "POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name = "title"
                value = "{{ old('title') }}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" aria-describedby="emailHelp" name = "isbn"
                value = "{{ old('isbn') }}">
            @error('isbn')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" aria-describedby="emailHelp" name = "author"
                value = "{{ old('author') }}">
            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="publication_year" class="form-label">Publication Year</label>
            <input type="number" class="form-control" id="publication_year" name = "publication_year"
                value = "{{ old('publication_year') }}">
            @error('publication_year')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
