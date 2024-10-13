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

  public function register(array $data)
  {
    if (!isset($data['role']) || !in_array($data['role'], ['3', '2'])) {
      throw new Exception("Veuillez sélectionner un rôle valide (Entreprise ou Etudiant).");
    }

    if ($data['pwdSignUp'] !== $data['ConfpwdSignUp']) {
      throw new Exception("Les mots de passe ne correspondent pas.");
    }

    if (!filter_var($data['emailSignUp'], FILTER_VALIDATE_EMAIL)) {
      throw new Exception("Format d'email invalide.");
    }

    $name = strtolower($data['nameSignUp']);
    $email = strtolower($data['emailSignUp']);
    $role = $data['role'];

    $hashedPassword = password_hash($data['pwdSignUp'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO _user (use_name, use_login, use_password, rol_id) VALUES (:name, :mail, :mdp, :role)";
    $this->_req = $this->getDb()->prepare($sql);
    $this->_req->bindValue(':name', $name, PDO::PARAM_STR);
    $this->_req->bindValue(':mail', $email, PDO::PARAM_STR);
    $this->_req->bindValue(':mdp', $hashedPassword, PDO::PARAM_STR);
    $this->_req->bindValue(':role', $role, PDO::PARAM_INT);

    if (!$this->_req->execute()) {
      throw new Exception("Erreur lors de l'enregistrement de l'utilisateur.");
    }
  }

  public function getUserByEmail($email)
  {
    $sql = "SELECT * FROM _user WHERE use_login = :email";
    $this->_req = $this->getDb()->prepare($sql);
    $this->_req->bindValue(':email', strtolower($email), PDO::PARAM_STR);
    $this->_req->execute();

    return $this->_req->fetch(PDO::FETCH_ASSOC);
  }

  public function getUserById($userId)
  {
    $sql = "SELECT * FROM _user WHERE use_id = :id";
    $this->_req = $this->getDb()->prepare($sql);
    $this->_req->bindValue(':id', $userId, PDO::PARAM_INT);
    $this->_req->execute();

    $userData = $this->_req->fetch(PDO::FETCH_ASSOC);
    if ($userData) {
        return new User($userData);
    }
    return null;
  }
}
