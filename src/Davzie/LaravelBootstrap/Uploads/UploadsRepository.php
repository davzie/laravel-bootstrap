<?php namespace Davzie\LaravelBootstrap\Uploads;
use Davzie\LaravelBootstrap\Core\EloquentBaseRepository;

class UploadsRepository extends EloquentBaseRepository implements UploadsInterface
{

    /**
     * Construct Shit
     * @param Uploads $uploads
     */
    public function __construct( Uploads $uploads )
    {
        $this->model = $uploads;
    }

}