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

    <form method="post" action="" enctype="multipart/form-data">

        <label>voeg een nieuwe product toe:</label><br/>
        <input type="text" name="naam" placeholder="Naam"><br/>
        <input type="number" name="prijs" placeholder="prijs: 123"><br/>
        <input type="text" name="geschikt" placeholder="geschikt: pc of mobiel"><br/>
        <input type="text" name="aanbieding" placeholder="in aanbieding? Ja of Nee"><br/>
        <textarea name="specificaties" placeholder="specificaties"></textarea>
        <input type="hidden" name="size" value="1000000"><br/>
        <input type="file" name="foto"><br/>


        <input type="submit" name="create" value="create">
    </form>

</div>



</div>




</body>
</html>