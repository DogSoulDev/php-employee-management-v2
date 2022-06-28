<?php

class LoginController extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  function validateLogin()
  {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $admin = $this->model->verifyLogin($email, $password);

    if ($admin != null) {
      $controllerURL = BASE_URL . 'Main';
      header('Location: ' . $controllerURL);
    } else {
      $controllerURL = BASE_URL;
      header('Location: ' . $controllerURL);
    }
  }

  function render()
  {
    $this->view->render('login/index');
  }
}
