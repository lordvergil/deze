<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- font-awesome en bootstrap  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Multiversum</title>

<!--menu en algemene style-->
    <link rel="stylesheet" href="view/assets/style.css">
    <link rel="stylesheet" href="view/assets/menu-style.css">
</head>
<body>

<!--main menu code-->

<div class="menu-header">
    <div class="section">
        <a href="index.php?op=home-producten" id="logo">Multiversum<img src="view/images/vr.svg" id="HeaderLogo"></a>


        <label for="toggle-1" class="toggle-menu">
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </label>
        <input type="checkbox" id="toggle-1">

        <form class="searchbar" name="searchForm" action="index.php?op=search" method="POST">
            <input type="text" name="name" placeholder="Search..">
            <button type="submit" name="submit">Search</button>
        </form>
        <nav>
            <ul>
                <li><a href="index.php?op=home-producten"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="index.php?op=producten"><i class="fa fa-product-hunt"></i>Product</a></li>
                <li><a class="contact-page"><i class="fa fa-phone"></i>Contact</a></li>
                <li><a class="shopping-cart"><i class="fa fa-cart-arrow-down"></i>Winkelwagen</a></li>
            </ul>
        </nav>
    </div>
</div>

<!--script code van main menu-->
<script src="view/assets/js/menu-js.js"></script>


<!--<script type="text/javascript" async>-->
<!---->
<!--    // Even heel snel zonder documentatie om paginas te loaden-->
<!--    function loadPage(href) {-->
<!--        var xmlhttp = new XMLHttpRequest();-->
<!--        xmlhttp.open("GET", href, false);-->
<!--        xmlhttp.send();-->
<!--        return xmlhttp.responseText;-->
<!--    }-->
<!--</script>-->

<!-- script om inhoud van contactpagina te pakken -->
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".contact-page").click(function(){
            $("#content").load("view/contact.php");
        });
    });
</script>

<!--script om inhoud van de winkelwagen te pakken-->
<!--
<script type="text/javascript">
    $(document).ready(function(){
        $(".contact-page").click(function(){
            $("#content").load("view/contact.php");
        });
    });
</script>
-->

<div class="row">

    <div id="content" class="col-12">

