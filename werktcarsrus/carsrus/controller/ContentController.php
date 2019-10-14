<?php
require_once 'model/ContentLogic.php';

class ContentController {
    public function __construct(){
        $this->ContentLogic = new ContentLogic();
}

public function __destruct() {}
public function handleRequest () {
    try {
        switch ($_GET['op']){
          case "home": $this->CollectWelcome();
          break;
          case "createklant": $this->CollectCreateKlant();
          break;
          case "createapk": $this->CollectCreateApk();
          break;
          case "read": $this->CollectRead();
          break;
          case "updateklant": $this->CollectUpdateKlant();
          break;
          case "deleteklant": $this->CollectDeleteKlant();
          break;
          case "deleteapk": $this->CollectDeleteApk();
          break;
          default: $this->CollectRead();
        }
    } catch (Exception $e) {
        throw $e;
    }
}

public function CollectWelcome(){
  $content = $this->ContentLogic->Welcome();
  include 'view/content.php';
}

public function CollectCreateKlant(){

if (isset($_POST["submit"])){
  $voornaam = $_POST["voornaam"];
  $tussenvoegsel = $_POST["tussenvoegsel"];
  $achternaam = $_POST["achternaam"];
  $plaats = $_POST["plaats"];
  $straat = $_POST["straat"];
  $huisnummer = $_POST["huisnummer"];
  $postcode = $_POST["postcode"];

$content = $this->ContentLogic->createKlant($voornaam, $tussenvoegsel, $achternaam, $plaats, $straat, $huisnummer, $postcode);
header('Location: index.php?op=readall');
} else {
include 'view/createKlant.php';
};
}
//   $content = $this->ContentLogic->createKlant();
//   include 'view/content.php';
// }

public function CollectCreateApk(){
  if (isset($_POST["submit"])){
    $klantid = $_POST["klantid"];
    $kenteken = $_POST["kenteken"];
    $apkdatum = $_POST["apkdatum"];

  $content = $this->ContentLogic->createApk($klantid, $kenteken, $apkdatum);
  header('Location: index.php?op=readall');
  } else {
  include 'view/createApk.php';
  };
}

public function CollectRead(){
  $content = $this->ContentLogic->readKlant() . $this->ContentLogic->readApk() . $this->ContentLogic->readCount();
  include 'view/content.php';
}

public function CollectUpdateKlant(){
  include 'view/updateKlant.php';
  $content = $this->ContentLogic->updateKlant();
}

public function CollectDeleteKlant(){
  if (isset($_POST["submit"])) {
		$id = $_POST["id"];
  $content = $this->ContentLogic->deleteKlant($id);
  header('Location: index.php?op=readall');
}else{
  include 'view/deleteKlant.php';
};
}

public function CollectDeleteApk(){
  include 'view/deleteApk.php';
  if (isset($_POST["submit"])) {
		$id = $_POST["id"];
  $content = $this->ContentLogic->deleteApk($id);
}else{};
}

 }
?>
