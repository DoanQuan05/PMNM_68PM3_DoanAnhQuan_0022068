<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../app/middleware.php';
require_once '../app/core/App.php'; 

$middleware = new Middleware();
$middleware->checklogin();

$app = new App();
?>