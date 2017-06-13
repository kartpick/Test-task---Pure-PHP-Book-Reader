<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use System\Db;

require_once(__DIR__.'/vendor/autoload.php');

$db = Db::sharedInstance();

return ConsoleRunner::createHelperSet($db->manager);