<?php

if (isset($_POST['itemId'])) {
  $itemId = $_POST['itemId'];

  $serveur = "localhost";
  $utilisateur = "root";
  $motDePasse = "";
  $baseDeDonnees = "tropicalfarm";

  $connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

  if (!$connexion) {
    die("Error in connexion : " . mysqli_connect_error());
  }

  // Delete item with id
  $query = "DELETE FROM item WHERE iditem = " . $itemId;

  $resultat = mysqli_query($connexion, $query);

  if (!$resultat) {
    die("Delete error : " . mysqli_error($connexion));
  }
  http_response_code(200);
} else {
  http_response_code(400);
}
?>
