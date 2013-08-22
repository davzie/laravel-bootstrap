<?php namespace Davzie\LaravelBootstrap\Controllers;
use Davzie\LaravelBootstrap\Settings\SettingsInterface;

class SettingsController extends ObjectBaseController {

    /**
     * Make the controller enabled image uploads
     * @var boolean
     */
    protected $uploadable = false;

    /**
     * Nothing can be deleted from this controller, FO SURE!
     * @var boolean
     */
    protected $deletable = false;

    /**
     * The place to find the views / URL keys for this controller
     * @var string
     */
    protected $view_key = 'settings';

    /**
     * Construct Shit
     */
    public function __construct( SettingsInterface $settings )
    {
        $this->model = $settings;
        parent::__construct();
    }

}