<?php

namespace App\Repositories;

/**
 * interface khuôn mẫu, khai báo các phương thức chung cho các Models. *
 */
interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id): mixed;

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = []): mixed;

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attributes = []): mixed;

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed;
}
