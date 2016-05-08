<?php

namespace CodeProject\Services;

class ProjectService extends AbstractService
{
    protected $resourceName = 'projeto';
    protected $relations = ['owner', 'client'];

    public function addMember($projectId, $memberId)
    {
        $this->repository->find($projectId)->members()->attach($memberId);
    }

    public function removeMember($projectId, $memberId)
    {
        $this->repository->find($projectId)->members()->detach($memberId);
    }

    public function isMember($projectId, $memberId)
    {
        if ($this->repository->find($projectId)->find($memberId)) {
            return true;
        }

        return false;
    }

    public function getMembers($id)
    {
        return $this->repository->find($id)->members;
    }
}