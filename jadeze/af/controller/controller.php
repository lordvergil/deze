<?php
require_once "model/logic.php";

class tennisController
{

  function __construct()
  {
    $this->logic = new logic();
  }

  public function handleRequest () {
      try {
          switch ($_GET['op']){
            case "test": $this->test();
            break;
            case 'update':$this->update();
            break;
            case 'insert': $this->InsertXml();
            break;
            default: $this->test();
          }
      } catch (Exception $e) {
          throw $e;
      }
  }

public function InsertXml(){
  require 'view/import.php';
  if (isset($_POST['buttonImport'])) {
    copy($_FILES['xmlFile'] ['tmp_name'],
     'view/data/'.$_FILES['xmlFile'] ['name']);
     require 'view/xml.class.php';
     $xml = simplexml_load_file('view/data/'.$_FILES['xmlFile'] ['name']);
     foreach($xml->mboopen->scholen as $school) {
       $ID = $school->ID;
       $Naam = $school->Naam;
       $school = $this->logic->AddSchool($ID, $Naam);
     }
  }
}

//
// public function InsertXml(){
//   if (isset($_POST['buttonImport'])) {
//     copy($_FILES['xmlFile'] ['tmp_name'],
//      'data/'.$_FILES['xmlFile'] ['name']);
//      require 'xml.class.php';
//      $xml = simplexml_load_file('data/'.$_FILES['xmlFile'] ['name']);
//      foreach($scholen->mboopen->scholen as $school) {
//        $ID = $school->ID;
//        $Naam = $scholen->Naam;
//        echo "$ID";
//        echo "$Naam";
//      }
//   }
// }





  public function CollectSchool(){

      $id = $_GET['id'];
      $school = $this->productLogic->ReadPerProduct($id);
      $school = implode(" ",$school);
      include 'view/update.php';

  }


  public function test() {
  	echo "";
    include 'view/home.php';
  }
  public function update() {
    include 'view/update.php';
            if (isset($_POST["update"])){

                $UpdateID = $_POST["UpdateID"];
                $UpdateSchool = $_POST["UpdateSchool"];


                $id = $_GET["id"];
                $school = $this->logic->UpdateSchool($UpdateID, $UpdateSchool, $id);

                echo "Succes";

            }else{

                $id = $_GET["id"];
                $product = $this->logic->ReadPerProduct($id);
                include 'view/update.php';


            }
  }
}
?>
