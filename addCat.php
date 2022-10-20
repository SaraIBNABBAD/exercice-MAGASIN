<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" type="text/css"  href="style.css"/>
    <title>Document</title>
</head>
<body>
<form action="traiteCat.php" method="post">
    <div id="tete">
        <h1>Nouvelle Catégorie</h1>
    </div>
    <fieldset>
        <legend>AJOUTER CATEGORIE</legend>
        
        <div>
            <label for="cat">Catégorie</label>
            <input type="text" name="cattr" id="cat">
        </div>
        <input type="submit" value="Ajouter" name="add">
    </fieldset>
</form>
</body>
</html>