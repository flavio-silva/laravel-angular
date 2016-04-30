<?php

namespace CodeProject\Services;

class ProjectService extends AbstractService
{
    protected $resourceName = 'projeto';
    protected $relations = ['owner', 'client'];
}