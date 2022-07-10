<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{

    protected $model;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createMany(array $data): mixed
    {
        return $this->model->createMany($data);
    }

    /**
     * @param string $attribute
     * @param string $value
     * @param array $columns
     * @param array $with
     * @return mixed
     */
    public function findBy(string $attribute, string $value, array $columns = ['*'], array $with = []): mixed
    {
        $query = $this->model
            ->with($with)
            ->where($attribute, '=', $value);

        return $query->first($columns);
    }


    /**
     * @param string $attribute
     * @param string $value
     * @param array $columns
     * @param string $orderByColumnName
     * @param string $orderBy
     * @param array $with
     * @return mixed
     */
    public function findAllBy(string $attribute, string $value, array $columns = ['*'], string $orderByColumnName = 'id', string $orderBy = 'desc', array $with = []): mixed
    {
        $query = $this->model
            ->with($with)
            ->where($attribute, '=', $value)
            ->orderBy($orderByColumnName, $orderBy);

        return $query->get($columns);
    }

    /**
     * @return mixed
     */
    public function getModel(): mixed
    {
        return $this->model;
    }

}
