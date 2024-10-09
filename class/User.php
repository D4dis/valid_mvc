<?php

class User extends CoreEntity
{
  private $_id;
  private $_nom;
  private $_i_mail;
  private $_mdp;
  private $_skills;
  private $_role;
  private $_permissions;

  public function getId()
  {
    return $this->_id;
  }

  public function getNom()
  {
    return $this->_nom;
  }

  public function getIMail()
  {
    return $this->_i_mail;
  }

  public function getMdp()
  {
    return $this->_mdp;
  }

  public function getSkills()
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

  public function setId($_id): void
  {
    $this->_id = $_id;
  }

  public function setNom($_nom): void
  {
    $this->_nom = $_nom;
  }

  public function setIMail($_i_mail): void
  {
    $this->_i_mail = $_i_mail;
  }

  public function setMdp($_mdp): void
  {
    $this->_mdp = $_mdp;
  }

  public function setSkills($_skills): void
  {
    $this->_skills = $_skills;
  }

  public function setRole($_role): void
  {
    $this->_role = $_role;
  }

  public function setPermissions($_permissions): void
  {
    $this->_permissions = $_permissions;
  }
}
