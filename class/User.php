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
  private $_id_fk;
  private $_permissions;

  public function getId()
  {
    return $this->_id;
  }

  public function getName()
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

  public function getPassword()
  {
    return $this->_password;
  }

  public function getSkills()
  {
    return $this->_skills;
  }

  public function getIdFk()
  {
    return $this->_id_fk;
  }

  public function getPermissions()
  {
    return $this->_permissions;
  }

  public function setId($_id): void
  {
    $this->_id = $_id;
  }

  public function setName($_name): void
  {
    $this->_name = $_name;
  }

  public function setLogin($_login): void
  {
    $this->_login = $_login;
  }

  public function setCity($_city): void
  {
    $this->_city = $_city;
  }

  public function setZipcode($_zipcode): void
  {
    $this->_zipcode = $_zipcode;
  }

  public function setSiret($_siret): void
  {
    $this->_siret = $_siret;
  }

  public function setCompany($_company): void
  {
    $this->_company = $_company;
  }

  public function setPassword($_password): void
  {
    $this->_password = $_password;
  }

  public function setSkills($_skills): void
  {
    $this->_skills = $_skills;
  }

  public function setId_Fk($_id_fk): void
  {
    $this->_id_fk = $_id_fk;
  }

  public function setPermissions($_permissions): void
  {
    $this->_permissions = $_permissions;
  }
}
