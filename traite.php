<?php
include "database.php";include "produit.php";
// afficher les image;
function afficheImage(){
    $lien_img="download/";
    $lier_img=$lien_img.basename($_FILES["images"]["name"]);
    if (move_uploaded_file($_FILES["images"]["tmp_name"],$lier_img)) {
        return $lier_img ;
    }else{
        echo "echoué";
        return null;
    }
} 

// stocker les données dans la BD via le formulaire;

if (isset($_POST["submit"])) {
    if (empty(trim($_POST["nomPDT"]))or empty(trim($_POST["prix"]))or empty(trim($_POST["qte"])) or empty(trim($_POST["desc"]))) {
        echo "Veuillez remplir tous les champs";
    }else{
        $nom=htmlspecialchars($_POST["nomPDT"]);
        $prix=htmlspecialchars($_POST["prix"]);
        $quantite=htmlspecialchars($_POST["qte"]);
        $descript=htmlspecialchars($_POST["desc"]);
        $cate=$_POST["cat"];
        $img=afficheImage();
    }
    

    if ($pdo != null) {
        $query="INSERT INTO produits (Nom,PrixUnitaire,Quantité,Description,Photo,Id_catégorie) VALUES (:Nom,:PrixUnitaire,:Quantité,:Description,:Photo,:Id_catégorie);";
        $tab=[
            "Nom"=>$nom,
            "PrixUnitaire"=>$prix,            
            "Quantité"=>$quantite,
            "Description"=>$descript,
            "Photo"=>$img,
            "Id_catégorie"=>$cate,

        ];
        $statement = $pdo->prepare($query);
        $statement->execute($tab);
        echo "produit ajouté avec succé";
    }
}
