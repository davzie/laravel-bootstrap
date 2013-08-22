<?php namespace Davzie\LaravelBootstrap\Controllers;
use Davzie\LaravelBootstrap\Posts\PostsInterface;

class PostsController extends ObjectBaseController {

    /**
     * Make the controller enabled image uploads
     * @var boolean
     */
    protected $uploadable = true;

    /**
     * The place to find the views / URL keys for this controller
     * @var string
     */
    protected $view_key = 'posts';

    /**
     * Construct Shit
     */
    public function __construct( PostsInterface $posts )
    {
        $this->model = $posts;
        parent::__construct();
    }

}