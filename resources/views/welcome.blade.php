@extends('layouts.main')

@section('container')
    <h1>Welcome to PT Meksiko's Shopping Website!</h1>
    <br>

    @auth
        @if (auth()->user()->isAdmin())
            <div>
                <h4>Greetings {{ auth()->user()->admin_id }}!</h4>
            </div>
        @else
            <div>
                <h4>Greetings {{ auth()->user()->name }}!</h4>
            </div>
        @endif
    @else
        <div>
            <h4>Log in to access website features.</h4>
        </div>
    @endauth
@endsection
