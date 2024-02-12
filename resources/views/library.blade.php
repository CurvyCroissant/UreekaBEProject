@extends('layouts.main')

@section('container')

    <h1 class="mb-4">Catalog</h1>
    <br>

    @if (count($items) > 0)
        @foreach ($items as $item)
            <div class="mb-4">
                <h4>
                    <li><strong><a href="/display-item/{{ $item['id'] }}">{{ $item['name'] }}</a></strong></li>
                </h4>
            </div>
        @endforeach
    @else
        <p>There are no Items at the moment.</p>
        <p>Only <strong>admins</strong> can edit.</p>
    @endif

    <br>
    @auth
        @if (auth()->user()->isAdmin())
            <a href="{{ url('/create-item') }}" class="btn btn-success">Create New Item</a>
        @endif
    @endauth

@endsection
