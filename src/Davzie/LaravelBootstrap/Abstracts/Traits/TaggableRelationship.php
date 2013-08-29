<?php namespace Davzie\LaravelBootstrap\Abstracts\Traits;
use Davzie\LaravelBootstrap\Tags\Tags as TagEloquent;
use Input;

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

    /**
     * Save tags, pass in a CSV separated list
     * @param  string $tags A comma separated list of tags
     * @return void
     */
    public function saveTags( $tags = null )
    {
        $tags = is_null($tags) ? Input::get('tags',false) : $tags;

        // Delete all existing tags for this item
        $this->tags()->delete();

        if( $tags = explode(',',$tags) ){
            foreach($tags as $tag){
                $tagObject = new TagEloquent();
                $tagObject->tag = $tag;
                $this->tags()->save( $tagObject );
            }
        }

        return;
    }

}