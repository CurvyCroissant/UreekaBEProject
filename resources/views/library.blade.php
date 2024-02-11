@extends('layouts.main')

@section('container')

    <h1 class="mb-4">Catalog</h1>
    <br>

    @foreach($items as $item)
        <div class="mb-4">
            <h4><strong>- <a href="/display-item/{{ $item['id'] }}">{{ $item['name'] }}</strong></h4></a>
        </div>
    @endforeach

    <br>
    @auth
        @if(auth()->user()->isAdmin())
            <a href="{{ url('/create-item') }}" class="btn btn-success">Create New Item</a>
        @endif
    @endauth

@endsection
