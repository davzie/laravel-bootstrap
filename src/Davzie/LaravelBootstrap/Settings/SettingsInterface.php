<?php namespace Davzie\LaravelBootstrap\Settings;

interface SettingsInterface {
    
    /**
     * Get a setting by it's key or slug or whatever
     * @param  string $key The key (contact-address , website-name etc)
     * @return One God-Damn Record
     */
    public function getByKey( $key );

    /**
     * Bit of a unique one here, get the application name from the database
     * If it doesn't exist in the key we expect then use the fallback configuration file
     * @return string
     */
    public function getAppName();

}