<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Auction info - Tropical farm</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link href="style.css" rel="stylesheet" type="text/css"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
<script src="java.js"></script>

</head>

<body>

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
              <a href="http://localhost:80/Tropical-Farm/login.php" class="dropdown-btn"><img src="<?php echo $imageURL; ?>" width="50px" height="50px"></a>
              <?php if(isset($_SESSION["role"])){ echo '<a href="http://localhost:80/Tropical-Farm/logout.php" style="color: white; text-decoration: none; margin-right: 15px;"><b>Logout</b></a>'; } ?>

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
    <?php if(isset($_SESSION["role"]) && ($_SESSION["role"]=='seller' || $_SESSION["role"]=='admin')){ echo '
        <li>
          <a href="http://localhost:80/Tropical-Farm/seller.php">Sell</a>
        </li>'; } ?>
        <?php if(isset($_SESSION["role"]) && $_SESSION["role"]=='admin'){ echo '
        <li>
          <a href="http://localhost:80/Tropical-Farm/admin.php">Administrator</a>
        </li>'; } ?>
  </ul>

  <div class="panier">
    <a href="http://localhost:80/Tropical-Farm/basket.php"><b>Basket &nbsp</b><img src="image/shopping-bag.png"></a>
  </div>
</nav>
</div>

<br><br><br><br><br>

<!-- Basket -->
<?php

if (isset($_GET['iditem'])) {
    $iditem = $_GET['iditem'];
} 

// Connexion to database
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "tropicalfarm";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if (!$connexion) {
    die("error : " . mysqli_connect_error());
}

// chekc the id
if (isset($_GET['iditem'])) {
    $iditem = $_GET['iditem'];

    // check the connexion from user
    if (!isset($_SESSION['role'])) {
        echo "Please login";
        exit;
    }

    // Get id from user
    $idsession = null;
    $role = $_SESSION['role'];

    if ($role == 'admin' && isset($_SESSION['idadmin'])) {
        $idsession = $_SESSION['idadmin'];
    } elseif ($role == 'seller' && isset($_SESSION['idseller'])) {
        $idsession = $_SESSION['idseller'];
    } elseif ($role == 'buyer' && isset($_SESSION['idbuyer'])) {
        $idsession = $_SESSION['idbuyer'];
    } else {
        echo "You do not have the necessary authorisations to add this item to the basket.";
        exit;
    }

    // Insert the session ID and the element ID in the basket table
    $query = "INSERT INTO auction (id_seller, id_buyer, id_admin, id_item) VALUES (";
    if ($role == 'admin') {
        $query .= "NULL, NULL, $idsession, $iditem)";
    } elseif ($role == 'seller') {
        $query .= "$idsession, NULL, NULL, $iditem)";
    } elseif ($role == 'buyer') {
        $query .= "NULL, $idsession, NULL, $iditem)";
    }

    $resultat = mysqli_query($connexion, $query);

    if (!$resultat) {
        die("error : " . mysqli_error($connexion));
    }

    header("Location: itemauctioninfo.php?added=true");
    exit;
} 

if (!isset($_SESSION['role'])) {
  echo "Please login to see the auction'";
  exit;
}

if (isset($_SESSION['role']) && isset($_GET['added']) && $_GET['added'] === 'true') {
  echo "The item has been successfully added to the basket.";
  // Redirection to the basket page without the GET variable
  header("Location: itemauctioninfo.php");
  exit;
}


// Recover the session ID based on the user's role
$idsession = null;
$role = $_SESSION['role'];

if ($role == 'admin' && isset($_SESSION['idadmin'])) {
  $idsession = $_SESSION['idadmin'];
} elseif ($role == 'seller' && isset($_SESSION['idseller'])) {
  $idsession = $_SESSION['idseller'];
} elseif ($role == 'buyer' && isset($_SESSION['idbuyer'])) {
  $idsession = $_SESSION['idbuyer'];
} else {
  echo "You do not have the necessary authorisations to display the contents of the basket.";
  exit;
}

// Retrieve basket items based on seller, buyer and administrator IDs
$query = "SELECT * FROM auction WHERE ";
if ($role == 'admin') {
  $query .= "id_admin = $idsession";
} elseif ($role == 'seller') {
  $query .= "id_seller = $idsession";
} elseif ($role == 'buyer') {
  $query .= "id_buyer = $idsession";
}

$resultat = mysqli_query($connexion, $query);

if (!$resultat) {
  die("error " . $query . ": " . mysqli_error($connexion));
}


// Display item
if (mysqli_num_rows($resultat) > 0) {
  while ($row = mysqli_fetch_assoc($resultat)) {
      $iditem = $row['id_item'];
    

      // Get info
      $queryItem = "SELECT * FROM item WHERE iditem = $iditem";
      $resultatItem = mysqli_query($connexion, $queryItem);



      if (!$resultatItem) {
          die("La requête a échoué" . $query . ": " . mysqli_error($connexion));
      }

      // Display info
      if (mysqli_num_rows($resultatItem) > 0) {
          $rowItem = mysqli_fetch_assoc($resultatItem);
          $name = $rowItem['name'];
          $price = $rowItem['price'];
          $photo = $rowItem['photo'];

          $queryAu = "SELECT * FROM auction WHERE id_item = $iditem";
          $resultatAuction = mysqli_query($connexion, $queryAu);
          $rowAuc = mysqli_fetch_assoc($resultatAuction);

          echo '<div class="containerhome">';
          echo '<div class="left-div">';
          echo "<img src='image/" . $rowItem['photo'] . "'>";
          echo '<h5>' . $rowItem['name'] . "</h5><br>";
          echo '<p><b> Initial Price : ' . $rowItem['price'] . "£</b></p>";
          echo '<p><b> Your max price : ' . $rowAuc["price"] . "£</b></p>";
          echo '</div>';
          echo '<div class="right-div">';
          echo '<p><b> Your first bid : ' . $rowItem['price']+1 . "£</b></p>";
          echo '</div>';
          echo '</div>';

          
      } else {
          echo "Info from item not found";
      }
  }
} else {
  echo "The basket is empty";
}
?>

<br>
<a href="http://localhost:80/Tropical-Farm/Buy.php" class="basketa"><center>Proceed to payment</center><a><br><br>

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
