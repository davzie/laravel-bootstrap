<?php namespace Davzie\LaravelBootstrap\Blocks;
use Davzie\LaravelBootstrap\Core\EloquentBaseModel;

class Blocks extends EloquentBaseModel
{

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
        'key'      => 'required|unique:blocks,<id>',
        'content'   => 'required'
    ];

}
