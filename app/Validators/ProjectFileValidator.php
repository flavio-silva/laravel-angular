<?php

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectFileValidator extends LaravelValidator implements ValidatorInterface
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:255|min:2',
            'description' => 'max:1024',
            'file' => 'required',
            'project_id' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:255|min:2',
            'description' => 'max:1024',
            'project_id' => 'required'
        ]
    ];
}