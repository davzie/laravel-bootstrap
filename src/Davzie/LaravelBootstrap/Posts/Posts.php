<?php namespace Davzie\LaravelBootstrap\Posts;
use Davzie\LaravelBootstrap\Core\EloquentBaseModel;
use Davzie\LaravelBootstrap\Abstracts\Traits\TaggableRelationship;
use Davzie\LaravelBootstrap\Abstracts\Traits\UploadableRelationship;

class Posts extends EloquentBaseModel
{

    use TaggableRelationship; // Enable The Tags Relationships
    use UploadableRelationship; // Enable The Uploads Relationships

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
        // 'slug'      => 'required|unique:posts,<id>',
        'content'   => 'required'
    ];

}
