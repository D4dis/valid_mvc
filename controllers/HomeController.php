<?php


class HomeController
{

    public function index() {
        $model = new HomeModel();
        $datas = $model->index();
        foreach($datas as $data){
            $cards[] = new Offer($data);
        }
        require 'views/home/home.php';
    }

}

