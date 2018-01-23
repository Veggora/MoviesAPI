<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Http\Resources\Movie as MovieResource;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $movies = MovieResource::collection(Movie::paginate(20));
        if ($request->wantsJson()) {
            return $movies;
        } else {
            return view('movies.index', ['movies' => $movies]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create', [
            'movie' => new Movie()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'director' => 'required',
            'year' => 'required',
            'genre' => 'required'
        ]);

        $movie = new Movie([
            'title' => $request->input('title'),
            'director' => $request->input('director'),
            'year' => $request->input('year'),
            'duration_in_minutes' => $request->input('duration_in_minutes'),
            'genre' => $request->input('genre'),
            'rating' => $request->input('rating'),
            'country' => $request->input('country'),
        ]);

        $movie->saveOrFail();

        $message = 'Dodano film do bazy.';

        if ($request->wantsJson()) {
            $response = [
                'message' => $message,
                'movie' => $movie
            ];
            return response()->json($response, 200);
        } else {
            flash($message)->success();
            return view('movies.show', [
                'movie' => $movie
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return MovieResource
     */
    public function show(Request $request, $id)
    {
        $movie = Movie::find($id);
        if ($request->wantsJson()) {
            $response = [
                'movie' => $movie
            ];
            return response()->json($response, 200);
        } else {
            return view('movies.show', [
                'movie' => $movie
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('movies.edit', [
            'movie' => Movie::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'director' => 'required',
            'year' => 'required',
            'genre' => 'required'
        ]);

        $movie = Movie::findOrFail($id);

        $movie->title = $request->input('title');
        $movie->director = $request->input('director');
        $movie->year = $request->input('year');
        $movie->duration_in_minutes = $request->input('duration_in_minutes');
        $movie->genre = $request->input('genre');
        $movie->rating = $request->input('rating');
        $movie->country = $request->input('country');

        $movie->saveOrFail();

        $message = 'Zaktualizowano film.';

        if ($request->wantsJson()) {
            $response = [
                'message' => $message,
                'movie' => $movie
            ];
            return response()->json($response, 200);
        } else {
            flash($message)->success();
            return view('movies.show', [
                'movie' => $movie
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        $message = 'Usunięto film z bazy.';

        if ($request->wantsJson()) {
            $response = [
                'message' => $message,
                'movie' => $movie
            ];
            return response()->json($response, 200);
        } else {
            flash($message)->success();
            return redirect()->route('movies.index');
        }
    }
}
