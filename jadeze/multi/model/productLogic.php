<?php
require_once 'DataHandler.php';


class productLogic {


    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "root", "", "vr_brillen");
    }



    public function __destruct() {

    }



    /* via onderstaande method, neem ik alle parameter
        van CollectCreateProduct() mee
        en insert in database */
    public function CreateProduct($naam, $prijs, $geschikt,$specificaties, $foto, $aanbieding){


        try{

            $sql = "INSERT INTO `vr_brillen`.`producten` (`naam`, `prijs`, `geschikt`, `specificaties`, `foto`,`aanbieding`) VALUES ('$naam', '$prijs', '$geschikt', '$specificaties', '$foto', '$aanbieding');";

            $stmt = $this->DataHandler->Create($sql);

        }catch (Exception $e){
            throw $e;
        }
    }




    /*via onderstaande method, neem ik alle parameter
        van Updateform mee en nieuwe wijzigen
        in database toevoegen, */

    public function UpdateProduct($UpdateNaam, $UpdatePrijs, $UpdateGeschikt, $UpdateAanbieding, $UpdateSpecificaties, $id){


        try{

            $sql =" UPDATE `producten`
      SET naam='$UpdateNaam',
        prijs='$UpdatePrijs',
        geschikt='$UpdateGeschikt',
        aanbieding='$UpdateAanbieding',
        specificaties='$UpdateSpecificaties'
      WHERE id='$id'";


            $stmt = $this->DataHandler->Update($sql);
            return $stmt;

        }catch (Exception $e){
            throw $e;
        }

    }




    /* onderstaande method verwijderd
        een product met specifiek id van uit database*/

    public function DeletePerProduct($id){

        $sql = "DELETE FROM `vr_brillen`.`producten` WHERE id = $id";
        $stmt = $this->DataHandler->Delete($sql);
        return $stmt;
    }



    /*De query om de producten op te halen uit de database die voldoen aan wat er in de doorgegeven text staat*/
    public function DisplaySearchResult($name){

        $sql = "SELECT * FROM `vr_brillen`.`producten` WHERE naam LIKE \"%$name%\"";
        $stmt = $this->DataHandler->Search($sql);
        return $stmt;
    }
    /*Geeft het resultaat van DisplaySearchResult() correct weer*/
    public function DisplaySearchProduct($name){


        $array = $this->DisplaySearchResult($name);

        $html = "<div class='row'>";

        foreach ($array as $k => $v){


            $html .= "<div class='col-4' id='cardbody'>";
            $html .= "<div class='card' style='width: 18rem;'>";

            $naam = $v["naam"];
            $image = $v["foto"];
            $prijs = $v["prijs"];
            $id = $v["id"];
            $html .= "<a href='index.php?op=details&id=$id'><img class='card-img-top' src='$image' alt='Card image cap' ><a/>";


            $html .= "<div class='card-body'>";

            $html .= "<ul class='list-group list-group-flush'>";
            $html .= "<li class='list-group-item'><a href='index.php?op=details&id=$id'> <h5 class='card-title'>$naam</h5></a></li>";

            $html .= "<li class='list-group-item'><p class='card-text'>€ $prijs</p></li>";

            $html .= "<li class='list-group-item'><a href='index.php?op=details&id=$id' class='btn btn-primary'>Details</a><a id='bestel'href='#' class='btn btn-primary'>Bestellen <i class='fa fa-cart-plus'></i></a></li>";

            $html .= "</ul>";
            $html .="</div>";
            $html .= "</div>";
            $html .= "</div>";
        }

        $html .= "</div>";
        return $html;


    }




    /* Read All Product() method leest alle
        producten gegevens vanuit database */

    public function ReadAllProduct(){


        try{

            $sql = "SELECT * FROM `vr_brillen`.`producten`";
            $stmt = $this->DataHandler->ReadAllData($sql);
            return $stmt;

        }catch (Exception $e){
            throw $e;
        }

    }



    /* ReadperProduct($id) method leest een product
        met een specifiek id uit database */
    public  function ReadPerProduct($id){


        $sql = "SELECT * FROM `vr_brillen`.`producten` WHERE id = $id";
        $stmt = $this->DataHandler->ReadDataDetails($sql);

        return $stmt;



    }



    /* HomeProducten() method, leest producten die
        in aanbiding zijn uit database */

    public function HomeProducten(){


        try{


            $sql ="SELECT * FROM `producten` WHERE aanbieding = 'ja' ORDER BY RAND() LIMIT 9";

            $stmt = $this->DataHandler->ReadHomeProduct($sql);
            return $stmt;

        }catch (Exception $e){
            throw $e;
        }

    }





    /* DisplayHomeProduct() leest producten gegevens uit HomeProducten()
        method via een array en toont ze in een card view
        met drie specificatie (naam, image, prijs) aan */
    public function DisplayHomeProduct(){


        $array = $this->HomeProducten();
    
    $html = "<div class='row'>";    
        
        foreach ($array as $k => $v){

            $html .= "<div class='col-4' id='cardbody'>";
            $html .= "<div class='card' style='width: 18rem;'>";

            $naam = $v["naam"];
            $image = $v["foto"];
            $prijs = $v["prijs"];
            $id = $v["id"];
            $html .= "<a href='index.php?op=details&id=$id'><img class='card-img-top' src='$image' alt='Card image cap' ><a/>";


            $html .= "<div class='card-body'>";

            $html .= "<ul class='list-group list-group-flush'>";
            $html .= "<li class='list-group-item'><a href='index.php?op=details&id=$id'> <h5 class='card-title'>$naam</h5></a></li>";

            $html .= "<li class='list-group-item'><p class='card-text'>€ $prijs</p></li>";

            $html .= "<li class='list-group-item'><a href='index.php?op=details&id=$id' class='btn btn-primary'>Details</a><a id='bestel'href='#' class='btn btn-primary'>Bestellen <i class='fa fa-cart-plus'></i></a></li>";

            $html .= "</ul>";
            $html .="</div>";
            $html .= "</div>";
            $html .= "</div>";
        }

    $html .= "</div>";

        return $html;


    }



    /*Display Producten() method leest producten gegevens
        uit ReadAllProduct() method
        via een array en toont ze in een card view met
        drie specificatie (naam, image, prijs) aan */

    public function DisplayProducten(){


        $array = $this->ReadAllProduct();

        $html = "<div class='row'>";

        foreach ($array as $k => $v){
            $html .= "<div id='cardbody'  class='col-4'>";
            $html .= "<div class='card' style='width: 18rem;'>";

            $naam = $v["naam"];
            $image = $v["foto"];
            $prijs = $v["prijs"];
            $id = $v["id"];

            $html .= "<a href='index.php?op=details&id=$id'><img class='card-img-top' src='$image' alt='Card image cap' ><a/>";
            
            $html .= "<div class='card-body'>";
            $html .= "<ul class='list-group list-group-flush'>";
            $html .= "<li class='list-group-item'><a href='index.php?op=details&id=$id'> <h5 class='card-title'>$naam</h5></a></li>";
            
            $html .= "<li class='list-group-item'><p class='card-text'>€ $prijs </p></li>";
            
            $html .= "<li class='list-group-item'><a href='index.php?op=details&id=$id' class='btn btn-primary'>Details</a><a id='bestel'href='#' class='btn btn-primary'>Bestellen <i class='fa fa-cart-plus'></i></a></li>";

            $html .= "</ul>";
            $html .="</div>";
            $html .= "</div>";
            $html .= "</div>";
        }

        $html .= "</div>";

        return $html;

    }



    /* DisplayProductDetails($id) method leest specific
        gegevens per product uit ReadPerProduct($id) method
        en toon ze in een card view uit */

    public function DisplayProductDetails($id){


        $array = $this->ReadPerProduct($id);

            $naam = $array['naam'];
            $image = $array["foto"];
            $prijs = $array["prijs"];
            $geschikt = $array["geschikt"];
            $specificatie = $array["specificaties"];
            $aanbieding = $array["aanbieding"];

        $html = '<div class="card" style="width: 25rem; margin-left: 33%;">';

            $html .= "<img class='card-img-top' src= '$image' alt='Card image cap''>";

            $html .= "<div class='card-body'>";
                $html .=  "<h5 class='card-title'>$naam</h5>";
                $html .= "<p class='card-text'>$specificatie</p>";
            $html .= '</div>';

                $html .= "<ul class='list-group list-group-flush'>";
                    $html .= "<li class='list-group-item'>Geschikt voor: $geschikt</li>";
                    $html .= "<li class='list-group-item'>Prijs: € $prijs</li>";
                    $html .= "<li class='list-group-item'>In aanbieding: $aanbieding</li>";
                $html .= "</ul>";

                $html .= "<div class='card-body'>";
                    $html .= "<a href='index.php?op=producten' class='card-link'>Naar producten</a>";
                    $html .= "<a href='#' class='card-link'>Bestellen</a>";
                $html .= "</div>";

        $html .= "</div>";



        return $html;
    }





    /* DisplayInTable() method leest
       gegevens van producten uit ReadAllProduct() method
       en toon ze in een Table view uit */

    public function DisplayInTable(){


        $array = $this->ReadAllProduct();
    
        $html = "<div class='table-responsive'><table class='table table-dark' border= 1 ;>";

        foreach ($array as $key =>$value){

            $html .= "<thead><tr>";

            foreach ($value as $k => $v){

                $html .= "<th>" . $k . "</th>";
            }

            $html .= "<th>Action</th>";
            break;
        }


        foreach ($array as $k => $v){

            $html .= "<tr>";

            foreach ($v as $key => $value){

                $html .= "<td>" . $value ."</td>";

            }

            $id = $v["id"];
            $html .= "<td> <a  href='index.php?op=admin_create' >Creat</a><a href='index.php?op=admin_update&id=$id'>Update</a><a href='index.php?op=admin_delete&id=$id' >Delete</a> </td>";

        }

        $html .= "</table></div>";
        return $html;

    }

    /*ShoppingCart logic*/
    

}


?>
