<?php namespace Davzie\LaravelBootstrap\Controllers;
use Illuminate\Support\MessageBag;
use Davzie\LaravelBootstrap\Settings\SettingsInterface;
use Input, Redirect;

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

    /**
     * The action taken when the user submits new / existing settings back to us to save
     * @return Redirect
     */
    public function postIndex()
    {
        $settings = Input::get('settings' , false );

        // If there's no settings we're already in trouble, ensure the errors var states this
        $errors = ( $settings ? false : true ); 

        if( !$errors ){
            foreach( $settings as $id=>$value ){
                $record = $this->model->getById( $id );
                if( !$record->isValid( array( 'id'=>$id , 'value'=>$value ) ) ){
                    $errors = true; // Just log the error, we want to save other records if they're valid
                }else{
                    // All is great, save this setting
                    $record->value = $value;
                    $record->save(); 
                }
            }
        }

        // Notify the user of a problem if errors exist
        if($errors)
            return Redirect::to( $this->urlSegment.'/'.$this->view_key )->with( 'errors' , new MessageBag( array('Please make sure all boxes are filled out') ) );

        // Looks like a roaring success guys, great job, high five
        return Redirect::to( $this->urlSegment.'/'.$this->view_key )
                        ->with('success' , new MessageBag( array('Settings Saved.') ) );
    }

}