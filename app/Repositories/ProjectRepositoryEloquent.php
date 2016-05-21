<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Project;
use CodeProject\Presenters\ProjectPresenter;

class ProjectRepositoryEloquent extends BaseRepository implements RepositoryInterface
{
    public function model()
    {
        return Project::class;
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }
}