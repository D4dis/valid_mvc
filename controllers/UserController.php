<?php


class UserController
{
    public function logout() {
        $model = new UserModel();
        $model->logout();
        require 'views/home/home.php';
    }
}

