@extends('layouts.main')

@section('container')
    <p><strong>Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        </strong>{{ $item['title'] }}</p>
    <p><strong>ISBN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        </strong>{{ $item['isbn'] }}</p>
    <p><strong>Author&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        </strong>{{ $item['author'] }}</p>
    <p><strong>Publication Year&nbsp;: </strong>{{ $item['publication_year'] }}</p>
    <br>

    @auth
        @if (auth()->user()->isAdmin())
            <a href="/edit-item/{{ $item->id }}"><button type="button" class="btn btn-warning mt-2">Edit</button></a>
            <br>
            <br>
            <form action="/delete-item/{{ $item->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to DELETE?')">Delete</button>
            </form>
        @endif
    @endauth
@endsection
