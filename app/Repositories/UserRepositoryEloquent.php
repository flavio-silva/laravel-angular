<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\User;

class UserRepositoryEloquent extends BaseRepository implements RepositoryInterface
{
    public function model()
    {
        return User::class;
    }


}