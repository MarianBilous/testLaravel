<?php

use App\Http\Controllers\Api\GenreApiController;
use App\Http\Controllers\Api\MovieApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('genres', [GenreApiController::class, 'index']);
Route::get('genres/{id}', [GenreApiController::class, 'getMovieByGenreId']);
Route::get('movies', [MovieApiController::class, 'getMovieByPagination']);
Route::get('movies/{id}', [MovieApiController::class, 'getMovie']);
