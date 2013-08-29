<?php namespace Davzie\LaravelBootstrap\Blocks;
use Davzie\LaravelBootstrap\Core\EloquentBaseRepository;
use Davzie\LaravelBootstrap\Abstracts\Traits\TaggableRepository;

class BlocksRepository extends EloquentBaseRepository implements BlocksInterface
{

    use TaggableRepository;

    /**
     * Construct Shit
     * @param Blocks $blocks
     */
    public function __construct( Blocks $blocks )
    {
        $this->model = $blocks;
    }

}