<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Item - Tropical farm</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link href="style.css" rel="stylesheet" type="text/css"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
<script src="java.js"></script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            var number = 1;
            var numberInput = document.getElementById('numberInput');
            var increaseButton = document.getElementById('increaseButton');
            var decreaseButton = document.getElementById('decreaseButton');

            // Fonction pour augmenter le nombre
            increaseButton.addEventListener('click', function() {
                number++;
                if (number > 0) {
                    numberInput.value = number;
                } else {
                    number = 1;
                }
            });

            // Fonction pour diminuer le nombre
            decreaseButton.addEventListener('click', function() {
                number--;
                if (number > 0) {
                    numberInput.value = number;
                } else {
                    number = 1;
                }
            });
        });
    </script>

</head>

<body>

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
  
  <br><br><br><br><br><br>

<!--Item-->


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

// Vérifier si l'ID de l'élément a été envoyé dans l'URL
if (isset($_GET['iditem'])) {
    $iditem = $_GET['iditem'];

    // Récupérer l'ID de session en fonction du rôle de l'utilisateur
    $idsession = null;

    if (isset($_SESSION["role"])) {
        if ($_SESSION["role"] == 'admin' && isset($_SESSION["idadmin"])) {
            $idsession = $_SESSION["idadmin"];
        } elseif ($_SESSION["role"] == 'seller' && isset($_SESSION["idseller"])) {
            $idsession = $_SESSION["idseller"];
        } elseif ($_SESSION["role"] == 'buyer' && isset($_SESSION["idbuyer"])) {
            $idsession = $_SESSION["idbuyer"];
        } else {
            // Gérer le cas où l'ID de session n'est pas défini
            // Vous pouvez afficher un message d'erreur ou rediriger l'utilisateur vers une page appropriée.
        }
    } else {
        // Gérer le cas où le rôle n'est pas défini dans la session
        // Vous pouvez afficher un message d'erreur ou rediriger l'utilisateur vers une page appropriée.
    }

    // Récupération des détails de l'élément
    $query = "SELECT * FROM item WHERE iditem = $iditem";
    $resultat = mysqli_query($connexion, $query);

    if (!$resultat) {
        die("La requête a échoué : " . mysqli_error($connexion));
    }

    // Affichage des détails de l'élément
    if (mysqli_num_rows($resultat) > 0) {
        $row = mysqli_fetch_assoc($resultat);
        $name = $row['name'];
        $price = $row['price'];
        $photo = $row['photo'];
        echo '<div class="item-img-div">';
        echo "<center><img src='image/" . $row['photo'] . "'></center>";
        echo "</div>";
        echo '<div class="item-car-div">';
        echo '<h3 id="item-name">' . $row['name'] . "</h3><br>";
        echo '<p id="item-car">' . $row['description'] . "</p>";
        echo '<div class="container2">';
        echo '<div class="arrow-wrapper">';
        echo    '<div id="increaseButton" class="arrow">&#x25B2;</div>';
        echo    '<div id="decreaseButton" class="arrow">&#x25BC;</div>';
        echo '</div>';
        echo '<div class="number-wrapper">';
        echo    '<input type="text" id="numberInput" class="number-input" value="1" readonly />';
        echo '</div>';
        echo '</div><br>';
        echo '<p id="price">' . $row['price'] . " £</p>";

        // Vérifier si l'ID de session est défini avant d'afficher le bouton "Add to basket"
        if ($idsession !== null) {
            echo "<a href='http://localhost:80/Tropical-Farm/basket.php?iditem=" . $row['iditem'] ."&idsession=". $idsession  . "&quantity=".$quantity. "'><button>Add to basket</button></a>";
        } else {
            echo "Log in to add this item to your basket.";
        }

        echo '</div>';
    } else {
        echo "L'élément n'a pas été trouvé.";
    }
} else {
    echo "L'ID de l'élément n'a pas été spécifié dans l'URL.";
}

?>


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
