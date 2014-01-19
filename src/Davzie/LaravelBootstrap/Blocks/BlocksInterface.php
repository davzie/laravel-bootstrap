<?php namespace Davzie\LaravelBootstrap\Blocks;

interface BlocksInterface {

    /**
     * Get all the blocks where the key is equal to the item you mention
     * @return Eloquent
     */
    public function getByKey($key);

}