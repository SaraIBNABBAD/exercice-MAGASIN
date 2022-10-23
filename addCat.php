<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addCat.css">
    <link rel="stylesheet" href="nav.css">
    <title>Document</title>
</head>
<header>

    <nav>
        <ul>
            <li><a href="Index.php">Acceuil</a></li>
            <li><a href="affichCatg.php">Catégorie</a></li>
            <li><a href="pdt_cat.php">Produit</a></li>
        </ul>
    </nav>
</header>
<body>
<form action="traiteCat.php" method="post">
    <div id="tete">
        <h1>Nouvelle Catégorie</h1>
    </div>
    <fieldset>
        <legend>AJOUTER CATEGORIE</legend>
        
        <div class="champ">
            <label for="cat">Catégorie</label>
            <input type="text" name="cattr" id="cat">
        </div>
        <input type="submit" value="Ajouter" name="add" class="click" >
    </fieldset>
</form>
</body>
</html>