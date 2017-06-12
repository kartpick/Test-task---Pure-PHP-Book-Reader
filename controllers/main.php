<?php namespace Controller;

use System\Controller;
use Models\Book;

/**
 *
 */
class Main extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $model = new Book();
    $this->data["books"] = $model->getAll();
    print_r($this->data);

    $this->view->generate('index', $this->data);
  }
}