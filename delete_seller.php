<?php
// get id to delete
if (isset($_POST['itemId'])) {
  $itemId = $_POST['itemId'];

  $serveur = "localhost";
  $utilisateur = "root";
  $motDePasse = "";
  $baseDeDonnees = "tropicalfarm";

  $connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

  if (!$connexion) {
    die("error in connexion : " . mysqli_connect_error());
  }

  // delete item
  $query = "DELETE FROM seller WHERE idseller = " . $itemId;

  $resultat = mysqli_query($connexion, $query);

  if (!$resultat) {
    die("error : " . mysqli_error($connexion));
  }

  http_response_code(200);
} else {
  http_response_code(400);
}
?>
