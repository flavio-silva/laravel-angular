<?php

namespace CodeProject\Services;

class ProjectNoteService extends AbstractRelatedService
{
    protected $relations = ['project'];
    protected $foreignFieldName = 'project_id';

}