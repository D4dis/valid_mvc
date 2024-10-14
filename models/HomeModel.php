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
    $sql = "SELECT * FROM joboffer";

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