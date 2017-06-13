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
    $bookModel = new Book();
    $chapterModel = new Chapter();
    $pageModel = new Page();

    $bookId = intval($_GET["id"]);
    $chapterId = intval($_GET["chapter"]);
    $this->data["book"] = $bookModel->get($bookId);
    $this->data["chapter"] = $chapterModel->get($chapterId);

    if (isset($_GET["page_number"])) {
      $pageNumber = $_GET["page_number"];
    } else {
      $pageNumber = $pageModel->getChapterFirstPage($this->data["chapter"]["id"]);
    }

    $this->data["page"] = $pageModel->getByPageNumber($chapterId, $pageNumber);
    $this->data["prev_page"] = $pageModel->get($this->data["page"]["prev_page"]);
    $this->data["next_page"] = $pageModel->get($this->data["page"]["next_page"]);

    $this->view->generate('read', $this->data);
  }
}