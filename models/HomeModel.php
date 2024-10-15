<?php 

class HomeModel extends CoreModel {

  private $_req;

  public function __destruct()
  {
    if (!empty($this->_req)) {
      $this->_req->closeCursor();
    }
  }

  public function index() {
    $sql = "SELECT job_id, job_title, job_describe, job_salary, job_status, job_requirement, job_city, use_id use_id_fk, use_name FROM joboffer JOIN _user ON use_id_fk = use_id";

    try{
      $this->_req = $this->getDb()->prepare($sql);
      $this->_req->execute();
      $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
      return $datas;
    } catch(PDOException $e) {
      $e->getMessage();
    }
  }

}