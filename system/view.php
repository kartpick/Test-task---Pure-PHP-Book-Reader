<?php namespace System;


class View
{
  private static $VIEWS_PATH = __DIR__. "/../views/";
  private $className;

  function __construct($className)
  {
    $this->className = $className;
  }

  function generate($method, $data) {
    print_r($data);
    include self::$VIEWS_PATH.$this->className."/".$method.".html";
  }

}