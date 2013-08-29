<?php namespace Davzie\LaravelBootstrap\Blocks;
use Davzie\LaravelBootstrap\Core\EloquentBaseModel;
use Davzie\LaravelBootstrap\Abstracts\Traits\TaggableRelationship;
use Davzie\LaravelBootstrap\Abstracts\Traits\UploadableRelationship;

class Blocks extends EloquentBaseModel
{

    use TaggableRelationship; // Enable The Tags Relationships
    use UploadableRelationship; // Enable The Uploads Relationships

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'blocks';

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('title', 'key', 'content');

    protected $validationRules = [
        'title'     => 'required',
        'key'      => 'required|unique:blocks,id,<id>',
        'content'   => 'required'
    ];

}
