@extends('layouts.main')

@section('container')

    <h1 class="mb-4">Book Collection</h1>
    <br>

    @if (count($items) > 0)
        @foreach ($items as $item)
            <div class="mb-4">
                <h4>
                    <li><strong><a href="/display-item/{{ $item['id'] }}">{{ $item['title'] }}</a></strong></li>
                </h4>
            </div>
        @endforeach
    @else
        <p>The collection is currently empty.</p>
        @auth
            @if (!auth()->user()->isAdmin())
                <p>Only <strong>admins</strong> can edit.</p>
            @endif
        @endauth
    @endif

    <br>
    @auth
        @if (auth()->user()->isAdmin())
            <a href="{{ url('/create-item') }}" class="btn btn-success">Add Book</a>
        @endif
    @endauth

@endsection
