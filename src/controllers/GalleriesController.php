<?php namespace Davzie\LaravelBootstrap\Controllers;
use Davzie\LaravelBootstrap\Galleries\GalleriesInterface;

class GalleriesController extends ObjectBaseController {

    /**
     * The place to find the views / URL keys for this controller
     * @var string
     */
    protected $view_key = 'galleries';

    /**
     * Construct Shit
     */
    public function __construct( GalleriesInterface $galleries )
    {
        $this->model = $galleries;
        parent::__construct();
    }

}