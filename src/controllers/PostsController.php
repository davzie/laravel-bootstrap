<?php namespace Davzie\LaravelBootstrap\Controllers;
use Davzie\LaravelBootstrap\Posts\PostsInterface;
use Input, Redirect, Str;
use Illuminate\Support\MessageBag;
class PostsController extends ObjectBaseController {

    /**
     * The place to find the views / URL keys for this controller
     * @var string
     */
    protected $view_key = 'posts';

    /**
     * Construct Shit
     */
    public function __construct( PostsInterface $posts )
    {
        $this->model = $posts;
        parent::__construct();
    }

    /**
     * The method to handle the posted data
     * @param  integer $id The ID of the object
     * @return Redirect
     */
    public function postEdit( $id )
    {
        $record = $this->model->requireById( $id );
        $record->fill( Input::all() );

        if( !$record->isValid() )
            return Redirect::to( $this->edit_url.$id )->with( 'errors' , $record->getErrors() );

        // Run the hydration method that populates anything else that is required / runs any other
        // model interactions and save it.
        $record->hydrateRelations()->save();

        // Redirect that shit man! You did good! Validated and saved, man mum would be proud!
        return Redirect::to( $this->object_url )->with( 'success' , new MessageBag( array( 'Item Saved' ) ) );
    }

}