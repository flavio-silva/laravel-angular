<?php

namespace CodeProject\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectService extends AbstractService
{
    protected $resourceName = 'projeto';
    protected $relations = ['owner', 'client'];
    protected $table = 'projects';
    protected $foreignFieldName = 'project_id';

    private function isMember($projectId, $memberId)
    {
        $entity = $this->repository->find($projectId);

        if ($entity->members()->find($memberId)) {
            return true;
        }

        return false;
    }

    private function isOwner($projectId, $memberId)
    {
        $entity = $this->repository->find($projectId);

        if ($entity->owner_id == $memberId) {
            return true;
        }

        return false;
    }

    public function addMember($projectId, $memberId)
    {
        $this->repository->find($projectId)->members()->attach($memberId);
    }

    public function removeMember($projectId, $memberId)
    {
        $this->repository->find($projectId)->members()->detach($memberId);
    }

    public function hasPermission($projectId, $memberId)
    {
        if ($this->isMember($projectId, $memberId) || $this->isOwner($projectId, $memberId)) {
            return true;
        }

        return false;
    }

    public function getMembers($id)
    {
        return $this->repository->find($id)->members;
    }

    public function findAll(array $params = [])
    {
        return $this->getRepository()
            ->findWhere(['owner_id' => $params['authenticatedUserId']]);
    }
}