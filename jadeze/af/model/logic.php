<?php
require_once "datahandler.php";

class logic
{

  function __construct()
  {
    $this->dataHandler = new dataHandler("localhost","mboopen","root","");
  }

  public function AddSchool($ID, $Naam){


      try{

          $sql = "INSERT INTO `mboopen`.`scholen` (`SID`, `Naam`) VALUES ('$ID', '$Naam');";

          $stmt = $this->dataHandler->Add($sql);

      }catch (Exception $e){
          throw $e;
      }
  }


}






 ?>
