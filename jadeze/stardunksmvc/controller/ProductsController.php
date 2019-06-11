<?php
require_once 'model/ProductsLogic.php';

class ProductsController {
    public function __construct(){
        $this->ProductsLogic = new ProductsLogic();
}

public function __destruct() {}
public function handleRequest () {
    try {
        switch ($_GET['op']){
            case "create": $this->CollectCreateProduct();
            break;
            case "read": $this->CollectReadProduct();
            break;
            case "readall": $this->CollectDisplayTable();
            break;
            case "update": $this->CollectUpdateProduct();
            break;
            case "delete": $this->CollectDeleteProduct();
			break;
            default: $this->CollectDisplayTable();
        }
    } catch (Exception $e) {
        throw $e;
    }
}

 public function collectCreateProduct() {

	 if (isset($_POST["submit"])){
		 $type_code = $_POST["type_code"];
		 $supplier_id = $_POST["supplier_id"];
		 $price = $_POST["price"];
		 $name = $_POST["name"];
		 $details = $_POST["details"];

	$products = $this->ProductsLogic->createProduct($type_code, $supplier_id, $price, $name, $details);
	header('Location: index.php?op=readall');
 } else {
	 include 'view/createForm.php';
 };
 }
public function collectReadProduct() {
    $id = $_GET['id'];
	$products = $this->ProductsLogic->readProduct($id);
	$products = implode(" ", $products);

    include 'view/products.php';
}
public function collectReadProducts() {
    $products = $this->ProductsLogic->readProducts();
    include 'view/products.php';
}

public function collectUpdateProduct() {
    $id = $_GET['id'];
    include 'view/updateForm.php';
	  $selectBox = $this->ProductsLogic->createSelect($id);
}
public function collectDeleteProduct() {
    $id = $_GET['id'];
    $products = $this->ProductsLogic->deleteProduct($id);
    $products = [$products];
    include 'view/products.php';
 }
public function collectDisplayTable(){
    $products = $this->ProductsLogic->displayTable();
    include 'view/products.php';
}

 }
?>
