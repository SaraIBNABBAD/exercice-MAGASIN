<?php
    include "database.php";

    session_start();
    if(!isset($_SESSION['user'])){
        header("location:logIn.php");
    }
     $selectQuery="Select* from categorie";
     if ($pdo!=null){
         $stmt=$pdo->prepare($selectQuery);
         $stmt->execute();
         $categories=$stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="nav.css">
    <header>
    <nav>
        <ul>
            <li><a href="Index.php">Acceuil</a></li>
            <li><a href="pdt_cat.php">Produit</a></li>
            <li><a href="affichCatg.php">Catégorie</a></li>
            <li><a href="addCat.php">New Catégorie</a></li>
            <li><a href="logout.php?logout">Logout</a></li>
        </ul>
    </nav>
</header>
    <title>Document</title>
</head>
<body> 
<form action="traite.php" method="post" enctype="multipart/form-data">
    <div id="tete">
        <h1> MAGASIN DE PRODUIT</h1>
    </div> 
    <fieldset>
      <legend>AJOUTER PRODUIT</legend>
      <div class="flex">
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
      
          <label for="prix">Prix Unitaire(dh)
              <input type="text" id="prix" name="prix">
          </label>
        </div>
        <div>
          <label for="qte">Quantité
              <input type="number" id="qte" name="qte" min=1>
          </label>
          <label for="desc">Description
             <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
          </label>
          <input type="file" name="images" accept="image/*">
        </div>
      </div>
      <div>
          <input type="submit" value="Valider" name="submit" class="valider">
      </div>    
    </fieldset>
</form> 
</body>
</html>