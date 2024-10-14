<?php

class UserPageController
{


  public function index()
  {
    $model = new UserModel();
    if (!isset($_SESSION['connected']) || empty($_SESSION['connected'])) {
      require 'views/login/login.php';
    } else {
      $datas = $model->getUserById($_GET['id']);
      foreach ($datas as $data) {
        $user = new User($data);
      }
      require 'views/userPage.php';
    }
  }

  public function update() {
    $model = new UserModel();
    $model->updateUser($_GET['id'], $_POST);
    require 'views/userPage.php';
  }
}
