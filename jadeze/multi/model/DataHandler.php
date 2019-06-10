<?php
class DataHandler
{
    public $conn;

    /* connectie naar database */
    function __construct($servername, $username, $password, $database_naam)
    {


        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$database_naam", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //        echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }



    function Create($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

    }


    function Update($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }


    function Delete($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }



    function Search($sql){

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }



    function ReadAllData($sql){


        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }



    function ReadHomeProduct($sql) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }



    function ReadDataDetails($sql){

        //Via $this->conn kan je de PDO connection var ophalen uit de construct method
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;

    }


}


?>