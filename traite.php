<?php
include "database.php";
// session_start();
// stocker les images dans le dossier des image;
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
        $query="INSERT INTO produits (Nom,PrixUnitaire,Quantite,Description,Photo,Id_categorie) VALUES (:Nom,:PrixUnitaire,:Quantite,:Description,:Photo,:Id_categorie);";
        $tab=[
            "Nom"=>$nom,
            "PrixUnitaire"=>$prix,            
            "Quantite"=>$quantite,
            "Description"=>$descript,
            "Photo"=>$img,
            "Id_categorie"=>$cate,
        ];
        $statement = $pdo->prepare($query);
        $statement->execute($tab);
        echo "produit ajouté avec succé";
        header("location: pdt_cat.php");
    }
   
}


// Modification de tableau;

if (isset($_POST["update"])) {
    
    if (empty(trim($_POST["nomPDT"]))or empty(trim($_POST["prix"]))or empty(trim($_POST["qte"])) or empty(trim($_POST["desc"]))) {
        echo "Veuillez remplir tous les champs";
    }else{
        $nom=htmlspecialchars($_POST["nomPDT"]);
        $prix=htmlspecialchars($_POST["prix"]);
        $quantite=htmlspecialchars($_POST["qte"]);
        $descript=htmlspecialchars($_POST["desc"]);
        $id=$_POST["idPDT"];
        $cate=$_POST["cat"];
        // $img = afficheImage();
        if($_FILES["images"]["name"]!=""){
            $img = afficheImage();
        }else{
            $img=$_POST['photo'];
        }
        
    }


    $sql ="UPDATE produits set Nom=:Nom,PrixUnitaire=:PrixUnitaire,Quantite=:Quantite,Description=:Description,Photo=:Photo,Id_categorie=:Id_categorie WHERE Id=:Id;";

    $tab=[
        "Id"=>$id,
        "Nom"=>$nom,
        "PrixUnitaire"=>$prix,            
        "Quantite"=>$quantite,
        "Description"=>$descript,
        "Photo"=>$img,
        "Id_categorie"=>$cate,
    ];

    if ($pdo != null) {
    
    $statement = $pdo->prepare($sql);

     if ($statement->execute($tab)) {
         echo "success";
        
        header("location: pdt_cat.php");  
     }

    }
 }

