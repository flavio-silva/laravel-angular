<?php

namespace CodeProject\Http\Controllers;

class ProjectController extends AbstractRestFullController
{
    public function showMembers($id)
    {
        return $this->service->getMembers($id);
    }
}