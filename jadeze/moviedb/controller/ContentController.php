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
          case "home": $this->CollectWelkom();
          break;
          case "11": $this->Collect11();
          break;
          case "12": $this->Collect12();
          break;
          case "13": $this->Collect13();
          break;
          case "14": $this->Collect14();
          break;
          case "15": $this->Collect15();
          break;
          case "16": $this->Collect16();
          break;
          case "17": $this->Collect17();
          break;
          case "18": $this->Collect18();
          break;
          case "19": $this->Collect19();
          break;
          case "20": $this->Collect20();
          break;
          case "21": $this->Collect21();
          break;
          case "22": $this->Collect22();
          break;
          case "23": $this->Collect23();
          break;
          case "24": $this->Collect24();
          break;
          default: $this->CollectWelcome();
        }
    } catch (Exception $e) {
        throw $e;
    }
}
public function CollectWelcome(){
  $content = $this->ContentLogic->Welcome();
  include 'view/content.php';
}
public function Collect11(){
  $content = $this->ContentLogic->show11();
  include 'view/content.php';
}
public function Collect12(){
  $content = $this->ContentLogic->show12();
  include 'view/content.php';
}
public function Collect13(){
  $content = $this->ContentLogic->show13();
  include 'view/content.php';
}
public function Collect14(){
  $content = $this->ContentLogic->show14();
  include 'view/content.php';
}
public function Collect15(){
  $content = $this->ContentLogic->show15();
  include 'view/content.php';
}
public function Collect16(){
  $content = $this->ContentLogic->show16();
  include 'view/content.php';
}
public function Collect17(){
  $content = $this->ContentLogic->show17();
  include 'view/content.php';
}
public function Collect18(){
  $content = $this->ContentLogic->show18();
  include 'view/content.php';
}
public function Collect19(){
  $content = $this->ContentLogic->show19();
  include 'view/content.php';
}
public function Collect20(){
  $content = $this->ContentLogic->show20();
  include 'view/content.php';
}
public function Collect21(){
  $content = $this->ContentLogic->show21();
  include 'view/content.php';
}
public function Collect22(){
  $content = $this->ContentLogic->show22();
  include 'view/content.php';
}
public function Collect23(){
  $content = $this->ContentLogic->show23();
  include 'view/content.php';
}
public function Collect24(){
  $content = $this->ContentLogic->show24();
  include 'view/content.php';
}

 }
?>
