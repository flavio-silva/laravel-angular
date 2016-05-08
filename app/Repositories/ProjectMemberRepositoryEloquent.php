<?php

namespace CodeProject\Repositories;

use CodeProject\Entities\ProjectMember;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProjectNoteRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class ProjectMemberRepositoryEloquent extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectMember::class;
    }

}
