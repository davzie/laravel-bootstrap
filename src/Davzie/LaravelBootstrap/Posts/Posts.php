<?php namespace Davzie\LaravelBootstrap\Posts;
use Davzie\LaravelBootstrap\Core\EloquentBaseModel;

class Posts extends EloquentBaseModel
{

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'posts';

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('title', 'slug', 'content');

    protected $validationRules = [
        'title'     => 'required',
        'slug'      => 'required|unique:posts,<id>',
        'content'   => 'required'
    ];

}
