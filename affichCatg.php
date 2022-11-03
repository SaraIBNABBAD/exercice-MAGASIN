<?php
include "database.php";
session_start();
    if(!isset($_SESSION['user'])){
        header("location:logIn.php");
    }
$query=" SELECT* FROM categorie";
$statemt=$pdo->prepare($query);
if($statemt->execute()){
    $listcatg=$statemt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"/>
    <link rel="stylesheet" href="nav.css">
    <title>Document</title>
</head>
<header>
    <nav>
        <ul>
            <li><a href="Index.php">Acceuil</a></li>
            <li><a href="pdt_cat.php">Produit</a></li>
            <li><a href="addCat.php">New Catégorie</a></li>
            <li><a href="logout.php?logout">Logout</a></li>
        </ul>
    </nav>
</header>
<body>
<div class=" tete bg-primary text-white  m-auto text-center w-25 mt-5 ">
    <h2>Liste de Catégorie</h2>
    </div>
    <table class="table table-striped w-25 m-auto text-center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Libelle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listcatg as $catr):?>
            <tr>
            <td><?= $catr['Id'] ?></td>
            <td><?= $catr['Libelle'] ?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>