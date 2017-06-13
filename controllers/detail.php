<?php namespace Controller;

use System\Controller;

/**
 *
 */
class Detail extends Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $bookId = intval($_GET["id"]);

        $bookEntity = $this->manager->find('Models\Book', $bookId);

        $this->data["book"] = $bookEntity;
        $this->data["chapters"] = $bookEntity->getChapters();

        $this->view->generate('index', $this->data);
    }

    function read()
    {
        $chapterId = intval($_GET["chapter"]);

        $chapterEntity = $this->manager->find('Models\Chapter', $chapterId);
        $pageRepository = $this->manager->getRepository('Models\Page');

        if (isset($_GET["page_number"])) {
            $pageNumber = intval($_GET["page_number"]);
        } else {
            $pageNumber = $chapterEntity->getPages()->first()->getId();
        }

        $pageEntity = $pageRepository->findOneBy([
            "number"  => $pageNumber,
            "chapter" => $chapterEntity->getId(),
        ]);

        $this->data["page"] = $pageEntity;
        $this->data["book"] = $chapterEntity->getBook();
        $this->data["chapter"] = $chapterEntity;
        $this->data["prev_page"] = $pageEntity->getPrevious();
        $this->data["next_page"] = $pageEntity->getNext();

        $this->view->generate('read', $this->data);
    }
}