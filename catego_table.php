<?php
include "database.php";

$table_name='catégorie';
$query="CREATE TABLE `".$table_name."`(
    `Id`INT NOT NULL AUTO_INCREMENT,
    `Libelle` VARCHAR (50) NOT NULL,
    PRIMARY KEY (`Id`));";

$pdo->exec($query);
echo('Table catego created successfully.');
