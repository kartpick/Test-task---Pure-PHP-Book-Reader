<?php namespace Models;

use System\Model;

class Page extends Model
{
  protected $tableName = "pages";

  function getByPageNumber($chapter_id, $number)
  {
    $query = "SELECT * FROM " . $this->tableName . " WHERE chapter=? AND number=?";
    $statement = $this->database->conn->prepare($query);
    $statement->execute([$chapter_id, $number]);

    return $statement->fetch();
  }

  function getChapterFirstPage($chapter_id) {
    $query = "
      SELECT number 
      FROM " . $this->tableName . " 
      WHERE chapter=? 
      ORDER BY number
      LIMIT 1";
    $statement = $this->database->conn->prepare($query);
    $statement->execute([$chapter_id]);

    $data = $statement->fetch();
    return $data["number"];
  }
}