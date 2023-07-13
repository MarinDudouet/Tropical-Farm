<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Snakes - Tropical farm</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link href="style.css" rel="stylesheet" type="text/css"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
<script src="java.js"></script>

</head>

<body>

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

// Récupération des données de la base de données
$query = "SELECT * FROM item";
$resultat = mysqli_query($connexion, $query);

if (!$resultat) {
    die("La requête a échoué : " . mysqli_error($connexion));
}

while ($row = mysqli_fetch_assoc($resultat)) {
  echo "<div>";
  echo "<h3>" . $row['name'] . "</h3>";
  echo "<p>" . $row['colonne2'] . "</p>";
  // Ajoutez d'autres colonnes si nécessaire
  echo "</div>";
}

?>

  <div class="headnav">
    <!--Header-->
    
        <header>
            <div class="logo">
              <img src="image\logo.png" alt="Logo">
            </div>
            <div class="titre"><a href="http://localhost:80/Tropical-Farm/index.php" class="titre">Tropical Farm</a></div>
            <div class="dropdown">
              <button class="dropdown-btn"><img src="image\user.png" width="50px" height="50px"></button>
              <div class="dropdown-content">
                <a href="#">Costumer</a>
                <a href="#">Seller</a>
                <a href="#">Administrator</a>
              </div>
            </div>
          </header>
              
    <!--Navbar-->
    
    <nav>
      <ul class="categories">
        <li>
          <a href="#">Reptiles</a>
          <div class="dropdown2">
            <a href="http://localhost:80/Tropical-Farm/snakes.php">Snakes<img class="dropdown2-image" src="image\snake.png"></a>
            <a href="http://localhost:80/Tropical-Farm/lizards.php">Lizards<img class="dropdown2-image" src="image\lézards.png"></a>
            <a href="http://localhost:80/Tropical-Farm/turtles.php">Turtles<img class="dropdown2-image" src="image\tortues.png"></a>
            <a href="http://localhost:80/Tropical-Farm/amphibians.php">Amphibians<img class="dropdown2-image" src="image\amphibiens.png"></a>
            <a href="http://localhost:80/Tropical-Farm/chameleons.php">Chameleons<img class="dropdown2-image" src="image\chamaeleo.jpg"></a>
          </div>
        </li>
        <li>
          <a href="#">Food</a>
          <div class="dropdown2">
            <a href="http://localhost:80/Tropical-Farm/livingfood.php">Living food<img class="dropdown2-image" src="image\insects.png"></a>
            <a href="http://localhost:80/Tropical-Farm/frozenfood.php">Frozen food<img class="dropdown2-image" src="image\mouse.png"></a>
            <a href="http://localhost:80/Tropical-Farm/dryfood.php">Dry food<img class="dropdown2-image" src="image\granule.png"></a>
          </div>
        </li>
        <li>
          <a href="#">Materials</a>
          <div class="dropdown2">
            <a href="http://localhost:80/Tropical-Farm/terrarium.php">Terrarium<img class="dropdown2-image" src="image\terarium.png"></a>
            <a href="http://localhost:80/Tropical-Farm/aquarium.php">Aquarium<img class="dropdown2-image" src="image\aquarium.png"></a>
            <a href="http://localhost:80/Tropical-Farm/decoration.php">Decoration<img class="dropdown2-image" src="image\deco.png"></a>
          </div>
        </li>
      </ul>
    
      <div class="panier">
        <a href="#"><b>Basket &nbsp</b><img src="image/shopping-bag.png"></a>
      </div>
    </nav>
    </div>
  
  <br><br><br><br><br><br>

<!--Item-->

<div class="container">
    <div class="item">
        <img src="image/Boa c. constrictor, Guyana.jpg"><br>
        <center><h5>Boa c. constrictor, Guyana</h5>
        <p>295,00 £</p></center>
    </div>
    <div class="item">
        <img src="image/Ahaetulla nasuta.jpg"><br>
        <center><h5>Ahaetulla nasuta</h5>
        <p>49,00 £</p></center>
    </div>
    <div class="item">
        <img src="image/Boaedon (Lamprophis) fuliginosus, albinos.jpg"><br>
        <center><h5>Boaedon (Lamprophis) fuliginosus, albinos</h5>
        <p>99,00 £</p></center>
    </div>
  <div class="item">
    <img src="image/elaphe-carinata-albinos.jpg"><br>
    <center><h5>Elaphe-carinata-albinos</h5>
    <p>550,00 £</p></center>
</div>
  <div class="item">
      <img src="image/Boa c. imperator, Nicaragua, ghost.jpg"><br>
      <center><h5>Boa c. imperator, Nicaragua, ghost</h5>
      <p>145,00 £</p></center>
  </div>
  <div class="item">
      <img src="image/Boaedon (Lamprophis) fuliginosus, Black.jpg"><br>
      <center><h5>Boaedon (Lamprophis) fuliginosus, Black</h5>
      <p>89,00 £</p></center>
  </div>
</div>



<!--Footer-->

<footer>
  <div class="footer-section">    
    <a href="https://www.facebook.com/pages/category/supermarket/Tesco-Superstore-440818089460778/" target="_blank"><img src="image/facebook (1).png"></a>
    <a href="https://www.instagram.com/tescofood/?hl=fr" target="_blank"><img src="image/instagram (2).png"></a>
    <a href="https://www.youtube.com/tesco" target="_blank"><img src="image/youtube.png"></a>
    <a href="https://twitter (1).com/Tesco" target="_blank"><img src="image/twitter (1).png"></a>
</div>

  <div class="footer-bottom">
    <p>&copy; 2023 | Tropical Farm</p>
  </div>
</footer>


</body>
</html>
