<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\User;
use CodeProject\Presenters\UserPresenter;

class UserRepositoryEloquent extends BaseRepository implements RepositoryInterface
{
    public function model()
    {
        return User::class;
    }

    public function presenter()
    {
        return UserPresenter::class; 
    }
}