<?php namespace System;

use ReflectionClass;

/**
 *
 */
class Controller {

    public $class_name;

    public $view;

    public $data;

    private $lang;

    protected $manager;

    function __construct()
    {
        $this->manager = Db::sharedInstance()->manager;
        $this->lang = require __DIR__."/../config/lang.php";

        $this->changeLanguage();
        $this->data = [
            "lang"      => $this->getLanguage(),
            "languages" => $this->getLanguages(),
        ];
        $this->class_name = (new ReflectionClass($this))->getShortName();
        $this->view = new View($this->class_name);
    }

    private function getLanguage()
    {
        $lang_code = 'en';
        if (! empty($_SESSION["lang"])) {
            $lang_code = $_SESSION["lang"];
        } else {
            $_SESSION["lang"] = $lang_code;
        }

        return $this->lang[$lang_code];
    }

    private function getLanguages()
    {
        $languages = [];

        foreach ($this->lang as $key => $lang) {
            $languages[$key] = [
                "value"  => $lang["lang"],
                "active" => $_SESSION["lang"] == $key ? true : false,
            ];
        }

        return $languages;
    }

    private function changeLanguage()
    {
        if (! $_POST) {
            return;
        }
        if (! isset($_POST["action"])) {
            return;
        }

        $action = $_POST["action"];

        if ($action != "change_language") {
            return;
        }
        if (! isset($_POST["lang"])) {
            return;
        }

        $lang = $_POST["lang"];

        if (! empty($this->lang[$lang])) {
            $_SESSION["lang"] = $lang;
        }
    }
}