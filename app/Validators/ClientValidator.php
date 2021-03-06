<?php

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator implements ValidatorInterface
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:255|min:2',
            'responsible' => 'required|max:255|min:2',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|min:2'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:255|min:2',
            'responsible' => 'required|max:255|min:2',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|min:2'
        ],
    ];
}