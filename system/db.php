<?php namespace System;

use PDO;
use PDOException;

class Db
{

  public $conn;
  protected static $_instance;

  protected $defaults = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db' => 'test_books',
    'port' => null,
    'socket' => null,
    'charset' => 'utf8',
  ];

  private function __construct($settings = [])
  {
    $settings = array_merge($this->defaults, $settings);

    try {
      $DBH = new PDO("mysql:host=" . $settings["host"] . ";dbname=" . $settings["db"].";charset=" . $settings["charset"],
        $settings["user"],
        $settings["pass"]);

      $this->conn = $DBH;
    } catch (PDOException $e) {
      echo "DB Error: " . $e->getMessage();
      return;
    }
  }

  public static function sharedInstance()
  {
    if (self::$_instance == null) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  private function __clone()
  {
  }
}
