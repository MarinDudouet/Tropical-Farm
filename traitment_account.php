<?php
session_start();

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "tropicalfarm";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    //MAJ BDD
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newName = $_POST['name'];
        $newStreet = $_POST['street'];
        $newFlat = $_POST['flat'];
        $newCity = $_POST['city'];
        $newState = $_POST['state'];
        $newPostcode = $_POST['postcode'];
        $newCard = $_POST['card'];
        $newCardnumber = $_POST['cardnumber'];
        $newMonth = $_POST['month'];
        $newCVC = $_POST['cvc'];
      
        $updateQuery = "UPDATE buyer SET name = '$newName', street = '$newStreet', flat = '$newFlat', city = '$newCity', state = '$newState', postcode = '$newPostcode', card = '$newCard', cardnumber = '$newCardnumber', monthexpiration = '$newMonth', cvc = '$newCVC' WHERE username = '" . $_SESSION["username"] . "'" . " AND password = '" . $_SESSION["password"] ."'";
        mysqli_query($connexion, $updateQuery);
      }

      header('Location: http://localhost:80/Tropical-Farm/myaccount.php');
      

    // Fermeture de la connexion à la base de données
    mysqli_close($connexion);
    ?>