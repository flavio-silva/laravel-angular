<?php

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator implements ValidatorInterface
{
    protected $rules = [
        'name' => 'required|max:255|min:2',
        'email' => 'required|email|max:255|min:2',
        'password' => 'required|max:255|min:6',
        'remember_token' => 'max:100'
    ];

}