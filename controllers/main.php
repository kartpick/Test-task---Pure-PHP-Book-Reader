<?php namespace Controller;

use System\Controller;

/**
 *
 */
class Main extends Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $bookRepository = $this->manager->getRepository('Models\Book');
        $this->data["books"] = $bookRepository->findBy(["language" => $_SESSION["lang"]]);

        $this->view->generate('index', $this->data);
    }
}