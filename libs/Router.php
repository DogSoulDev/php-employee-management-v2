<?php

    class Router{

        function __construct()
        {
          $url = $_GET['url'];
          $url = rtrim($url, '/');
          $url = explode('/', $url);

        }
    }
