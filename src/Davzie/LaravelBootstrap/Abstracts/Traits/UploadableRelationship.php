<?php namespace Davzie\LaravelBootstrap\Abstracts\Traits;

trait UploadableRelationship
{

    /**
     * The relationship setup for taggable classes
     * @return Eloquent
     */
    public function uploads()
    {
        return $this->morphMany( 'Davzie\LaravelBootstrap\Uploads\Uploads' , 'uploadable' );
    }

}