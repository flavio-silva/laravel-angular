<?php

namespace CodeProject\Services;

class ProjectNoteService extends AbstractService
{
    protected $resourceName = 'notas';
    protected $relations = ['project'];
    protected $foreignFieldName = 'project_id';
}