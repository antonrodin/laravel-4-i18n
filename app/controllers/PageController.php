<?php

class PageController extends Controller {
    
    
    public function home() {
        $locale = Request::segment(1);    
        if ($locale == '') {
            $default_locale = App::getLocale();
            return Redirect::to("/{$default_locale}");
        }
        return View::make('home');
    }
    
    public function news() {
        return View::make('news');
    }
    
    public function contact() {
        return View::make('contact');
    }
    
}