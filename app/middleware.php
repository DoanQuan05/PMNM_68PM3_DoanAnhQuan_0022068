<?php
require_once '../app/core/App.php';
session_start();
    class middleware {
    function checklogin() {
        $publicPages = ['/home/login', '/auth/login', 'home/login', 'auth/login'];
        $currentUri = trim($_SERVER['REQUEST_URI'], '/');
        $isPublic = false;
        foreach ($publicPages as $page) {
            if (strpos($currentUri, trim($page, '/')) !== false) {
                $isPublic = true;
                break;
            }
        }
        if (!isset($_SESSION['username']) && !$isPublic) {
            header('Location: /home/login');
            exit();
        }
    }
    }
?>