<?php

namespace CodeProject\Services;

class ProjectTaskService extends AbstractService
{
    protected $resourceName = 'tarefa';
    protected $relations = ['project'];
    protected $foreignFieldName = 'project_id';
}