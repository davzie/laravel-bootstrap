<?php namespace Davzie\LaravelBootstrap\Blocks;
use Davzie\LaravelBootstrap\Core\EloquentBaseRepository;

class BlocksRepository extends EloquentBaseRepository implements BlocksInterface
{

    /**
     * Construct Shit
     * @param Blocks $blocks
     */
    public function __construct( Blocks $blocks )
    {
        $this->model = $blocks;
    }

}