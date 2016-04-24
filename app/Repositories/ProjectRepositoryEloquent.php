<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Project;

class ProjectRepositoryEloquent extends BaseRepository implements RepositoryInterface
{
    public function model()
    {
        return Project::class;
    }
}