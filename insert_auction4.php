<?php
session_start();
// Connexion to database
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "tropicalfarm";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
$iditemauction = $_SESSION['iditemauction'];
$idbuyer = $_SESSION['idbuyer'];


if (!$connexion) {
    die("connexion error : " . mysqli_connect_error());
}

// get bid value
$auctionPrice = $_POST['auctionPrice'];
$auctionIDitem = $_POST['itemID'];
$idbuyer = $_SESSION['idbuyer'];
$idadmin = $_SESSION['idadmin'];
$idseller = $_SESSION['idseller'];


// insert into database
if(isset($_SESSION['idseller'])){
    // insert into database
    $query = "INSERT INTO auction (id_item,id_seller,price,state) VALUES ('$iditemauction','$idseller','$auctionPrice','fourthbid')";
    }
    
else if(isset($_SESSION['idadmin'])){
    // insert into database
    $query = "INSERT INTO auction (id_item,id_admin,price,state) VALUES ('$iditemauction','$idadmin','$auctionPrice','fourthbid')";
    }

else if(isset($_SESSION['idbuyer'])){
    // insert into database
    $query = "INSERT INTO auction (id_item,id_buyer,price,state) VALUES ('$iditemauction','$idbuyer','$auctionPrice','fourthbid')";
    }
$resultat = mysqli_query($connexion, $query);

if ($resultat) {
    // success
    echo "Bid has been insert into database !";
} else {
    // error
   echo "error : " . mysqli_error($connexion);
}

// close connexion to database
mysqli_close($connexion);
?>
