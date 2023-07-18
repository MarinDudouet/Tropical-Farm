<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My account - Tropical farm</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link href="style.css" rel="stylesheet" type="text/css"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
<script src="java.js"></script>

</head>


<body>

<script>
  function afficherMotDePasse() {
    var champMotDePasse = document.getElementById("cardnumber");
    if (champMotDePasse.type === "password") {
      champMotDePasse.type = "text";
    } else {
      champMotDePasse.type = "password";
    }
  }

  function afficherMotDePasse2() {
    var champMotDePasse = document.getElementById("cvc");
    if (champMotDePasse.type === "password") {
      champMotDePasse.type = "text";
    } else {
      champMotDePasse.type = "password";
    }
  }
</script>

  <audio autostart="true" loop controls src="foret.mp3"></audio>

<div class="headnav">
  
<!--Header-->

<?php

session_start();

if(!isset($_SESSION["photo"])){
  $imageURL = "image/user.png";
}
else{
  $imageURL = "image/" . $_SESSION["photo"];

}
?>

      <?php if(isset($_SESSION["role"])){ echo '<header style="background-color: ' . $_SESSION["background"] . ';">'; } 
            else{echo '<header>';}?>
            <div class="logo">
              <img src="image\logo.png" alt="Logo">
            </div>
            <div class="titre"><a href="http://localhost:80/Tropical-Farm/index.php" class="titre">Tropical Farm</a></div>
            <div class="dropdown">
              <?php if(!isset($_SESSION["role"])){ echo '<a href="http://localhost:80/Tropical-Farm/login.php" class="dropdown-btn">';}
                elseif(isset($_SESSION["role"]) && $_SESSION["role"]=="buyer"){
                  echo '<a href="http://localhost:80/Tropical-Farm/myaccount.php">';}
                else{echo '<a class="dropdown-btn">';}?><img src="<?php echo $imageURL; ?>" width="50px" height="50px"></a>
              <?php if(isset($_SESSION["role"])){echo '<a href="http://localhost:80/Tropical-Farm/logout.php" style="color: white; text-decoration: none; margin-right: 15px;"><b>Logout</b></a>'; } ?>

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
        <a href="http://localhost:80/Tropical-Farm/ambibians.php">Amphibians<img class="dropdown2-image" src="image\amphibiens.png"></a>
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
    <?php if(isset($_SESSION["role"]) && ($_SESSION["role"]=='seller' || $_SESSION["role"]=='admin')){ echo '
        <li>
          <a href="http://localhost:80/Tropical-Farm/seller.php">Sell</a>
        </li>'; } ?>
        <?php if(isset($_SESSION["role"]) && $_SESSION["role"]=='admin'){ echo '
        <li>
          <a href="http://localhost:80/Tropical-Farm/admin.php">Administrator</a>
        </li>'; } ?>
      <li>
        <a href="http://localhost:80/Tropical-Farm/myaccount.php">My account</a>
      </li>
  </ul>

  <div class="panier">
    <a href="http://localhost:80/Tropical-Farm/basket.php"><b>Basket &nbsp</b><img src="image/shopping-bag.png"></a>
  </div>
</nav>
</div>

<br><br><br><br><br>

<div class="container">

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
    $user = $_SESSION["username"];
    $password = $_SESSION["password"];

    // Récupération des détails de l'élément
    $query = "SELECT * FROM buyer WHERE username = '" . $_SESSION["username"] . "'" . " AND password = '" . $_SESSION["password"] ."'";

    $resultat = mysqli_query($connexion, $query);

    if (!$resultat) {
        die("La requête a échoué : " . mysqli_error($connexion));
    }

    // Affichage des détails de l'élément
    if (mysqli_num_rows($resultat) > 0) {
        $row = mysqli_fetch_assoc($resultat);
        $name = $row['name'];
        $photo = $row['photo'];

        echo '<div class="item-img-div">';
        echo "<center><img src=image/". $row['photo'] ."></center>";
        echo "</div>";
        echo '<div class="item-car-div-persoPage">';
        echo '<h3>' . $row['name'] . "</h3><br>";
    } else {
        echo "L'élément n'a pas été trouvé.";
    }
    ?>
        
    <form action="traitement_account2.php"  method="POST">
        <label for="name">Name :</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>"><br><br>
        <label for="street">Street :</label>
        <input type="text" name="street" id="street" value="<?php echo $row['street']; ?>"><br><br>
        <label for="flat">Flat :</label>
        <input type="text" name="flat" id="flat" value="<?php echo $row['flat']; ?>"><br><br>
        <label for="city">City :</label>
        <input type="text" name="city" id="city" value="<?php echo $row['city']; ?>"><br><br>
        <label for="state">State :</label>
        <input type="text" name="state" id="state" value="<?php echo $row['state']; ?>"><br><br>
        <label for="postcode">Postcode :</label>
        <input type="text" name="postcode" id="postcode" value="<?php echo $row['postcode']; ?>"><br><br>
        <label for="card">Card :</label>
        <input type="text" name="card" id="card" value="<?php echo $row['card']; ?>"><br><br>
        <label for="cardnumber">Card numbers maxlength="16" pattern="[0-9]{16}" :</label>
        <input type="password" name="cardnumber" id="cardnumber" value="<?php echo $row['cardnumber']; ?>">
        <center><button type="button" class="boo" onclick="afficherMotDePasse()">👀</button><br><br></center>

        <label for="cvc">CVV :</label>
        <input type="password" maxlength="3" pattern="[0-9]{3}" name="cvc" id="cvc" value="<?php echo $row['cvc']; ?>"><br>
        <center><button type="button" class="boo" onclick="afficherMotDePasse2()">👀</button><br><br></center>

        <label for="expiration">Month of expiration (--) :</label>
        <input type="text" maxlength="2" pattern="[0-9]{2}" name="month" id="month" value="<?php echo $row['monthexpiration']; ?>"><br><br>

        <label for="expiration2">Year of expiration (----) :</label>
        <input type="text" maxlength="4" pattern="[0-9]{4}" name="year" id="year" value="<?php echo $row['yearexpiration']; ?>"><br><br>

        <center><input class="bo" type="submit" value="Modified"></center><br><br>
    </form>

</div></div>

<?php     

    // Fermeture de la connexion à la base de données
    mysqli_close($connexion);
    ?>

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
