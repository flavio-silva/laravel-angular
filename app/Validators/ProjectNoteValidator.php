<?php

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator implements ValidatorInterface
{
    protected $rules = [
       'project_id' => 'required|integer',
        'title' => 'required|max:255|min:2',
        'note' => 'required|min:2'
    ];
}