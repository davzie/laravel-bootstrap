<?php namespace Davzie\LaravelBootstrap\Controllers;
use Davzie\LaravelBootstrap\Accounts\UserInterface;
use Illuminate\Support\MessageBag;
use Input, Redirect;

class UsersController extends ObjectBaseController {

    /**
     * The place to find the views / URL keys for this controller
     * @var string
     */
    protected $view_key = 'users';

    /**
     * By default a mass assignment is used to validate things on a model
     * Sometimes you want to confirm inputs (such as password confirmations)
     * that you don't want to be necessarily stored on the model. This will validate
     * inputs from Input::all() not from $model->fill();
     * @var boolean
     */
    protected $validateWithInput = true;

    /**
     * Construct Shit
     */
    public function __construct( UserInterface $users )
    {
        $this->model = $users;
        parent::__construct();
    }

}