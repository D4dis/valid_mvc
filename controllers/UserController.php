<?php


class UserController
{
    public function logout() {
        $model = new UserModel();
        $model->logout();
        header("Location: index.php");
    }
}

