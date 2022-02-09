<?php

namespace App\Services;

use App\Repositories\MovieRepository;

class MovieService
{
    /**
     * @var MovieRepository
     */
    protected $movieRepository;

    /**
     * MovieService constructor.
     *
     * @param MovieRepository $movieRepository
     */
    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * Creates a film with possible relationships.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $movie = null;

        if (isset($attributes['genres'])) {
            $movie = $this->movieRepository->create($attributes);
            $movie->genres()->attach($attributes['genres']);
        }

        if (!$movie) {
            $movie = $this->movieRepository->create($attributes);
        }

        return $movie;
    }

    /**
     * Update a film with possible relationships.
     *
     * @param array $attributes
     * @param int $id
     * @return mixed
     */
    public function update(array $attributes, int $id)
    {
        if (isset($attributes['genres'])) {
            $movie = $this->movieRepository->getById($id);
            $movie->genres()->sync($attributes['genres']);
        }

        return $this->movieRepository->update($attributes, $id);
    }

    /**
     * Sets the image for movie recording.
     *
     * @param $request
     * @return mixed
     *
     */
    public function setImage($request)
    {
        $attributes = $request->all();

        if ($request->hasFile('image')) {
            $request->file('image')->store('public/movie/images');

            $attributes['image'] = 'movie/images/' . $request->file('image')->hashName();
        } elseif (isset($attributes['oldImage'])) {
            $attributes['image'] = $attributes['oldImage'];
        } elseif (!isset($attributes['image'])) {
            $attributes['image'] = 'movie/images/default.jpg';
        }

        return $attributes;
    }
}
