<?php

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator implements ValidatorInterface
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'project_id' => 'required',
            'title' => 'required|max:255|min:2',
            'note' => 'required|min:2'            
        ],
        ValidatorInterface::RULE_UPDATE => [
            'project_id' => 'required',
            'title' => 'required|max:255|min:2',
            'note' => 'required|min:2'
        ]
    ];

}