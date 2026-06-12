<?php

namespace App\db;

use PDO;

class Mysql
{
  private string $dbName;
  private string $dbUser;
  private string $dbPassword;
  private string $dbPort;
  private string $dbHost;

  private ?PDO $pdo = null;
  private static ?self $_instance = null;

  private function __construct()
  {
    $dbConf = parse_ini_file(APP_ROOT ."/". APP_ENV);
    $this->dbName = $dbConf["MYSQL_DATABASE"];
    $this->dbUser = $dbConf["MYSQL_ROOT_PASSWORD"];
    $this->dbPassword = $dbConf["MYSQL_PASSWORD"];
    $this->dbHost = $dbConf["MYSQL_HOST"];
    $this->dbPort = $dbConf["MYSQL_PORT"];
  }

  public static function getInstance():self
  {
    if(is_null(self::$_instance)){
      self::$_instance = new Mysql();
    }

    return self::$_instance;
  }

  public function getPDO():PDO
  {
    if(is_null($this->pdo)){
      $this->pdo = new PDO("mysql:host={$this->dbHost};port={$this->dbPort};dbname={$this->dbName}", $this->dbUser, $this->dbPassword);
    }
    return $this->pdo;
  }
}

