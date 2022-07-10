<?php

namespace App\Repositories\Eloquent\Interfaces;


interface BaseRepositoryInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed;

    /**
     * @param array $data
     * @return mixed
     */
    public function createMany(array $data): mixed;

    /**
     * @param string $attribute
     * @param string $value
     * @param array $columns
     * @param array $with
     * @return mixed
     */
    public function findBy(string $attribute, string $value, array $columns = ['*'], array $with = []): mixed;

    /**
     * @param string $attribute
     * @param string $value
     * @param array $columns
     * @param string $orderByColumnName
     * @param string $orderBy
     * @param array $with
     * @return mixed
     */
    public function findAllBy(string $attribute, string $value, array $columns = ['*'], string $orderByColumnName = 'id', string $orderBy = 'desc', array $with = []): mixed;


    /**
     * @return mixed
     */
    public function getModel(): mixed;

}
