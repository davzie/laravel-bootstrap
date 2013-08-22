<?php namespace Davzie\LaravelBootstrap\Settings;
use Davzie\LaravelBootstrap\Core\EloquentBaseRepository;
use Config;

class SettingsRepository extends EloquentBaseRepository implements SettingsInterface
{

    /**
     * Construct Shit
     * @param Settings $settings
     */
    public function __construct( Settings $settings )
    {
        $this->model = $settings;
    }

    /**
     * Get a setting by it's key or slug or whatever
     * @param  string $key The key (contact-address , website-name etc)
     * @return One God-Damn Record
     */
    public function getByKey( $key ){
        return $this->model->where('key',$key)->first();
    }

    /**
     * Bit of a unique one here, get the application name from the database
     * If it doesn't exist in the key we expect then use the fallback configuration file
     * @return string
     */
    public function getAppName()
    {
        if( $name = $this->model->where('key','application_name')->first() )
            return $name->value;

        return Config::get('laravel-bootstrap::app.name');
    }

}