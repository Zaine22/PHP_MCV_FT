<?php

class Router{

  public $routes = [
    "GET" =>[],
    "POST" =>[]
  ];
  // public function register($routes){
  //     $this->routes = $routes;
  // }

  public function get($uri,$controller){
    $this->routes['GET'][$uri] = $controller;
  }

  public function post($uri,$controller){
    $this->routes['POST'][$uri] = $controller;
  }

  public function direct($uri,$method){
     if(!array_key_exists($uri, $this->routes[$method])) {
       die("404 page ");  
     }
     $explosion=$this->routes[$method][$uri];
       $this->callAction($explosion[0],$explosion[1]);
  }

  public function callAction($class,$method){
    $class = new $class;
    $class->$method();

  }

  public static function load($filename){
    $router = new Router;
    require $filename;
    return $router;
  }
}
