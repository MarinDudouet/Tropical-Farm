<?php

session_start();

if(!isset($_SESSION["photo"])){
    //redirection erreur page
}

$imageURL = "image/" + $_SESSION["photo"];
?>

