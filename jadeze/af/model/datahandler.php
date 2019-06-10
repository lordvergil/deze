<?php
/**
 *
 */
class dataHandler{

  function __construct($servername,$dbname,$username,$password)
  {
    try {
      $this->conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
      return $this->conn;
    } catch (PDOException $e) {
      echo "Connection failed! " . $e->getMessage();
    }

  }

  function Add($sql){
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

  }
}


 ?>
