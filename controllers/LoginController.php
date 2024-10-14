<?php

class LoginController {

  public function index(){
    require 'views/login/login.php';
  }

  public function signUp () {
    $model = new UserModel();
    $model->signUp($_POST);
    // require 'views/login/login.php';
  }

  public function signIn () {
    $model = new UserModel();
    $model->signIn($_POST);
    if(isset($_SESSION['connected']) && $_SESSION['connected'] == 1){
      require 'views/home/home.php';
    }
  }
  
}