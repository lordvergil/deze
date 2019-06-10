<?php

require_once 'model/productLogic.php';


class productController{

    public function __construct() {

        $this->productLogic = new productLogic();

    }


    public function __destruct() {

    }


    public function handleRequest () {


        try {



            switch ($_GET['op']) {


                case "producten":

                    $this->CollectDisplayProducten();
                    break;


                case "home-producten":

                    $this->CollectDisplayHomeProducten();
                    break;

                case "details":

                   $this->CollectDisplayProductDetails();
                    break;

                case "admin":
                    $this->CollectDisplayInTable();
                    break;

                case "admin_create":

                    $this->CollectCreateProduct();
                    break;

                case "admin_update":
                    $this->CollectUpdateProduct();
                    break;

                case "admin_delete":
                    $this->CollectDeleteProduct();
                    break;

                case "search":
                    $this->CollectDisplaySearchResult();
                    break;
                    
                case "cart":
                    $this->CollectDisplayCart();

                default:
                    $this->CollectDisplayHomeProducten();


            }

        }
        catch (Exception $e) {
            throw $e;
        }

    }




    /*CollectCreateProduct() pakt ingevulde gegevens
        vanuit createform met behulp van $_POST method
         en stuurd allemaal naar productLogic->CreateProduct(...)*/

    public function CollectCreateProduct() {


        if (isset($_POST["create"])){

            $target = basename($_FILES['foto']['name']);
            $tmpname = $_FILES['foto']['tmp_name'];
            $folder_dir = "view/images/".$target;
            move_uploaded_file($tmpname, $folder_dir);
            $naam = $_POST["naam"];
            $prijs = $_POST["prijs"];
            $geschikt = $_POST["geschikt"];
            $specificaties = $_POST["specificaties"];
            $foto = $folder_dir;
            $aanbieding = $_POST["aanbieding"];
            $product = $this->productLogic->CreateProduct($naam, $prijs, $geschikt, $specificaties, $foto, $aanbieding);

            header('Location: http://localhost/test/index.php?op=admin');

        }else{

            include "view/admin_create.php";

        }

    }




    /* CollectUpdateProduct() met behulp van $_POST method
        pakt ingevulde gegevens vanuit Update Form en
        stuurd allemaal naar UpdateProduct() */

    public function CollectUpdateProduct(){


        if (isset($_POST["update"])){

            $UpdateNaam = $_POST["UpdateNaam"];
            $UpdatePrijs = $_POST["UpdatePrijs"];
            $UpdateGeschikt = $_POST["UpdateGeschikt"];
            $UpdateAanbieding = $_POST["UpdateAanbieding"];
            $UpdateSpecificaties = $_POST["UpdateSpecificaties"];


            $id = $_GET["id"];
            $product = $this->productLogic->UpdateProduct($UpdateNaam, $UpdatePrijs, $UpdateGeschikt, $UpdateAanbieding, $UpdateSpecificaties, $id);

            header('Location: http://localhost/test/index.php?op=admin');

        }else{

            $id = $_GET["id"];
            $product = $this->productLogic->ReadPerProduct($id);
            include 'view/admin_update.php';


        }

    }




    /*CollectDeleteProduct() stuurt een delete verzoek
         van gebruiker naar Deletes Per Product($id)
         om een specifiek product verwijderen*/

    public function CollectDeleteProduct(){

        $id = $_GET['id'];
        $product = $this->productLogic->DeletePerProduct($id);
        include 'view/product.php';
        header('Location: http://localhost/test/index.php?op=admin');

    }


    /*CollectDisplaySearchResult() Geeft de text door via $name om uiteindelijk alle producten te laten zien die de letters en/of woorden bevat die in de text staan*/

    public function CollectDisplaySearchResult(){

        if (isset($_POST["name"])){
            $name = $_POST['name'];
            $product = $this->productLogic->DisplaySearchProduct($name);
            include 'view/product.php';

        }else{
            echo "Error: zoek Probleem.";
            include "view/product.php";
        }


    }



    /* CollectHomeProducten() stuurt lees
        verzoek vanuit gebruikers
        naar product Logic->Home Producten()*/

    public function CollectHomeProducten() {

        $product = $this->productLogic->HomeProducten();
        include "view/product.php";

        $product = implode(" ",$product);


    }




    /* CollectDisplayHomeProducten() stuurt
        Display verzoek vanuit gebruikers
        naar product Logic->Display HomeProduct()*/

    public function CollectDisplayHomeProducten(){

        $product = $this->productLogic->DisplayHomeProduct();

        include 'view/product.php';

    }




    /* CollectReadAllProduct() stuurt een verzoek
        lees alle producten vanuit gebruikers
        naar product Logic->Display HomeProduct()*/

    public function CollectReadAllProduct(){

        $product = $this->productLogic->ReadAllProduct();

        include 'view/product.php';

    }




    /* CollectDisplayProducten() stuurt
        Display verzoek vanuit gebruikers
        naar product Logic->ReadAllProduct()*/

    public function CollectDisplayProducten(){

        $product = $this->productLogic->DisplayProducten();

        include 'view/product.php';

    }




    /* CollectReadPerProduct() stuurt een specifiek product
            lees verzoek vanuit gebruikers
            naar product Logic->ReadPerProduct($id)*/

    public function CollectReadPerProduct(){

        $id = $_GET['id'];
        $product = $this->productLogic->ReadPerProduct($id);
        $product = implode(" ",$product);
        include 'view/product.php';

    }




    /* CollectDisplayProductDetails stuurt
          Display verzoek vanuit gebruikers
          naar product Logic->DisplayProductDetails($id)
          om meerdere gegevens van een specifiek product te zien*/

    public function CollectDisplayProductDetails(){
        $id = $_GET['id'];
        $product = $this->productLogic->DisplayProductDetails($id);
        include 'view/product.php';

    }



    /* CollectDisplayTable() stuurt Display verzoek
         vanuit gebruikers naar product Logic->DisplayTable()
         om alle producten van uit database lezen en in
         een tabel uit printen
    */

    public function CollectDisplayInTable(){
        $product = $this->productLogic->DisplayInTable();
        $title = 
        include 'View/product.php';

    }

    public function CollectDisplayCart(){
        include 'view/product.php';
    }

}



?>
