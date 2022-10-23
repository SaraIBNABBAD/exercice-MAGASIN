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
    <?php
    include "database.php";
     $selectQuery="Select* from categorie";
     if ($pdo!=null){
         $stmt=$pdo->prepare($selectQuery);
         $stmt->execute();
         $categories=$stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     if (isset($_GET['id'])) {
        $idPdt=$_GET['id'];
        $query="SELECT* FROM produits WHERE id=:id;";
        $tab=[
            "id"=>$idPdt,
        ];
        $stmt=$pdo->prepare($query);
        $stmt->execute($tab);
        $prdt=$stmt->fetch(PDO::FETCH_ASSOC);
        // print_r($prdt);
    }

    ?>
    
   

<form action="traite.php" method="post" enctype="multipart/form-data">
    <div id="tete">
        <h1> MODIFICATION DE PRODUIT</h1>
    </div> 
    <fieldset>
      <legend>MODIFIER PRODUIT</legend>
    
      <div>
      <input type="hidden" id="id" name="idPDT" value="<?= $prdt['Id']?>">
          <label for="nom">Nom de produit
           <input type="text" id="nom"  value="<?= $prdt['Nom']?>" name="nomPDT">
          </label>
          <label for="catégorie">Catégorie
          <select name="cat" id="catégorie">
              <?php foreach($categories as $categorie):?>
                  <option value="<?= $categorie['Id']?>"<?= $categorie['Id']== $prdt['Id_categorie']?"selected":""?>><?= $categorie['Libelle']?></option>
                  <?php endforeach?>
          </select>
          </label>
      </div>
      <div>
          <label for="prix">Prix Unitaire(dh)
           <input type="text" id="prix" name="prix"  value="<?= $prdt['PrixUnitaire']?>">
          </label>
      </div>
      <div>
          <label for="qte">Quantité
           <input type="number" id="qte" name="qte" min=1  value="<?=$prdt['Quantite']?>">
          </label>
      </div>
      <div>
          <label for="desc">Description
           <textarea name="desc" id="desc" cols="30" rows="10"><?=$prdt['Description']?></textarea>
          </label>
      </div>
      <div>
      <input type="file" name="images">
      <input type="hidden" name="photo" value="<?=$prdt['Photo']?>"  >
      <img src="<?= $prdt['Photo']?>"width="150px" alt="<?= $prdt['Nom']?>" accept="image/*">
      </div>
      <div>
          <input type="submit" value="Modifier" name="update">
      </div>
      </div>    
    </fieldset>
</form>
   
</body>
</html>