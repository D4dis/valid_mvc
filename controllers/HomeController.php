<?php


class HomeController
{

    public function index() {
        $model = new HomeModel();
        $model->index();
        require 'views/home/home.php';
    }

}

