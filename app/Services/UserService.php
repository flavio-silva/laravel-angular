<?php

namespace CodeProject\Services;

class UserService extends AbstractService
{
    public function getAuthenticatedUser()
    {
        $userId = \Authorizer::getResourceOwnerId();
        return $this->getRepository()->skipPresenter()->find($userId);
    }
}