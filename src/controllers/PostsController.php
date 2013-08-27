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

        if( !$record )
            return Redirect::to( $this->object_url )->with( 'errors' , new MessageBag( array( 'No record found with ID: '.$id ) ) );

        $record->title = Input::get('title');
        $record->slug = Str::slug( Input::get('title') , '-' );
        $record->content = Input::get('content');

        if( !$record->isValid( Input::all() ) )
            return Redirect::to( $this->edit_url.$id )->with( 'errors' , $record->getErrors() );

        $record->save();

        return Redirect::to( $this->object_url )->with( 'success' , new MessageBag( array( 'Item Saved' ) ) );
    }

}