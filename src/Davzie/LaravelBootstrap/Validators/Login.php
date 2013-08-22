<?php namespace Davzie\LaravelBootstrap\Validators;
use Davzie\LaravelBootstrap\Abstracts\ValidatorBase;

class Login extends ValidatorBase
{

    protected $rules = array(
        'email'         =>  'required|email',
        'password'      =>  'required'
    );

}