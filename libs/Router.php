<?php
class Router
{

  function __construct()
  {
    $url = isset($_GET['url']) ? $_GET['url'] : null;
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    $controllerURL = 'controllers/' . $url[0] . '.php';

    if (file_exists($controllerURL)) {
      require_once $controllerURL;
      $controller = new $url[0];
      if (isset($url[1])) {
        $controller->{$url[1]}();
      }
    } else {
      $url[0] = 'login';
      $controllerURL = 'controllers/' . $url[0] . '.php';
      require_once $controllerURL;
      $controller = new $url[0];
    }
  }
}
