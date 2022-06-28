<?php

class FailureController extends Controller
{
  function __construct()
  {
    parent::__construct();
    //This creates a variable inside the view class and you can use it in the view HTML with $this->message
    $this->view->message = "400. Your client has issued a malformed or ilegal request.";
    $this->view->render('error/index');
  }
}
