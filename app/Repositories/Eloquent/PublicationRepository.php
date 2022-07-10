<?php

namespace App\Repositories\Eloquent;

use App\Models\Publication;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\PublicationRepositoryInterface;

class PublicationRepository extends BaseRepository implements PublicationRepositoryInterface
{

    public function __construct(Publication $model)
    {
        $this->model = $model;
    }
}
