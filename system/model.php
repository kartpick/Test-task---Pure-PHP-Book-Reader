<?php namespace System;

use PDO;

class Model
{

  protected $database;
  protected $tableName;

  function __construct()
  {
    $this->database = Db::sharedInstance();
  }

  public function getAll()
  {
    $query = "SELECT * FROM ".$this->tableName;
    $statement = $this->database->conn->prepare($query);
    $statement->execute();

    return $statement->fetchAll();
  }

  public function get($id)
  {
    $query = "SELECT * FROM ".$this->tableName." WHERE id =".$id;
    $statement = $this->database->conn->prepare($query);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
  }
//
//  public function delete($id)
//  {
//    $query = "DELETE FROM ".$this->tableName." WHERE id=".$id;
//
//    $this->database->conn->prepare($query)->execute();
//  }
}