<?php

class Offer extends CoreEntity
{

  private $_id;
  private $_title;
  private $_describe;
  private $_salary;
  private $_status;
  private $_requirement;
  private $_city;
  private $_id_fk;

  public function getId()
  {
    return $this->_id;
  }

  public function getTitle()
  {
    return $this->_title;
  }

  public function getDescribe()
  {
    return $this->_describe;
  }

  public function getSalary()
  {
    return $this->_salary;
  }

  public function getStatus()
  {
    return $this->_status;
  }

  public function getRequirement()
  {
    return $this->_requirement;
  }

  public function getCity()
  {
    return $this->_city;
  }

  public function getIdFk()
  {
    return $this->_id_fk;
  }

  public function setId($_id): void
  {
    $this->_id = $_id;
  }

  public function setTitle($_title): void
  {
    $this->_title = $_title;
  }

  public function setDescribe($_describe): void
  {
    $this->_describe = $_describe;
  }

  public function setSalary($_salary): void
  {
    $this->_salary = $_salary;
  }

  public function setStatus($_status): void
  {
    $this->_status = $_status;
  }

  public function setRequirement($_requirement): void
  {
    $this->_requirement = $_requirement;
  }

  public function setCity($_city): void
  {
    $this->_city = $_city;
  }

  public function setIdFk($_id_fk): void
  {
    $this->_id_fk = $_id_fk;
  }
}
