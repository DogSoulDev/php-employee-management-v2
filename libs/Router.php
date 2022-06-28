<?php

require_once './controllers/FailureController.php';
class Router
{

  function __construct()
  {
    // $url = isset($_GET['url']) ? $_GET['url'] : null;
    // if ($url != null) {
    //   $url = rtrim($url, '/');
    //   $url = explode('/', $url);
    // } else {
    //   $url[0] = 'Login';
    // }

    //We can GET the URL because we specified this in the htaccess
    // first line is like an IF and next the ? it's the true condition and next : it's the else condition
    $url = isset($_GET['url']) ? $_GET['url'] : null;
    $url = rtrim($url, '/');
    $url = explode('/', $url);

    //When there is no controller in the URL
    if (empty($url[0])) {
      $fileController = CONTROLLERS . '/' . 'LoginController.php';
      require_once($fileController);
      $controller = new LoginController();
      $controller->loadModel('login');
      $controller->render();
      return false;
    }

    $class = ucfirst($url[0]);
    $fileController = CONTROLLERS . '/' . $class . 'Controller.php';
    $classController = $class . 'Controller';

    if (file_exists($fileController)) {
      require_once($fileController);

      //Inicialize the controller
      $controller = new $classController; //Its the same than writte Main
      $controller->loadModel($class);

      //Number of array elements
      $nParam = sizeof($url);
      if ($nParam == 1) {
        $controller->defaultMethod();
      }
      if ($nParam == 2) {
        //Llamamos a la función que está en la URL del controlador
        if ($controller->{$url[1]}() === false) {
          echo $url[1];
          $controller = new FailureController();
        }
        //If url have more than 2 params, it means that have value like and id
      } else if ($nParam > 2) {
        $params = [];
        for ($i = 2; $i < $nParam; $i++) {
          array_push($params, $url[$i]);
        }
        if ($controller->{$url[1]}($params) === false) {
          $controller = new FailureController();
        }
      }
    } else {
      $controller = new FailureController();
    }

    //   if (file_exists($classController)) {
    //     require_once $classController;
    //     $ControllerObject = $url[0] . 'Controller';
    //     $controller = new $ControllerObject;
    //     $controller->loadModel($url[0]);
    //     if (isset($url[1])) {
    //       $controller->{$url[1]}();
    //     }
    //   } else {
    //     $controller = new FailureController();
    //   }

  }
}
