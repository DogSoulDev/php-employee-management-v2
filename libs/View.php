<?php

class View
{

  function __construct()
  {
  }

  function render($fileName)
  {
    require VIEWS . $fileName . '.php';
  }
}
