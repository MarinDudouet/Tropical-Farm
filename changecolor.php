<?php

session_start();

if(!isset($_SESSION["photo"])){
    //redirection page erreur
}

$imageURL = "image/" + $_SESSION["photo"];
?>

