@extends('layouts.main')

@section('container')


<h1>Genres</h1>
@foreach($genres as $genre)
<br>
<a><h4>Genre Title: {{ $genre['name'] }}</h4></a>
@endforeach


@endsection