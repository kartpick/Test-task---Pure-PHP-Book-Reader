<?php namespace Models;

use System\Model;

class Book extends Model
{

  protected $tableName = "books";


  public function getAllByLang($lang)
  {
    $query = "SELECT * FROM ".$this->tableName." WHERE language=?";
    $statement = $this->database->conn->prepare($query);
    $statement->execute([$lang]);

    return $statement->fetchAll();
  }
}