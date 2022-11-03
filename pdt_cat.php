<?php
require "database.php";
include "logout.php";

    if(!isset($_SESSION['user'])){
        header("location:logIn.php");
    }
$sql="SELECT p.Id,p.Nom , p.PrixUnitaire,p.Quantite,p.Description,p.Photo,c.Libelle FROM produits p,categorie c WHERE p.Id_categorie=c.id" ;
$statmnt=$pdo->prepare($sql);
if($statmnt->execute()){
    $listPdt=$statmnt->fetchAll(PDO::FETCH_ASSOC);
}
 if (isset($_GET['id'])) {
    $idPdt=$_GET['id'];
    $query="DELETE FROM produits WHERE id=:id;";
    $tab=[
        "id"=>$idPdt,
    ];
    $stmt=$pdo->prepare($query);
     $stmt->execute($tab);
     header("location:pdt_cat.php");
} 
if (isset($_GET['search'])) {
    $search=$_GET['search'];
    $querySearch= "SELECT p.Id, p.Nom, p.PrixUnitaire, p.Description, p.Quantite, p.Photo, c.Libelle 
    FROM produits p, categorie c 
    WHERE p.Id_categorie = c.Id AND Nom like :input ;";
    $tab=[
        "input"=>"%".$search."%"
    ];
    $stmt = $pdo->prepare($querySearch);
    $stmt->execute($tab);
    $listPdt=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
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
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="nav.css">
    <title>Document</title>
</head>
<header>
    <nav>
        <ul>
            <li><a href="Index.php">Acceuil</a></li>
            <li><a href="affichCatg.php">Catégorie</a></li>
            <li><a href="addCat.php">New Catégorie</a></li>
            <li><a href="logout.php?logout">Logout</a></li>
        </ul>
        <form class="search" method="get">
         <input type="search" name="search">
         <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </nav>
    
</header>
<body>
    <div class=" tete bg-primary text-white  m-auto text-center  mt-5">
    <h1>Liste de Produits</h1>
    </div>
    <table class="table table-striped w-50 m-auto text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix.Un</th>
                <th>Quantité</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Libelle</th>
                <th>Modification</th>
                <th>Suppression</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listPdt as $prodt):?>
            <tr>
                <td scope="row"><?= $prodt['Id'] ?></td>
                <td><?= $prodt['Nom'] ?></td>
                <td><?= $prodt['PrixUnitaire'] ?></td>
                <td><?= $prodt['Quantite'] ?></td>
                <td><?= $prodt['Description'] ?></td>
                <td><img src="<?= $prodt['Photo'] ?>" alt="<?= $prodt['Nom'] ?>"width="100px"/></td>
                <td><?= $prodt['Libelle'] ?></td>
                <td><a href="updateP.php?id=<?=$prodt['Id']?>"><i class="fa-solid fa-square-pen text-primary fs-3 text-center" ></i></a></td>
                <td><button onclick="confirmation(<?=$prodt['Id']?>)"><i class="fa-solid fa-trash-can text-danger fs-4 text-center"r></i></button></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
</body>
</html>
<script>
    // cofirmation de suppression
    function confirmation(id){
        if(confirm("Etes-vous sure de supprimer ?")){
            location.href="./pdt_cat.php?id="+id;
        }
    }
// recuperation de la valeur de la recherche
   /*  let form = document.querySelector(".search");

let input = form.elements['search'];
console.log(input.value);
input.addEventListener("input", () => {
    location.href = "pdt_cat.php?search=" + input.value;
})


function search() {
    let form = document.querySelector(".search");

    let input = form.elements['search'];
}  */
</script>





