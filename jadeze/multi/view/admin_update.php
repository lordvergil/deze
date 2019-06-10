<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>

<div class="col-6">
    <form name="UpdateForm" method="post" action="">

        <label>Update de producten:</label><br/>
        <input type="text" name="UpdateNaam"  value="<?php echo $product["naam"];?>"><br/>
        <input type="number" name="UpdatePrijs" value="<?php echo $product["prijs"];?>"> <br/>
        <input type="text" name="UpdateGeschikt" value="<?php echo $product["geschikt"];?>"><br/>
        <input type="text" name="UpdateAanbieding" value="<?php echo $product["aanbieding"];?>"> <br/>
        <textarea name="UpdateSpecificaties"><?php echo $product["specificaties"];?></textarea><br/>
        <input type="submit" name="update" value="Update">

    </form>



</div>




</body>
</html>