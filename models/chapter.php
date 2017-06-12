<?php namespace Models;

use System\Model;

class Chapter extends Model
{

  protected $tableName = "chapter";

  function getAllByBookId($id)
  {
    $query = "SELECT * FROM ".$this->tableName." WHERE book=".$id;
    $statement = $this->database->conn->prepare($query);
    $statement->execute();

    return $statement->fetchAll();
  }

}