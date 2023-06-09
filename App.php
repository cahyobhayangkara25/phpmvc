<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    require_once '../app/controller' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if( isset($url[1]) ) {
            if(method_exists($this->controller, $url[1]) ) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
    public function __construct()
    {
        $url = $this->parseURL();
        
        //controller
        if(file_exists('../app/controllers/' . $url[0] . '.php') ) {
            $this->controller = $url[0];
            unset($url[0] );
            unset($url[0]);
        }
    }



    public function parseURL () 
    {
        if ( isset($_GET['url']) ) {
            $url  = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}