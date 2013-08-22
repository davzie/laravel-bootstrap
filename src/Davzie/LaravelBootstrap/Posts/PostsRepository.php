<?php namespace Davzie\LaravelBootstrap\Posts;
use Davzie\LaravelBootstrap\Core\EloquentBaseRepository;

class PostsRepository extends EloquentBaseRepository implements PostsInterface
{

    /**
     * Construct Shit
     * @param Posts $posts
     */
    public function __construct( Posts $posts )
    {
        $this->model = $posts;
    }

}