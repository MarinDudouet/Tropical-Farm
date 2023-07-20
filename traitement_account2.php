<?php
session_start();

// Connexion to database
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
        $newYear = $_POST['year'];
        $newCVC = $_POST['cvc'];
        $newphone = $_POST['phone'];

      
        $updateQuery = "UPDATE buyer SET name = '$newName', phone = '$newphone', street = '$newStreet', flat = '$newFlat', city = '$newCity', state = '$newState', postcode = '$newPostcode', card = '$newCard', cardnumber = '$newCardnumber', monthexpiration = '$newMonth', yearexpiration = '$newYear', cvc = '$newCVC' WHERE username = '" . $_SESSION["username"] . "'" . " AND password = '" . $_SESSION["password"] ."'";

        if(!isset($updateQuery)){
            $updateQuery = "UPDATE seller SET name = '$newName', phone = '$newphone', street = '$newStreet', flat = '$newFlat', city = '$newCity', state = '$newState', postcode = '$newPostcode', card = '$newCard', cardnumber = '$newCardnumber', monthexpiration = '$newMonth', yearexpiration = '$newYear', cvc = '$newCVC' WHERE username = '" . $_SESSION["username"] . "'" . " AND password = '" . $_SESSION["password"] ."'";
          }
  
          if(!isset($updateQuery)){
            $updateQuery = "UPDATE admin SET name = '$newName', phone = '$newphone', street = '$newStreet', flat = '$newFlat', city = '$newCity', state = '$newState', postcode = '$newPostcode', card = '$newCard', cardnumber = '$newCardnumber', monthexpiration = '$newMonth', yearexpiration = '$newYear', cvc = '$newCVC' WHERE username = '" . $_SESSION["username"] . "'" . " AND password = '" . $_SESSION["password"] ."'";
          }
          
        mysqli_query($connexion, $updateQuery);
        
      }

      header('Location: http://localhost:80/Tropical-Farm/myaccount.php');
      

    // close connexion to database
    mysqli_close($connexion);
    ?>