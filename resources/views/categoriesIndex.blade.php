@extends('layouts.main')

@section('container')

    <h1 class="mb-4">Categories</h1>
    <br>

    @if (count($categories) > 0)
        @foreach ($categories as $category)
            <div class="mb-4">
                <h4>
                    <li><strong><a>{{ $category['name'] }}</a></strong></li>
                </h4>
            </div>
        @endforeach
    @else
        <p>There are no Categories at the moment.</p>
        <p>Only <strong>admins</strong> can edit.</p>
    @endif

    <br>
    @auth
        @if (auth()->user()->isAdmin())
            <a href="{{ url('/create-category') }}" class="btn btn-success">Create New Category</a>
        @endif
    @endauth

@endsection
