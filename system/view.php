<?php namespace System;

use Twig_Loader_Filesystem;
use Twig_Environment;

class View
{
  private static $VIEWS_PATH = __DIR__. "/../views/";
  private $className;
  private $twig;

  function __construct($className)
  {
    $this->className = $className;
  }

  function generate($method, $context) {
    $loader = new Twig_Loader_Filesystem(self::$VIEWS_PATH);
    $this->twig = new Twig_Environment($loader);

    //include self::$VIEWS_PATH.$this->className."/".$method.".html";
    echo $this->twig->render("pages/".$this->className."/".$method.".twig", $context);
  }

}