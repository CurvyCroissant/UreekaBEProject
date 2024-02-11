@extends('layouts.main')

@section('container')


    <h1 class="mb-4">Categories</h1>
    <br>

    @foreach($categories as $category)
    <h4><strong>- <a>{{ $category['name'] }}</strong></h4></a>
    @endforeach

    <br>
    @auth
        @if(auth()->user()->isAdmin())
            <a href="{{ url('/create-category') }}" class="btn btn-success">Create New Category</a>
        @endif
    @endauth

@endsection