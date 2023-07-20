<?php
session_start();

// Connexion to database
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "tropicalfarm";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérification connexion
if (!$connexion) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}

// Maj data in databse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get info from data
    $newName = $_POST['name'];
    $newStreet = $_POST['street'];
    $newFlat = $_POST['flat'];
    $newCity = $_POST['city'];
    $newState = $_POST['state'];
    $newPostcode = $_POST['postcode'];
    $newCard = $_POST['card'];
    $newCardnumber = $_POST['cardnumber'];
    $newMonth = $_POST['month'];
    $newYear = $_POST['year'];
    $newCVC = $_POST['cvc'];

    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $role = $_SESSION["role"];

    // Vérification du rôle de l'utilisateur
    if ($role == "buyer") {
        $updateQuery = "UPDATE buyer SET name = '$newName', street = '$newStreet', flat = '$newFlat', city = '$newCity', state = '$newState', postcode = '$newPostcode', card = '$newCard', cardnumber = '$newCardnumber', monthexpiration = '$newMonth', yearexpiration = '$newYear', cvc = '$newCVC' WHERE username = '$username' AND password = '$password'";
    } elseif ($role == "seller") {
        $updateQuery = "UPDATE seller SET name = '$newName', street = '$newStreet', flat = '$newFlat', city = '$newCity', state = '$newState', postcode = '$newPostcode', card = '$newCard', cardnumber = '$newCardnumber', monthexpiration = '$newMonth', yearexpiration = '$newYear', cvc = '$newCVC' WHERE username = '$username' AND password = '$password'";
    } elseif ($role == "admin") {
        $updateQuery = "UPDATE admin SET name = '$newName', street = '$newStreet', flat = '$newFlat', city = '$newCity', state = '$newState', postcode = '$newPostcode', card = '$newCard', cardnumber = '$newCardnumber', monthexpiration = '$newMonth', yearexpiration = '$newYear', cvc = '$newCVC' WHERE username = '$username' AND password = '$password'";
    }

    // Exécution de la requête de mise à jour
    mysqli_query($connexion, $updateQuery);

    // Récupération de l'ID de l'utilisateur
    $idsession = null;
    if ($role == 'admin' && isset($_SESSION['idadmin'])) {
        $idsession = $_SESSION['idadmin'];
    } elseif ($role == 'seller' && isset($_SESSION['idseller'])) {
        $idsession = $_SESSION['idseller'];
    } elseif ($role == 'buyer' && isset($_SESSION['idbuyer'])) {
        $idsession = $_SESSION['idbuyer'];
    } else {
        echo "Vous n'avez pas les autorisations nécessaires pour supprimer les éléments du panier.";
        exit;
    }
// Récupérer les totaux de quantités pour chaque type d'élément
$queryTotals = "SELECT id_item, SUM(quantity) AS totalQuantity FROM basket GROUP BY id_item";
$resultTotals = mysqli_query($connexion, $queryTotals);

if (!$resultTotals) {
  die("La requête a échoué : " . mysqli_error($connexion));
}

while ($rowTotal = mysqli_fetch_assoc($resultTotals)) {
  $iditem = $rowTotal['id_item'];
  $totalQuantity = $rowTotal['totalQuantity'];

  // Mettre à jour le stock de l'élément
  $updateStockQuery = "UPDATE item SET stock = stock - $totalQuantity WHERE iditem = $iditem";
  $resultStock = mysqli_query($connexion, $updateStockQuery);

  if (!$resultStock) {
    die("La requête a échoué : " . mysqli_error($connexion));
  }
}

    // Suppression des éléments du panier de l'utilisateur
    $deleteQuery = "DELETE FROM basket WHERE ";
    if ($role == 'admin') {
        $deleteQuery .= "id_admin = $idsession";
    } elseif ($role == 'seller') {
        $deleteQuery .= "id_seller = $idsession";
    } elseif ($role == 'buyer') {
        $deleteQuery .= "id_buyer = $idsession";
    }

    mysqli_query($connexion, $updateQuery);

    // Suppression des éléments du panier
    mysqli_query($connexion, $deleteQuery);





    // Redirection vers la page d'accueil
    header('Location: http://localhost:80/Tropical-Farm/index.php');
}

header('Location: http://localhost:80/Tropical-Farm/index.php');

?>
