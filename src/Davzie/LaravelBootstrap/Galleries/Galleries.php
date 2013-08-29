<?php namespace Davzie\LaravelBootstrap\Galleries;
use Davzie\LaravelBootstrap\Core\EloquentBaseModel;
use Davzie\LaravelBootstrap\Abstracts\Traits\TaggableRelationship;
use Davzie\LaravelBootstrap\Abstracts\Traits\UploadableRelationship;

class Galleries extends EloquentBaseModel
{

    use TaggableRelationship; // Enable The Tags Relationships
    use UploadableRelationship; // Enable The Uploads Relationships

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'galleries';

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('title', 'slug', 'description');

    protected $validationRules = [
        'title'     => 'required',
        'slug'      => 'required|unique:galleries,id,<id>'
    ];

}
