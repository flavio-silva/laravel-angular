<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\ProjectNote;

/**
 * Class ProjectNoteRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class ProjectNoteRepositoryEloquent extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectNote::class;
    }

}
