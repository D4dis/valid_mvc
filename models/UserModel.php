<?php

require_once 'config/config.php';

class UserModel extends CoreModel
{

  private $_req;

  public function __destruct()
  {
    if (!empty($this->_req)) {
      $this->_req->closeCursor();
    }
  }

  public function signIn(array $data)
  {
    if (!isset($data['emailSignIn']) || !isset($data['pwdSignIn'])) {
      throw new Exception("Veillez remplir tous les champs");
    }

    $email = strtolower($data['emailSignIn']);
    $mdp = strtolower($data['pwdSignIn']);

    $sql = "SELECT use_login, use_password, use_name, use_id FROM _user WHERE use_login = :email";

    try {
      $this->_req = $this->getDb()->prepare($sql);
      $this->_req->bindValue(':email', $email, PDO::PARAM_STR);
      $this->_req->execute();
      $datas = $this->_req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      $e->getMessage();
    }

    if (password_verify($mdp, $datas['use_password'])) {
      session_start();
      $_SESSION['connected'] = 1;
      $_SESSION['id'] = $datas['use_id'];
      $_SESSION['user_name'] = $datas['use_name'];
    } else {
      $_SESSION['error'] = "Identifians ou Mot de passe incorrect";
      require 'views/login/login.php';
    }
  }

  public function signUp(array $data)
  {
    if (!isset($data['role']) || !in_array($data['role'], ['3', '2'])) {
      $_SESSION['error'] = throw new Exception("Veuillez sélectionner un rôle valide (Entreprise ou Etudiant).");
    }

    if ($data['pwdSignUp'] !== $data['ConfpwdSignUp']) {
      $_SESSION['error'] = throw new Exception("Les mots de passe ne correspondent pas.");
    }

    if (!filter_var($data['emailSignUp'], FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] = throw new Exception("Format d'email invalide.");
    }

    $name = strtolower($data['nameSignUp']);
    $email = strtolower($data['emailSignUp']);
    $role = $data['role'];

    $hashedPassword = password_hash($data['pwdSignUp'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO _user (use_name, use_login, use_password, rol_id) VALUES (:name, :mail, :mdp, :role)";
    try {
      $this->_req = $this->getDb()->prepare($sql);
      $this->_req->bindValue(':name', $name, PDO::PARAM_STR);
      $this->_req->bindValue(':mail', $email, PDO::PARAM_STR);
      $this->_req->bindValue(':mdp', $hashedPassword, PDO::PARAM_STR);
      $this->_req->bindValue(':role', $role, PDO::PARAM_INT);
    } catch (PDOException $e) {
      $e->getMessage();
    }
    require 'views/login/login.php';
  }

  public function logout()
  {
    session_destroy();
    unset($_SESSION);
  }

  public function getUserById($userId)
  {
    $sql = "SELECT * FROM _user WHERE use_id = :id";
    $this->_req = $this->getDb()->prepare($sql);
    $this->_req->bindValue(':id', $userId, PDO::PARAM_INT);
    $this->_req->execute();

    $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
    return $datas;
  }

  public function updateUser(int $user_id, array $datas)
  {

    // if (isset($datas['skillupd']) && !in_array($datas['skillupd'], ['PHP', 'JavaScript', 'Python'])) {
    //   $_SESSION['error'] = throw new Exception("Veuillez sélectionner un rôle valide (Entreprise ou Etudiant).");
    // }

    // if (!filter_var($datas['emailUpd'], FILTER_VALIDATE_EMAIL)) {
    //   $_SESSION['error'] = throw new Exception("Format d'email invalide.");
    // }

    try {
      $sql = "UPDATE _user SET use_city = :city WHERE use_id = :id";
      $this->_req = $this->getDb()->prepare($sql);
      $this->_req->bindValue(':id', $user_id, PDO::PARAM_INT);
      $this->_req->bindValue(':city', $datas['cityUpd'], PDO::PARAM_STR);
      $this->_req->execute();
      // if(!isset($datas['nameUpd']) || empty($datas['nameUpd'])){
      // }
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function createOffer(int $user_id, array $datas) {
    if (!isset($datas['nameOffre']) || empty($datas['nameOffre'])){
      throw new Exception("Veuillez entrer un nom");
    }

    if(!isset($datas['salaireOffre']) || empty($datas['salaireOffre'])){
      throw new Exception("Veuillez entrer un salaire");
    }

    if(!isset($datas['cityOffre']) || empty(['cityOffre'])){
      throw new Exception("Veuillez entrer une ville");
    }

    if(!isset($datas['descOffre']) || empty(['descOffre'])){
      throw new Exception("Veuillez entrer une ville");
    }

    if (!isset($datas['skillOffre']) || !in_array($datas['skillOffre'], ['PHP', 'JavaScript', 'Python'])) {
      throw new Exception("Veuillez sélectionner un rôle valide.");
    }

    try {
      $sql = "INSERT INTO joboffer VALUES(DEFAULT, :title, :describe, :salary, 1, :skill, :id, :city)";
      $this->_req = $this->getDb()->prepare($sql);
      $this->_req->bindValue(':id', $user_id, PDO::PARAM_INT);
      $this->_req->bindValue(':title', $datas['nameOffre'], PDO::PARAM_STR);
      $this->_req->bindValue(':describe', $datas['descOffre'], PDO::PARAM_STR);
      $this->_req->bindValue(':salary', $datas['salaireOffre'], PDO::PARAM_STR);
      $this->_req->bindValue(':skill', $datas['skillOffre'], PDO::PARAM_STR);
      $this->_req->bindValue(':city', $datas['cityOffre'], PDO::PARAM_STR);
      $this->_req->execute();
      // if(!isset($datas['nameUpd']) || empty($datas['nameUpd'])){
      // }
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
}
