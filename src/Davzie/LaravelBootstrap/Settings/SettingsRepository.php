<?php namespace Davzie\LaravelBootstrap\Settings;
use Davzie\LaravelBootstrap\Core\EloquentBaseRepository;

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

}