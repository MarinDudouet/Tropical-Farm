<?php
// Récupérer l'ID de l'élément à supprimer envoyé depuis la requête AJAX
if (isset($_POST['itemId'])) {
  $itemId = $_POST['itemId'];

  // Effectuer les opérations de suppression dans la base de données
  $serveur = "localhost";
  $utilisateur = "root";
  $motDePasse = "";
  $baseDeDonnees = "tropicalfarm";

  $connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

  if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
  }

  // Supprimer l'élément de la table "item" en utilisant l'ID
  $query = "DELETE FROM buyer WHERE idbuyer = " . $itemId;

  $resultat = mysqli_query($connexion, $query);

  if (!$resultat) {
    die("La requête de suppression a échoué : " . mysqli_error($connexion));
  }

  // Répondre avec un statut de succès
  http_response_code(200);
} else {
  // Répondre avec un statut d'erreur si l'ID de l'élément n'a pas été fourni
  http_response_code(400);
}
?>
