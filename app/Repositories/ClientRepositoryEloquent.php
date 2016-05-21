<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Clients;
use CodeProject\Presenters\ClientPresenter;

class ClientRepositoryEloquent extends BaseRepository implements RepositoryInterface
{
    public function model()
    {
        return Clients::class;
    }

    public function presenter()
    {
        return ClientPresenter::class;
    }
}