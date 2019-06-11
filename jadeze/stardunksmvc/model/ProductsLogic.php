<?php
require_once 'DataHandler.php';

class ProductsLogic {

public function __construct() {
	$this->DataHandler = new Datahandler("localhost","stardunks_db" ,"root", "");
}

public function __destruct() {}

 public function createProduct($type_code, $supplier_id, $price, $name, $details) {
	 try{
		 $sql = "INSERT INTO `stardunks_db` . `product_list`(`product_type_code`, `supplier_id`, `product_price`, `product_name`, `other_product_details`) VALUES ('$type_code','$supplier_id','$price','$name','$details')";
		 $stmt = $this->DataHandler->CreateData($sql);
		 //die("test");
		 return $stmt;

	 }catch (Exception $e) {
		 throw $e;
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
public function deleteProduct($id) {
	try {
		$sql = "DELETE FROM `product_list` WHERE `product_id` = '$id'";
		$stmt = $this->DataHandler->DeleteData($sql);
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
?>
