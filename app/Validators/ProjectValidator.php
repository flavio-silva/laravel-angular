<?php

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator implements ValidatorInterface
{
    protected $rules = [
        'owner_id' => 'required|integer',
        'client_id' => 'required|integer',
        'name' => 'required|max:40|min:2',
        'description' => 'max:255|min:2',
        'status' => 'max:40|min:2',
        'due_date' => 'required|date'
    ];
}