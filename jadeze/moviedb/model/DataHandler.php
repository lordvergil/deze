<?php
class DataHandler{

    function __CONSTRUCT($servername, $dbname, $username, $password){
        try {
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "Connected successfully";
        return $this->conn;
        }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            };
    }

    function readall($sql){
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

}
?>
