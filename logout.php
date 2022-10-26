<?php
include "database.php";
session_start();
//  ********* fin de session
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    if (session_destroy()) {
        header("location:logIn.php");
    }
}