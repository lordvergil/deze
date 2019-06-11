<?php
require_once 'DataHandler.php';


class productLogic {


    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "asghar", "A12345", "stardunk_db");
    }


    public function __destruct() {

    }


    public function CreateProduct($product_type_code, $supplier_id, $product_price, $product_name, $other_product_datiles){

        try{


            $sql = "INSERT INTO `stardunk_db`.`product` (`product_type_code`, `supplier_id`, `product_price`, `product_name`, `other_product_datiles`) VALUES ('$product_type_code', '$supplier_id', '$product_price', '$product_name', '$other_product_datiles');";

            $stmt = $this->DataHandler->Create($sql);


        }catch (Exception $e){
            throw $e;
        }

//        return $stmt;
    }



    public function ReadProduct($id){

    $sql = "SELECT * FROM `stardunk_db`.`product` WHERE product_id = '$id'";
    $stmt = $this->DataHandler->ReadData($sql);
    return $stmt;


    }



    public function ReadAllProduct(){

        try{

            $sql = "SELECT * FROM `stardunk_db`.`product`";
            $stmt = $this->DataHandler->ReadAllData($sql);
            return $stmt;

        }catch (Exception $e){
            throw $e;
        }

    }




    public function DisplayProductTabel(){

        $arr = $this->ReadAllProduct();

        $html = "<table border= 1 ;'>";

        foreach ($arr as $key =>$value){

            $html .= "<thead><tr>";

            foreach ($value as $k => $v){

                $html .= "<th>" . $k . "</th>";
            }

            $html .= "<th>Action</th>";
            break;
        }


        foreach ($arr as $k => $v){

            $html .= "<tr>";

            foreach ($v as $key => $value){

                $html .= "<td>" . $value ."</td>";

            }
            $id = $v["product_id"];
            $html .= "<td> <a href='index.php?op=read&id=$id' >Read</a><a href='index.php?op=update&id=$id'>Update</a><a href='index.php?op=delete&id=$id' >Delete</a> </td>";

        }

        $html .= "</table>";
        return $html;

    }

    public function UpdateProduct($product_type_code, $supplier_id, $product_price, $product_name, $other_product_datiles, $id){


        try{

            $sql = " UPDATE `product`
      SET product_type_code='$product_type_code',
        supplier_id='$supplier_id',
        product_price='$product_price',
        product_name='$product_name',
        other_product_datiles='$other_product_datiles'
      WHERE product_id='$id'";

            $stmt = $this->DataHandler->Update($sql);
            return $stmt;
        }catch (Exception $e){
            throw $e;
        }
    }
    public function DeleteProduct($id){

        $sql = "DELETE FROM `stardunk_db`.`product` WHERE product_id = '$id'";
        $stmt = $this->DataHandler->Delete($sql);
        return $stmt;

    }
}
?>