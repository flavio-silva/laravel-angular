<?php

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectTaskValidator extends LaravelValidator implements ValidatorInterface
{
    protected $rules = [
       'project_id' => 'required|integer',
        'name' => 'required|max:80|min:2',
        'start_date' => 'required|date',
        'due_date' => 'date',
        'status' => 'required|in:in progress,initiate,finalized',
    ];
}