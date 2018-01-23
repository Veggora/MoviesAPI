@extends('layouts.app')

@section('content')
    <p><h1>Lista filmów</h1></p>
    <p><a class="btn btn-primary" href="{{route('movies.create')}}">Dodaj film</a></p>
    <p>{{ $movies->links() }}</p>
    <table class="table">
        <tr>
            <th>Tytuł</th>
            <th>Reżyser</th>
            <th>Rok</th>
            <th colspan="3"></th>
        </tr>
        @foreach($movies as $movie)
            <tr>
                <td>{{$movie->title}}</td>
                <td>{{$movie->director}}</td>
                <td>{{$movie->year}}</td>
                <td><a class="btn btn-primary" href="{{route('movies.show',['id' => $movie->id])}}">Wyświetl</a></td>
                <td><a class="btn btn-info" href="{{route('movies.edit',['id' => $movie->id])}}">Edytuj</a></td>
                <td>
                    {!! Form::open(['url' => 'movies/' . $movie->id]) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Usuń', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection