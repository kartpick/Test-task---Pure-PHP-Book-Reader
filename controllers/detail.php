<?php namespace Controller;

use Models\Book;
use Models\Page;
use Models\Chapter;
use System\Controller;

/**
 *
 */
class Detail extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $bookModel = new Book();
    $chapterModel = new Chapter();

    $bookId = intval($_GET["id"]);
    $this->data["book"] = $bookModel->get($bookId);
    $this->data["chapters"] = $chapterModel->getAllByBookId($bookId);

    $this->view->generate('index', $this->data);
  }

  function read()
  {
    $pageModel = new Page();
    echo 'read method';
  }
}