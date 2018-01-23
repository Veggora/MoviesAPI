@extends('layouts.app')

@section('content')
    <h1>Edytuj film</h1>
    {!! Form::model($movie, ['route' => ['movies.update', $movie->id], 'method' => 'PATCH'])  !!}

    <div class="form-group">
        {!! Form::label('title', 'Tytuł') !!}
        {!! Form::text('title', $movie->title, ['class' => 'form-control']) !!}
        @include('layouts.help-block', [ 'what' => 'title'])
    </div>
    <div class="form-group">
        {!! Form::label('director', 'Reżyser') !!}
        {!! Form::text('director', $movie->director, ['class' => 'form-control']) !!}
        @include('layouts.help-block', [ 'what' => 'director'])
    </div>
    <div class="form-group">
        {!! Form::label('year', 'Rok premiery') !!}
        {!! Form::text('year', $movie->year, ['class' => 'form-control']) !!}
        @include('layouts.help-block', [ 'what' => 'year'])
    </div>
    <div class="form-group">
        {!! Form::label('duration_in_minutes', 'Czas trwania w minutach') !!}
        {!! Form::text('duration_in_minutes', $movie->duration_in_minutes, ['class' => 'form-control']) !!}
        @include('layouts.help-block', [ 'what' => 'duration_in_minutes'])
    </div>
    <div class="form-group">
        {!! Form::label('genre', 'Gatunek') !!}
        {!! Form::text('genre', $movie->genre, ['class' => 'form-control']) !!}
        @include('layouts.help-block', [ 'what' => 'genre'])
    </div>
    <div class="form-group">
        {!! Form::label('rating', 'Oznaczenie wiekowe') !!}
        {!! Form::text('rating', $movie->rating, ['class' => 'form-control']) !!}
        @include('layouts.help-block', [ 'what' => 'rating'])
    </div>
    <div class="form-group">
        {!! Form::label('country', 'Kraj pochodzenia') !!}
        {!! Form::text('country', $movie->country, ['class' => 'form-control']) !!}
        @include('layouts.help-block', [ 'what' => 'country'])
    </div>
    <button class="btn btn-success" type="submit">Zapisz film</button>

    {!! Form::close() !!}
@endsection