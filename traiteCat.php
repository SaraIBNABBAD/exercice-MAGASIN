<?php
include "database.php";
// Ajouer une categorie;
if(isset($_POST["add"])){
    if(empty(trim($_POST["cattr"]))){
        echo "ajouter catégorie";
    }else{
        $catg=htmlspecialchars($_POST["cattr"]);
    }
 }
 if ($pdo!=null) {
    $query= "INSERT INTO categorie (Libelle) VALUES (:Libelle);";
    $tabCat=[
        'Libelle'=>$catg,
    ];
    $stt= $pdo->prepare($query);
    $stt->execute($tabCat);
    echo "categorie ajouté avec succé";
 }