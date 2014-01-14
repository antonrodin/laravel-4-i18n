<?php

class PageController extends Controller {
    
    
    public function home() {
        return View::make('home');
    }
    
    public function news() {
        return View::make('news');
    }
    
    public function contact() {
        return View::make('contact');
    }
    
}