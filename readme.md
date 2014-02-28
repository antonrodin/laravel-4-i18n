Laravel 4 Framework with i18n example
=====================================

This code is a solution for route prefix solution and switch URL locale. This example it has been 
written thanks to https://github.com/barryvdh I found the "core" trick in 
official Laravel Forum. Link to discussion: http://forums.laravel.io/viewtopic.php?pid=44870

;)

1. How it Works?
=====================================

First off all, you should look inside Laravel 4 Localization documentation: http://laravel.com/docs/localization

 It Works thx to this code snippet inside <strong>app/routes.php</strong>

```PHP
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
});
```

Also you should save inside Session the previous route, after each request. Inside <strong>app/filters.php</strong>

```PHP
App::after(function($request, $response)
{
    //Store last inside session
    $route = Route::currentRouteName();
    Session::put('last_route', $route);
});
````

2. Then... How you can change locale and prefix, from any route
===============================================================

My solution:

```PHP
Route::group(array('prefix' => $locale), function() {
    Route::get('/', array('as' => 'home', 'uses' => 'PageController@home' ));
    Route::get('news', array('as' => 'news', 'uses' => 'PageController@news' ));
    Route::get('contact', array('as' => 'contact', 'uses' => 'PageController@contact'));
    
    //Change Language
    Route::get('change_locale/{locale}', array('as' => 'change_locale', function($locale) {
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
```

Inside your blade template you should have something like this:

```PHP
<ul>
    <li><a href="{{ URL::to('/change_locale/es') }}">Español</a></li>
    <li><a href="{{ URL::to('/change_locale/en') }}">English</a></li>
    <li><a href="{{ URL::to('/change_locale/ru') }}">Pусский</a></li>
</ul>
```

3. Wanna redirect to example.com/zh?
====================================

Inside <strong>PageController@home</strong> method, you should redirect to default_locale when Request::segment(1) is empty:

```PHP
class PageController extends Controller {  
    public function home() {
        $locale = Request::segment(1);    
        if ($locale == '') {
            $default_locale = App::getLocale();
            return Redirect::to("/{$default_locale}");
        }
        return View::make('home');
    }
}
```

And all that shoud do the trick... sorry for my English folks!