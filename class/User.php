<?php

class User extends CoreEntity
{
  private $_id;
  private $_name;
  private $_login;
  private $_city;
  private $_zipcode;
  private $_siret;
  private $_company;
  private $_password;
  private $_skills;
  private $_role;
  private $_permissions;


  public function __construct(array $data = [])
  {
    $this->hydrate($data);
  }

  public function hydrate(array $data)
  {
    foreach ($data as $key => $value) {
      $method = 'set' . ucfirst(str_replace('use_', '', $key));
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  public function getId()
  {
    return $this->_id;
  }

  public function getNom()
  {
    return $this->_name;
  }

  public function getLogin()
  {
    return $this->_login;
  }

  public function getCity()
  {
    return $this->_city;
  }

  public function getZipcode()
  {
    return $this->_zipcode;
  }

  public function getSiret()
  {
    return $this->_siret;
  }

  public function getCompany()
  {
    return $this->_company;
  }

  public function getMdp()
  {
    return $this->_password;
  }

  public function getSkill()
  {
    return $this->_skills;
  }

  public function getRole()
  {
    return $this->_role;
  }

  public function getPermissions()
  {
    return $this->_permissions;
  }

  public function setId($id): void
  {
    $this->_id = $id;
  }

  public function setName($name): void
  {
    $this->_name = $name;
  }

  public function setLogin($login): void
  {
    $this->_login = $login;
  }

  public function setPassword($password): void
  {
    $this->_password = $password;
  }

  public function setCity($city): void
  {
    $this->_city = $city;
  }

  public function setZipcode($zipcode): void
  {
    $this->_zipcode = $zipcode;
  }

  public function setSiret($siret): void
  {
    $this->_siret = $siret;
  }

  public function setCompany($company): void
  {
    $this->_company = $company;
  }

  public function setSkills($skills): void
  {
    $this->_skills = $skills;
  }

  public function setRol_id($rol_id): void
  {
    $this->_role = $rol_id;
  }

  public function setPermissions($_permissions): void
  {
    $this->_permissions = $_permissions;
  }

  // Ajoutez cette méthode pour le débogage
  public function debug()
  {
    return [
      'id' => $this->_id,
      'name' => $this->_name,
      'login' => $this->_login,
      'city' => $this->_city,
      'zipcode' => $this->_zipcode,
      'siret' => $this->_siret,
      'company' => $this->_company,
      'skills' => $this->_skills,
      'role' => $this->_role
    ];
  }
}
