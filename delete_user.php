<?php
// get id
if (isset($_POST['itemId'])) {
  $itemId = $_POST['itemId'];

  $serveur = "localhost";
  $utilisateur = "root";
  $motDePasse = "";
  $baseDeDonnees = "tropicalfarm";

  $connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

  if (!$connexion) {
    die("Connexion error : " . mysqli_connect_error());
  }

  // delete "item"with ID
  $query = "DELETE FROM buyer WHERE idbuyer = " . $itemId;

  $resultat = mysqli_query($connexion, $query);

  if (!$resultat) {
    die("delete error : " . mysqli_error($connexion));
  }

  http_response_code(200);
} else {
  http_response_code(400);
}
?>
