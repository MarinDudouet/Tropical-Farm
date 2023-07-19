<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "tropicalfarm";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Récupération de la valeur de l'enchère
$auctionPrice = $_POST['auctionPrice'];

// Requête d'insertion avec les colonnes spécifiées
$query = "INSERT INTO auction (price) VALUES ('$auctionPrice')";

$resultat = mysqli_query($connexion, $query);

if ($resultat) {
    // L'insertion a réussi
    echo "L'enchère a été enregistrée avec succès !";
} else {
    // L'insertion a échoué
    echo "Erreur lors de l'enregistrement de l'enchère : " . mysqli_error($connexion);
}

// Fermer la connexion à la base de données
mysqli_close($connexion);
?>
