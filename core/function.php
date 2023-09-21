<?php

function dd($dd){
  echo "<pre>";
  die(var_dump($dd));
}

function view($name, $data=[]){
  extract($data);
  return require "views/$name.view.php";

}

function redirect($uri){
  header("Location: $uri");
}

function request($name){
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
      return $_POST[$name];
  }
  if($_SERVER['REQUEST_METHOD'] === 'GET'){
    return $_GET[$name];
}
}