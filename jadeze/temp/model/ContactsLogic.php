<?php
require_once 'model/DataHandler.php';

class ContactsLogic {

	public function __construct() {
		$this->DataHandler = new Datahandler('localhost','mysql' ,'test' ,'root' ,'geheim');
	}

	function __construct($servername,$dbname,$username,$password)
	{
		try {
			$this->conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
			return $this->conn;
		} catch (PDOException $e) {
			echo "Connection failed! " . $e->getMessage();
		}

	}


	public function readProduct($id) {
		 try {
			 $sql = "SELECT * FROM `product_list` WHERE `product_id` = '$id'";
			 $stmt = $this->DataHandler->ReadData($sql);
			 return $stmt;

		 }catch (Exception $e) {
			 throw $e;
		 }
	 }
	public function readProducts() {
		try {
			$sql = "SELECT * FROM `product_list`";
			$stmt = $this->DataHandler->ReadAllData($sql);
			return $stmt;

		} catch (Exception $e) {
			throw $e;
		}
	}


	public function displayTable(){
	    $arr = $this->readProducts();
	    $html = "<table border=1;'>";

	    foreach($arr as $key=>$value){
	        $html .= "<thead><tr>";
	        foreach($value as $k=>$v){
	            $html .="<th>" .$k. "</th>";
	        }
	        $html .= "<th>Action</th>";
	        break;
	    }
	    foreach($arr as $k=>$v){
	        $html .= "<tr>";
	        foreach($v as $k=>$value){
	            $html .= "<td>" .$value. "</td>";
	        }
	    $id = $v["product_id"];
	    $html .= "<td> <a class='fas fa-book-open' href='index.php?op=read&id=$id' >Read</a><a class='fas fa-wrench' href='index.php?op=update&id=$id'>Update</a><a class='fas fa-eraser' href='index.php?op=delete&id=$id' >Delete</a> </td>";
	    }
	    $html .= "</table>";
	    return $html;
	}





}
