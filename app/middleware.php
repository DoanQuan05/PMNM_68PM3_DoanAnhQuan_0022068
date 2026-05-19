<?php
require_once '../app/core/App.php';
session_start();

class Middleware {
    function checklogin() {
        $currentUrl = isset($_GET['url']) ? trim($_GET['url'], '/') : 'home/index';

        $publicPages = ['home/login'];

        if (!isset($_SESSION['username']) && !in_array($currentUrl, $publicPages)) { 
            header('Location: /QLSinhVien/public/home/login');
            exit();
        }
    }   
}
?>