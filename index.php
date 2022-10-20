<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
    include "database.php";
     $selectQuery="Select* from categorie";
     if ($pdo!=null){
         $stmt=$pdo->prepare($selectQuery);
         $stmt->execute();
         $categories=$stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    ?>
<h1> MAGASIN DE PRODUIT</h1>
<div class="flex">
<form action="traite.php" method="post" enctype="multipart/form-data">
<fieldset>
    <legend>AJOUTER PRODUIT</legend>
    
    <div>
        <label for="nom">Nom de produit
         <input type="text" id="nom" name="nomPDT">
        </label>
        <label for="catégorie">Catégorie
        <select name="cat" id="catégorie">
            <?php foreach($categories as $categorie):?>
                <option value="<?= $categorie['Id']?>"><?= $categorie['Libelle']?></option>
                <?php endforeach?>
        </select>
        </label>
    </div>
    <div>
        <label for="prix">Prix Unitaire(dh)
         <input type="text" id="prix" name="prix">
        </label>
    </div>
    <div>
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
    <input type="file" name="images">
    </div>
    <div>
        <input type="submit" value="Valider" name="submit">
    </div>
    </div>    
</fieldset>
</form>
<form action="traiteCat.php" method="post">
        <fieldset>
        <legend>AJOUTER CATEGORIE</legend>
        
        <div>
            <label for="cat">Catégorie</label>
            <input type="text" name="cattr" id="cat">
        </div>
        <input type="submit" value="Ajouter" name="add">
        </fieldset>
    </form>
    </div>
    <div class="btn">
    <button><a href="pdt_cat.php">Poduits</a></button>
    <button><a href="affichCatg.php">Catégorie</a></button>
    </div>    
</body>
</html>