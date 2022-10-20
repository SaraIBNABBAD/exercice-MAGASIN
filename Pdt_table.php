<?php
include "database.php";

$table_name='produits';
$query="CREATE TABLE`".$table_name ."`(
`Id` INT NOT NULL AUTO_INCREMENT,
`Nom` VARCHAR(50) NOT NULL,
`PrixUnitaire` FLOAT NOT NULL,
`Quantité` INT NOT NULL,
`Description` TEXT NOT NULL,
`Photo` TEXT  NULL,
`Id_catégorie`INT NOT NULL,
PRIMARY KEY (`Id`));";
$pdo->exec($query);
echo('Table created successfully.');