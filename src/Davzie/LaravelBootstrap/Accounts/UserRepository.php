<?php namespace Davzie\LaravelBootstrap\Accounts;
use Davzie\LaravelBootstrap\EloquentBaseRepository;

class UserRepository extends EloquentBaseRepository implements UserInterface
{

    /**
     * Construct Shit
     * @param User $user
     */
    public function __construct( User $user )
    {
        $this->model = $user;
    }

}