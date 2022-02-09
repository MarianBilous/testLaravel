<?php

namespace App\Repositories;

/**
 * Interface RepositoryInterface
 *
 * @package App\Repositories
 */
interface RepositoryInterface
{
    /**
     * Find record by id.
     *
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * Get all records.
     *
     * @return mixed
     */
    public function all();

    /**
     * Delete record by id.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Creates a record.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Updates the record.
     *
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id);
}
