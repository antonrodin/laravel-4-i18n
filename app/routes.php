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
    
    //Change Language
    Route::get('change_locale/{locale}', array('as' => 'lang', function($locale) {
        App::setLocale($locale);
        $route = Session::get('last_route');
        if ($route == "home") {
            $redirect_route = "/{$locale}";
        } else {
            $redirect_route = "/{$locale}/{$route}";
        }
        return Redirect::to($redirect_route);
    }));
});