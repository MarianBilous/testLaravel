<?php

namespace App\Repositories;

use App\Models\Movie;

/**
 * Class MovieRepository
 *
 * @package App\Repositories
 */
class MovieRepository extends BaseRepository
{
    /**
     * GenreRepository constructor.
     *
     * @param Movie $model
     */
    public function __construct(Movie $model)
    {
        parent::__construct($model);
    }
}
