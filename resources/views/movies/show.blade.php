@extends('layouts.app')

@section('content')
    <h1>Tytuł: {{$movie->title}}</h1>
    <h2>Reżyser: {{$movie->director}}</h2>
    <h3>Rok premiery: {{$movie->year}}</h3>
    <h3>Gatunek: {{$movie->genre}}</h3>
    <h3>Ograniczenie wiekowe: {{$movie->rating}}</h3>
    <h3>Kraj pochodzenia: {{$movie->country}}</h3>
    <h3>Czas trwania w minutach: {{$movie->duration_in_minutes}}</h3>
    <a href="{{route('movies.index')}}" class="btn btn-primary">Wróć do listy filmów</a>
@endsection