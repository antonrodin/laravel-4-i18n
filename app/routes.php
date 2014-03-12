<?php

$languages = array('en', 'ru', 'es');
$locale = Request::segment(1);
if (in_array($locale, $languages)) {
    App::setLocale($locale);
} else {
    $locale = null;
}

Route::group(array('prefix' => $locale), function() {
    Route::get('/', array('as' => 'home', 'uses' => 'PageController@home' ));
    Route::get('news', array('as' => 'news', 'uses' => 'PageController@news' ));
    Route::get('contact', array('as' => 'contact', 'uses' => 'PageController@contact'));
    
    //Test locale with variable
    Route::get('/test/{variable}', function($variable) {
        return App::getLocale();
    });
    
    //Change Language
    Route::get('change_locale/{locale}', array('as' => 'change_locale', function($locale) {
        //Set locale
        App::setLocale($locale);
        //Get last route from session
        $route = Session::get('last_route');
        //Convert route to array
        $array_route = explode("/", $route);
        //Change first segment of route to "es", "en" or whatever
        $array_route[0] = $locale;
        //Convert array to string
        $redirect_route = implode("/", $array_route);
        //Redirect to new route
        return Redirect::to($redirect_route);
    }));
});