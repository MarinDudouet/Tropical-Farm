<?php
session_start();
// Connexion to database
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "tropicalfarm";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
$iditemauction = $_SESSION['iditemauction'];

if (!$connexion) {
    die("connexion error : " . mysqli_connect_error());
}

// get bid value
$auctionPrice = $_POST['auctionPrice'];
$auctionIDitem = $_POST['itemID'];


// insert into database
$query = "INSERT INTO auction (id_item,price,state) VALUES ('$iditemauction','$auctionPrice','firstbid')";

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
