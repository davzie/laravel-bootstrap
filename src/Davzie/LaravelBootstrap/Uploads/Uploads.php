<?php namespace Davzie\LaravelBootstrap\Uploads;
use Davzie\LaravelBootstrap\Core\EloquentBaseModel;

class Uploads extends EloquentBaseModel
{

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'uploads';

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array();

    protected $validationRules = [];

}
