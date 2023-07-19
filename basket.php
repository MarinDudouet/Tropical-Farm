<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Basket - Tropical farm</title>


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

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "tropicalfarm";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Vérifier si le formulaire de suppression a été soumis
if (isset($_POST['delete_item'])) {
  // Récupérer l'ID de l'élément à supprimer
  $item_id = $_POST['item_id'];

  // Supprimer tous les éléments du même type dans la table "basket"
  $query = "DELETE FROM basket WHERE id_item = $item_id";
  $resultat = mysqli_query($connexion, $query);

  if (!$resultat) {
      die("La requête de suppression a échoué : " . mysqli_error($connexion));
  }

  // Recharger la page pour mettre à jour le panier après la suppression
  header("Location: basket.php");
  exit;
}

// Vérifier si l'ID de l'élément a été envoyé dans l'URL
if (isset($_GET['iditem'])) {
  $iditem = $_GET['iditem'];

  // Vérifier si l'utilisateur est connecté
  if (!isset($_SESSION['role'])) {
      echo "Veuillez vous connecter pour ajouter cet élément au panier.";
      exit;
  }

  // Récupérer l'ID de session en fonction du rôle de l'utilisateur
  $idsession = null;
  $role = $_SESSION['role'];
  $quantity = intval($_GET['quantity']);

  if ($role == 'admin' && isset($_SESSION['idadmin'])) {
      $idsession = $_SESSION['idadmin'];
  } elseif ($role == 'seller' && isset($_SESSION['idseller'])) {
      $idsession = $_SESSION['idseller'];
  } elseif ($role == 'buyer' && isset($_SESSION['idbuyer'])) {
      $idsession = $_SESSION['idbuyer'];
  } else {
      echo "Vous n'avez pas les autorisations nécessaires pour ajouter cet élément au panier.";
      exit;
  }
  
  // Insérer l'ID de session, l'ID de l'élément et la quantité dans la table basket
  $query = "INSERT INTO basket (id_seller, id_buyer, id_admin, id_item, quantity) VALUES (";
  if ($role == 'admin') {
      $query .= "NULL, NULL, $idsession, $iditem, $quantity)";
  } elseif ($role == 'seller') {
      $query .= "$idsession, NULL, NULL, $iditem, $quantity)";
  } elseif ($role == 'buyer') {
      $query .= "NULL, $idsession, NULL, $iditem, $quantity)";
  }

  $resultat = mysqli_query($connexion, $query);

  if (!$resultat) {
      die("La requête a échoué : " . mysqli_error($connexion));
  }

  header("Location: basket.php?added=true");
  exit;
} 

if (!isset($_SESSION['role'])) {
  echo "Veuillez vous connecter pour afficher le contenu du panier.";
  exit;
}

if (isset($_SESSION['role']) && isset($_GET['added']) && $_GET['added'] === 'true') {
  echo "L'élément a été ajouté au panier avec succès.";
  // Redirection vers la page du panier sans la variable GET
  header("Location: basket.php");
  exit;
}


// Récupérer l'ID de session en fonction du rôle de l'utilisateur
$idsession = null;
$role = $_SESSION['role'];

if ($role == 'admin' && isset($_SESSION['idadmin'])) {
  $idsession = $_SESSION['idadmin'];
} elseif ($role == 'seller' && isset($_SESSION['idseller'])) {
  $idsession = $_SESSION['idseller'];
} elseif ($role == 'buyer' && isset($_SESSION['idbuyer'])) {
  $idsession = $_SESSION['idbuyer'];
} else {
  echo "Vous n'avez pas les autorisations nécessaires pour afficher le contenu du panier.";
  exit;
}

// Récupérer les éléments du panier en fonction de l'ID du vendeur, de l'acheteur et de l'administrateur
$query = "SELECT * FROM basket WHERE ";
if ($role == 'admin') {
  $query .= "id_admin = $idsession";
} elseif ($role == 'seller') {
  $query .= "id_seller = $idsession";
} elseif ($role == 'buyer') {
  $query .= "id_buyer = $idsession";
}

$resultat = mysqli_query($connexion, $query);

if (!$resultat) {
  die("La requête a échoué : " . mysqli_error($connexion));
}

$typesAffiches = array();
// ...

// Récupérer les totaux de quantités pour chaque type d'élément
$queryTotals = "SELECT id_item, SUM(quantity) AS totalQuantity FROM basket GROUP BY id_item";
$resultTotals = mysqli_query($connexion, $queryTotals);

if (!$resultTotals) {
  die("La requête a échoué : " . mysqli_error($connexion));
}

$quantityTotals = array();

// Stocker les totaux de quantités dans le tableau $quantityTotals
while ($rowTotal = mysqli_fetch_assoc($resultTotals)) {
  $iditemTotal = $rowTotal['id_item'];
  $totalQuantity = $rowTotal['totalQuantity'];

  $quantityTotals[$iditemTotal] = $totalQuantity;
}

// Affichage des éléments du panier
if (mysqli_num_rows($resultat) > 0) {
  $totalPrice = 0; // Variable pour stocker le prix total général

  while ($row = mysqli_fetch_assoc($resultat)) {
    $iditem = $row['id_item'];
    $quantity = $row['quantity']; // Récupérer la quantité

    // Récupération des détails de l'élément
    $queryItem = "SELECT * FROM item WHERE iditem = $iditem";
    $resultatItem = mysqli_query($connexion, $queryItem);

    if (!$resultatItem) {
      die("La requête a échoué : " . mysqli_error($connexion));
    }

    // Affichage des détails de l'élément
    if (mysqli_num_rows($resultatItem) > 0) {
      $rowItem = mysqli_fetch_assoc($resultatItem);
      $name = $rowItem['name'];
      $price = $rowItem['price'];
      $photo = $rowItem['photo'];
      $type = $rowItem['iditem']; // Utiliser iditem comme type

      // Vérifier si le type d'élément a déjà été affiché
      if (!in_array($type, $typesAffiches)) {
        echo '<div class="basket">';
        echo '<div>';
        echo "<img src='image/" . $rowItem['photo'] . "'>";
        echo '</div>';
        echo '<div class="item-details">';
        echo '<h5>' . $rowItem['name'] . '</h5><br>';

        // Vérifier si le type d'élément a une quantité totale enregistrée
        $totalQuantity = min($quantityTotals[$type], $rowItem['stock']);
        echo '<p><b>Total Quantity: ' . $totalQuantity . '</b></p>';
        echo '<p><b>' . $rowItem['price'] . "£</b></p>";
        echo '<div>';
        echo '<form method="post" action="basket.php">';
        echo '<input type="hidden" name="item_id" value="' . $iditem . '">';
        echo '<button type="submit" class="basketa" name="delete_item">Delete this item</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Ajouter le type d'élément au tableau des types déjà affichés
        $typesAffiches[] = $type;

        // Calculer le prix total pour cet élément
        $totalItemPrice = $price * $quantity;

        // Ajouter le prix total au prix total général
        $totalPrice += $totalItemPrice;
      }
    } else {
      echo "Les détails de l'élément avec ID $iditem n'ont pas été trouvés.";
    }
  }

  
  
  echo "<div class='total-price'><b>Total price: $totalPrice £</b></div>";
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
