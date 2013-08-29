<?php namespace Davzie\LaravelBootstrap\Galleries;
use Davzie\LaravelBootstrap\Core\EloquentBaseRepository;
use Davzie\LaravelBootstrap\Abstracts\Traits\TaggableRepository;

class GalleriesRepository extends EloquentBaseRepository implements GalleriesInterface
{

    use TaggableRepository;

    /**
     * Construct Shit
     * @param Galleries $galleries
     */
    public function __construct( Galleries $galleries )
    {
        $this->model = $galleries;
    }

}