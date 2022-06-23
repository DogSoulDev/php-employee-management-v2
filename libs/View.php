<?php

class View{

    function __construct()
    {
      
    }

    function render($fileName){
      require 'views/' . $fileName . '.php';
    }
}
