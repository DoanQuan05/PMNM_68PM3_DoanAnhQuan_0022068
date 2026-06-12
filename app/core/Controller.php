<?php
class Controller {
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($viewName, $data = [], $title = '') {
        extract($data);
        $viewname = $viewName;
        require '../app/views/layout/masterlayout.php';
    }
}