<?php
namespace Davzie\LaravelBootstrap\Controllers;
use Illuminate\Routing\Controller;
use View, Config;

abstract class BaseController extends Controller{

    protected $whitelist = array();

    /**
     * The URL segment that can be used to access the system
     * @var string
     */
    protected $urlSegment;

    /**
     * Initializer.
     *
     * @access   public
     * @return   void
     */
    public function __construct()
    {
        // Achieve that segment
        $this->urlSegment = Config::get('laravel-bootstrap::app.access_url');

        // Setup composed views and the variables that they require
        $this->beforeFilter( 'adminFilter' , array('except' => $this->whitelist) );
        $composed_views = array( 'laravel-bootstrap::*' );
        View::composer($composed_views, 'Davzie\LaravelBootstrap\Composers\Page');
    }

}