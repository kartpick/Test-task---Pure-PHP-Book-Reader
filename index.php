<?php
ini_set('display_errors', 1);
require_once(__DIR__ . '/vendor/autoload.php');

use System\Kernel;

session_start();

try {
  Kernel::route();
} catch (Exception $e) {
  echo $e->getMessage();
  return;
}