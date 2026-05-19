<?php
<<<<<<< HEAD
class home{
    public function index(){
        require_once '../app/views/home/index.php';
    }
    public function login(){
        require_once '../app/views/home/login.php';
    }
}
=======

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

>>>>>>> e8b64ebba3b781b1e691717094efbdd49d2b67a1
?>