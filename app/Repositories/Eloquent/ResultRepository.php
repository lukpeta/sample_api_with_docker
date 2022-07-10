<?php

namespace App\Repositories\Eloquent;

use App\Models\Result;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\ResultRepositoryInterface;

class ResultRepository extends BaseRepository implements ResultRepositoryInterface
{

    public function __construct(Result $model)
    {
        $this->model = $model;
    }
}
