<?php namespace Davzie\LaravelBootstrap\Controllers;
use Davzie\LaravelBootstrap\Accounts\UserInterface;

class UsersController extends ObjectBaseController {

    /**
     * The place to find the views / URL keys for this controller
     * @var string
     */
    protected $view_key = 'users';

    /**
     * Construct Shit
     */
    public function __construct( UserInterface $users )
    {
        $this->model = $users;
        parent::__construct();
    }

}