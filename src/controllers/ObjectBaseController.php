<?php namespace Davzie\LaravelBootstrap\Controllers;
use Illuminate\Support\MessageBag;
use View, Redirect, Input;

abstract class ObjectBaseController extends BaseController {

    /**
     * The model to work with for editing stuff
     */
    protected $model;

    /**
     * The place to find some standardised views ( products, posts etc )
     * @var string
     */
    protected $view_key;

    /**
     * Is the controller allowed to upload images?
     * @var boolean
     */
    protected $uploadable = false;

    /**
     * Can items be deleted?
     * @var boolean
     */
    protected $deletable = true;

    /**
     * Main users page.
     *
     * @access   public
     * @return   View
     */
    public function getIndex()
    {
        return View::make( 'laravel-bootstrap::'.$this->view_key.'.index' )
                     ->with( 'items' , $this->model->getAll() );
    }

    /**
     * The new object
     * @access public
     * @return View
     */
    public function getNew(){
        if( !View::exists( 'laravel-bootstrap::'.$this->view_key.'.new' ) )
            return App::abort(404, 'Page not found');

        return View::make('laravel-bootstrap::'.$this->view_key.'.new');
    }

    /**
     * Delete an object based on the ID passed in
     * @param  integer $id The object ID
     * @return Redirect
     */
    public function getDelete( $id ){
        if( $this->deletable == false )
            return App::abort(404, 'Page not found');

        $this->model->find($id)->delete();
        $message = 'The item was successfully removed.';
        return Redirect::to( $this->urlSegment.'/'.$this->view_key )
                         ->with('success', new MessageBag( array( $message ) ) );
    }

    /**
     * Upload an image for this product ID
     * @return Response
     */
    public function postUpload( $id ){
        // This should only be accessible via AJAX you know...
        if( !Request::ajax() or $this->uploadable == false )
            Response::json('error', 400);

        return Response::json('error', 400);

    }

    /**
     * Set the order of the images
     * @return Response
     */
    public function postOrderImages(){
        // This should only be accessible via AJAX you know...
        if( !Request::ajax() or $this->uploadable == false  )
            Response::json('error', 400);

        return Response::json('error', 400);
    }

}