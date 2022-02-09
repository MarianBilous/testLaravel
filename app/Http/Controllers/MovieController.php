<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Repositories\GenreRepository;
use App\Repositories\MovieRepository;
use App\Services\MovieService;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * @var MovieRepository
     */
    private $movieRepository;

    /**
     * @var MovieService
     */
    private $movieService;

    /**
     * @var GenreRepository
     */
    private $genreRepository;

    /**
     * MovieController constructor.
     *
     * @param MovieRepository $movieRepository
     * @param MovieService $movieService
     * @param GenreRepository $genreRepository
     */
    public function __construct(MovieRepository $movieRepository, MovieService $movieService, GenreRepository $genreRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->movieService = $movieService;
        $this->genreRepository = $genreRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = $this->movieRepository->all();

        return view('pages.movie.movie', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = $this->genreRepository->all();

        return view('pages.movie.movie-create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        $attributes = $this->movieService->setImage($request);
        $this->movieService->create($attributes);

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $movie = $this->movieRepository->getById($id);
        $genres = $this->genreRepository->all();
        $genresSelected = $movie->genres()->pluck('id')->toArray();

        return view('pages.movie.movie-edit', compact('movie', 'genres', 'genresSelected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, $id)
    {
        $attributes = $this->movieService->setImage($request);
        $this->movieService->update($attributes, $id);

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->movieRepository->delete($id);

        return redirect()->route('movies.index');
    }
}
