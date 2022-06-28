<?php

class Database
{

  private $host;
  private $db;
  private $user;
  private $password;
  private $charset;

  public function __construct()
  {
    $this->host = HOST;
    $this->db = DB;
    $this->user = USER;
    $this->password = PASSWORD;
    $this->charset = CHARSET;
  }

  function connect()
  {
    try {
      $connection = "mysql:host=" . $this->host . ";" . "dbname=" . $this->db . ";" . "charset=" . $this->charset . ";";
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
      ];
      $pdo = new PDO($connection, $this->user, $this->password, $options);
      return $pdo;
    } catch (PDOException $e) {
      require_once CONTROLLERS . "FailurController.php";
    }
  }
}
