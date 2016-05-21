<?php

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectTaskValidator extends LaravelValidator implements ValidatorInterface
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'project_id' => 'required|integer',
            'name' => 'required|max:80|min:2',
            'start_date' => 'required|date',
            'due_date' => 'date',
            'status' => 'required|in:in progress,initiate,finalized'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'max:80|min:2',
            'start_date' => 'date',
            'due_date' => 'date',
            'status' => 'in:in progress,initiate,finalized'
        ]
    ];
}