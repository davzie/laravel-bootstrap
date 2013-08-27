<?php namespace Davzie\LaravelBootstrap\Abstracts\Traits;

trait TaggableRelationship
{

    /**
     * The relationship setup for taggable classes
     * @return Eloquent
     */
    public function tags()
    {
        return $this->morphMany( 'Davzie\LaravelBootstrap\Tags\Tags' , 'taggable' );
    }

    /**
     * Return a comma separated list of tags for use in the views, can be called like $item->tags_csv
     * @return string
     */
    public function getTagsCsvAttribute()
    {
        $tags = array();
        foreach( $this->tags as $tag )
            $tags[] = $tag->tag;

        return implode( ',' , $tags );
    }

}