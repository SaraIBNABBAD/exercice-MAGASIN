<?php
require "database.php";
$sql="SELECT p.Id,p.Nom , p.PrixUnitaire,p.Quantite,p.Description,p.Photo,c.Libelle FROM produits p,categorie c WHERE p.Id_categorie=c.id" ;
$statmnt=$pdo->prepare($sql);
if($statmnt->execute()){
    $listPdt=$statmnt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="categorie.css">
    <title>Document</title>
    <style>
        table{
            margin:auto;
        }
        table,th,td,tr{
            border-collapse:collapse;
            border: 1px solid black;
        }
        img{
            width:100px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Libelle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listPdt as $prodt):?>
            <tr>
                <td><?= $prodt['Id'] ?></td>
                <td><?= $prodt['Nom'] ?></td>
                <td><?= $prodt['PrixUnitaire'] ?></td>
                <td><?= $prodt['Quantite'] ?></td>
                <td><?= $prodt['Description'] ?></td>
                <td><img src="<?= $prodt['Photo'] ?>" alt="<?= $prodt['Nom'] ?>"/></td>
                <td><?= $prodt['Libelle'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>





