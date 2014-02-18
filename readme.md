## A Laravel 4.1 Bootstrap CMS
--------------------------------------
**Screencasts:** [Laravel Bootstrap YouTube Playlist](http://www.youtube.com/playlist?list=PL8isL2kTKzMOm1MBVGYSbBuRN3Yi0i7wu)

A Laravel 4.1 **PHP 5.4** CMS using Bootstrap 3. Laravel Bootstrap does not handle the front-end of your site. It merely provides a CRUD framework with some predefined systems (image gallery, pages etc) for you to enter and edit your data with.

![Laravel Bootstrap Screenshot](http://i.imgur.com/CiUa8wt.png "Laravel Bootstrap Screenshot")

It uses Redactor JS for content editing and provides a really simple way to prototype new 'objects'. You can make objects 'taggable' and 'uploadable' which means you can have unlimited number of tags associated with an item and also unlimited number of image uploads too.

## Composer Require
Nice and simple

    "davzie/laravel-bootstrap": "1.*"

### Linking The Service Provider To Your Installation
Add this string to your array of providers in app/config/app.php

    Davzie\LaravelBootstrap\LaravelBootstrapServiceProvider

### Publishing The Configuration
Publish the configurations for this package in order to change them to your liking:

    php artisan config:publish davzie/laravel-bootstrap

### Publishing The Assets
You need assets bro!

    php artisan asset:publish davzie/laravel-bootstrap

### Migrating and Seeding The Database
Seed the database, this pretty much just seeds an example user and settings. Migration is pretty simple, ensure your database config is setup and run this:

    php artisan migrate --package="davzie/laravel-bootstrap"
    php artisan db:seed --class="Davzie\LaravelBootstrap\Seeds\DatabaseSeeder"
