@extends('layouts.main')

@section('container')


    <h1 class="mb-4">Categories</h1>
    <br>

    @foreach($genres as $genre)
    <h4><strong>- <a>{{ $genre['name'] }}</strong></h4></a>
    @endforeach

    <br>
    @auth
        @if(auth()->user()->isAdmin())
            <a href="{{ url('/create-category') }}" class="btn btn-success">Create New Category</a>
        @endif
    @endauth

@endsection