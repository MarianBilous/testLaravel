<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;

/**
 * Class GenreApiController
 *
 * @package App\Http\Controllers\Api
 */
class GenreApiController extends Controller
{
    /**
     * Displays a list of all genres.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Genre::all());
    }

    /**
     * Displays a paginated list of all movies in the given genre.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMovieByGenreId($id)
    {
        $genre = Genre::find($id);

        if ($genre) {
            return response()->json($genre->movies()->paginate(4));
        }

        return response()->json([]);
    }
}
