<?php namespace System;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Db {

    public $conn;

    public $manager;

    protected static $_instance;

    protected $defaults = [
        'user'     => 'root',
        'password' => '',
        'driver'   => 'pdo_mysql',
        'dbname'   => 'test_books_orm',
        'host'     => '127.0.0.1',
        'charset'  => 'utf8',
    ];

    private function __construct($settings = [], $isDevMode = true)
    {
        $settings = array_merge($this->defaults, $settings);

        $paths = [__DIR__."/../models/"];
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

        $this->manager = EntityManager::create($settings, $config);
    }

    public static function sharedInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    private function __clone()
    {
    }
}
