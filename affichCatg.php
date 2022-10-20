<?php
include "database.php";
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
    <title>Document</title>
    <style>
        table{
            border:1px solid black;
        }
        tr,td{
            border-collapse:collapse;
            border:1px solid black;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Libelle</td>
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