<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Clients;

class ClientRepositoryEloquent extends BaseRepository implements RepositoryInterface
{
    public function model()
    {
        return Clients::class;
    }
}