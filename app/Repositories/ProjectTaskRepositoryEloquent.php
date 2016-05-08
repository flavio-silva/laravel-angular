<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\ProjectTask;

/**
 * Class ProjectNoteRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class ProjectTaskRepositoryEloquent extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectTask::class;
    }

}
