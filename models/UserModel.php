<?php

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
    // Vérification de la présence et de la validité du rôle
    if (!isset($data['role']) || !in_array($data['role'], ['entreprise', 'etudiant'])) {
      throw new Exception("Veuillez sélectionner un rôle valide (Entreprise ou Etudiant).");
    }

    // Vérification du mot de passe
    if ($data['pwdSignUp'] !== $data['ConfpwdSignUp']) {
      throw new Exception("Les mots de passe ne correspondent pas.");
    }

    // Vérification du format de l'email
    if (!filter_var($data['emailSignUp'], FILTER_VALIDATE_EMAIL)) {
      throw new Exception("Format d'email invalide.");
    }

    // Conversion en minuscules
    $name = strtolower($data['nameSignUp']);
    $email = strtolower($data['emailSignUp']);
    $role = strtolower($data['role']);

    // Hachage du mot de passe (reste inchangé)
    $hashedPassword = password_hash($data['pwdSignUp'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (u_nom, u_mail, u_mdp, u_role) VALUES (:name, :mail, :mdp, :role)";
    $this->_req = $this->getDb()->prepare($sql);
    $this->_req->bindValue(':name', $name, PDO::PARAM_STR);
    $this->_req->bindValue(':mail', $email, PDO::PARAM_STR);
    $this->_req->bindValue(':mdp', $hashedPassword, PDO::PARAM_STR);
    $this->_req->bindValue(':role', $role, PDO::PARAM_STR);

    // Exécution de la requête
    if (!$this->_req->execute()) {
      throw new Exception("Erreur lors de l'enregistrement de l'utilisateur.");
    }
  }

  public function getUserByEmail($email)
  {
    $sql = "SELECT * FROM user WHERE u_mail = :email";
    $this->_req = $this->getDb()->prepare($sql);
    $this->_req->bindValue(':email', strtolower($email), PDO::PARAM_STR);
    $this->_req->execute();
    
    return $this->_req->fetch(PDO::FETCH_ASSOC);
  }

}
