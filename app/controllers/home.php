<?php
class home {

    public function index() {
        $title = "Trang chủ";
        $viewname = "home/index";
        require '../app/views/layout/masterlayout.php';
    }

    public function login() {
        require '../app/views/home/login.php';
    }
}
?>