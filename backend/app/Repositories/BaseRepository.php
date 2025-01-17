<?php

namespace App\Repositories;

use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * implements RepositoryInterface, triển khai các phương thức chung cho các Model
 */
abstract class BaseRepository implements RepositoryInterface
{
    //model muốn tương tác
    /**
     * @var
     */
    protected $model;

    //khởi tạo

    /**
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng

    /**
     * @return mixed
     */
    abstract public function getModel(): mixed;

    /**
     * Set model
     * @throws BindingResolutionException
     */
    public function setModel(): void
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id): mixed
    {
        return $this->model->find($id);
    }

    /**
     * @param $attributes
     * @return mixed
     */
    public function create($attributes = []): mixed
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @param $attributes
     * @return mixed
     */
    public function update($id, $attributes = []): mixed
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
