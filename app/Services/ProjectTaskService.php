<?php

namespace CodeProject\Services;

class ProjectTaskService extends AbstractRelatedService
{
    protected $relations = ['project'];
    protected $foreignFieldName = 'project_id';
}