<?php

/**
 * The application configuration file, used to setup globally used values throughout the application
 */
return array(

    /**
     * The name of the application, will be used in the main management areas of the application
     */
    'name' => 'Your Fantastic CMS',

    /**
     * The email address associated with support enquires on a technical basis
     */
    'support_email' => 'example@example.com',

    /**
     * The base path to put uploads into
     */
    'upload_base_path'=>'uploads/',

    /**
     * The URL key to access the main admin area
     */
    'access_url'=>'admin',

    /**
     * The menu items shown at the top and side of the application
     */
    'menu_items'=>array(
        'posts'=>array(
            'name'=>'Posts',
            'icon'=>'list',
            'top'=>true
        ),
        'blocks'=>array(
            'name'=>'Content Blocks',
            'icon'=>'th-large',
            'top'=>true
        ),
        'galleries'=>array(
            'name'=>'Galleries',
            'icon'=>'picture',
            'top'=>true
        ),
        'users'=>array(
            'name'=>'Users',
            'icon'=>'user',
            'top'=>true
        ),
        'settings'=>array(
            'name'=>'Settings',
            'icon'=>'cog',
            'top'=>true
        )
    )
);
