<?php

// The Posts Bindings
App::bind('Davzie\LaravelBootstrap\Posts\PostsInterface', function(){
    return new Davzie\LaravelBootstrap\Posts\PostsRepository( new Davzie\LaravelBootstrap\Posts\Posts );
});

// The Settings Bindings
App::bind('Davzie\LaravelBootstrap\Settings\SettingsInterface', function(){
    return new Davzie\LaravelBootstrap\Settings\SettingsRepository( new Davzie\LaravelBootstrap\Settings\Settings );
});

// The Blocks Bindings
App::bind('Davzie\LaravelBootstrap\Blocks\BlocksInterface', function(){
    return new Davzie\LaravelBootstrap\Blocks\BlocksRepository( new Davzie\LaravelBootstrap\Blocks\Blocks );
});