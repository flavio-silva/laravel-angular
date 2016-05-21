<?php

namespace CodeProject\Http\Controllers;

class ProjectController extends AbstractRestFullController
{
    protected $resourceName;
    
    public function showMembers($id)
    {
        return $this->service->getMembers($id);
    }
}