<?php
namespace Davzie\LaravelBootstrap\Composers;
use Illuminate\Support\MessageBag;
use Auth, Session, Config;

class Page{

    /**
     * Compose the view with the following variables bound do it
     * @param  View $view The View
     * @return null
     */
    public function compose($view)
    {
        $view->with('user', Auth::user())
             ->with('app_name', Config::get('laravel-bootstrap::app.name') )
             ->with('urlSegment', Config::get('laravel-bootstrap::app.access_url') )
             ->with('menu_items', Config::get('laravel-bootstrap::app.menu_items') )
             ->with('success', Session::get('success' , new MessageBag ) );
    }

}