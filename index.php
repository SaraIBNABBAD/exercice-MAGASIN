<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // include "Pdt_table.php";
//    include "catego_table.php";
    ?>

<form action="traite.php" method="post" enctype="multipartform-data">
<fieldset>
    <div>
        <label for="nom">Nom de produit
         <input type="text" id="nom" name="nomPDT">
        </label>
    </div>
    <div>
        <label for="prix">Prix Unitaire(dh)
         <input type="text" id="prix" name="prix">
        </label>
    </div>
    <div>prix
        <label for="qte">Quantité
         <input type="number" id="qte" name="qte" min=1>
        </label>
    </div>
    <div>
        <label for="desc">Description
         <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
        </label>
    </div>
    <div>
    <input type="file" name="fileToUpload" id="">
    </div>
    <div>
        <input type="submit" value="Valider" name="submit">
    </div>
</fieldset>
</form>
</body>
</html>