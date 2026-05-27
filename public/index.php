<?php

session_start();

require_once '../app/core/App.php';
require_once '../app/middleware.php';

// TẮT middleware tạm thời
$middleware = new Middleware();
$middleware->checklogin();

$app = new App();