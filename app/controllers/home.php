<?php

require_once '../app/core/Controller.php';

class home extends Controller
{
    public function index()
    {
        $this->view("home/index");
    }

    public function hello()
    {
        echo "Xin Chao MVC";
    }

    public function show($id)
    {
        echo "ID la: " . $id;
    }
}

?>