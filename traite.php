<?php
include "database.php";
// afficher les iameg;
/* function getImage(){
    $lienImg="download/";
    $lierImg=$lienImg.basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$lierImg)) {
        return $lierImg ;
    }else{
        echo "echoué";
        return null;
    }
} */

// stocker les données dans la BD via le formulaire;

if (isset($_POST["submit"])) {
    if (empty(trim($_POST["nomPDT"]))or empty(trim($_POST["prix"]))or empty(trim($_POST["qte"])) or empty(trim($_POST["desc"]))) {
        echo "Veuillez remplir tous les champs";
    }else{
        $nom=htmlspecialchars($_POST["nomPDT"]);
        $prix=htmlspecialchars($_POST["prix"]);
        $quantite=htmlspecialchars($_POST["qte"]);
        $descript=htmlspecialchars($_POST["desc"]);
        // $img=getImage();
    }
    // $pdt = new Produit ();
    // $pdt->getInfo(); 

    if ($pdo!=null) {
        $query="INSERT INTO produits (Nom,PrixUnitaire,Quantité,'Description') VALUE (:Nom,:PrixUnitaire,:Quantité,:'Description');";
        $params=[
            'Nom'=>$nom,
            'PrixUnitaire'=>$prix,            
            'Quantité'=>$quantite,
            'Description'=>$descript,
            // 'Photo'=>$img,
        ];
        $statement = $pdo -> prepare($query);
        $statement->execute($params);
        echo "produit ajouté avec succé";
    }else{
        echo "nnnnnnnnnnn";
    }
}


