<?php

namespace CodeProject\Http\Controllers;

class AuthenticatedUserController extends AbstractRestFullController
{
    protected $resourceName = 'user';

    protected function getRequestAllData()
    {        
        return [
            'id' => $this->authorizer->getResourceOwnerId()
        ];
    }
}