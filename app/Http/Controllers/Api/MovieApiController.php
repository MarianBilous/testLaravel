<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;

/**
 * Class MovieApiController
 *
 * @package App\Http\Controllers\Api
 */
class MovieApiController extends Controller
{
    /**
     * Displays all movies paginated.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMovieByPagination()
    {
        return response()->json(Movie::paginate(4));
    }

    /**
     * Outputs a specific movie by ID.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMovie($id)
    {
        $movie = Movie::find($id);

        if ($movie) {
            return response()->json($movie);
        }

        return response()->json([]);
    }
}
