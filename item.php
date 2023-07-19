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
    var numberInput = document.getElementById('numberInput');
    var increaseButton = document.getElementById('increaseButton');
    var decreaseButton = document.getElementById('decreaseButton');
    var stockInput = document.getElementById('stockInput');
    var stock = parseInt(stockInput.value);

    // Rise number
    increaseButton.addEventListener('click', function() {
        var currentQuantity = parseInt(numberInput.value);
        if (currentQuantity < stock) {
            numberInput.value = currentQuantity + 1;
        }
    });

    // Decrease number
    decreaseButton.addEventListener('click', function() {
        var currentQuantity = parseInt(numberInput.value);
        if (currentQuantity > 1) {
            numberInput.value = currentQuantity - 1;
        }
    });

    var addToBasketButton = document.getElementById('addToBasketButton');

    addToBasketButton.addEventListener('click', function(e) {
        var selectedQuantity = parseInt(numberInput.value);

        if (selectedQuantity > stock) {
            e.preventDefault(); 
            return;
        }

        var href = addToBasketButton.href;
        href += '&quantity=' + selectedQuantity;
        addToBasketButton.href = href;
    });
});
</script>

</head>

<body>

  <div class="headnav">
<!--Header-->

<script>
  function showAuctionInputs() {
    var auctionInputs = document.getElementById("auctionInputs");
    auctionInputs.style.display = "block";
  }

  function submitAuction() {
  var auctionPrice = document.getElementById("auctionPrice").value;

  //Create objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        console.log("Bid is a success !");
      } else {
        console.error("error in the bid : " + xhr.status);
      }
    }
  };

  // Prepare data for sending
  var data = new FormData();
  data.append("auctionPrice", auctionPrice);

  xhr.open("POST", "insert_auction.php");  
  xhr.send(data);
}


  </script>

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

// Connexion to databse
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "tropicalfarm";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if (!$connexion) {
    die("error : " . mysqli_connect_error());
}


// check the id in the url
if (isset($_GET['iditem'])) {
  $iditem = $_GET['iditem'];

  // get the id
  $idsession = null;

  if (isset($_SESSION["role"])) {
      if ($_SESSION["role"] == 'admin' && isset($_SESSION["idadmin"])) {
          $idsession = $_SESSION["idadmin"];
      } elseif ($_SESSION["role"] == 'seller' && isset($_SESSION["idseller"])) {
          $idsession = $_SESSION["idseller"];
      } elseif ($_SESSION["role"] == 'buyer' && isset($_SESSION["idbuyer"])) {
          $idsession = $_SESSION["idbuyer"];
      } else {
      }
  } else {
  }

  // get item from id
  $query = "SELECT * FROM item WHERE iditem = $iditem";
  $resultat = mysqli_query($connexion, $query);

  if (!$resultat) {
      die("error : " . mysqli_error($connexion));
  }

  // Display info
  if (mysqli_num_rows($resultat) > 0) {
      $row = mysqli_fetch_assoc($resultat);
      $name = $row['name'];
      $price = $row['price'];
      $photo = $row['photo'];
      $stock = $row['stock'];
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
      echo '<input type="hidden" id="stockInput" value="' . $row['stock'] . '" />';
      

      // Check the ID before "Add to basket"
      if ($idsession !== null) {
        if($row["sell"]!= null ){
          echo "<a id='addToBasketButton' href='http://localhost:80/Tropical-Farm/basket.php?iditem=" . $row['iditem'] ."&idsession=". $idsession . "'><button>Add to basket</button></a>";}
        if($row["auction"]!= null ){  
          echo "<a href='http://localhost:80/Tropical-Farm/itemauctioninfo.php?iditem=" . $row['iditem'] ."&idbuyer=". $_SESSION["idadmin"] /*."&idseller=". $_SESSION["idseller"] ."&idadmin=". $_SESSION["idadmin"] */."'><button>Buy by auction</button></a>";}

      } else {
          echo "Log in to do this action";
      }

      echo '</div>';
      echo '<script>
          document.addEventListener("DOMContentLoaded", function() {
              var numberInput = document.getElementById("numberInput");
              var addToBasketButton = document.getElementById("addToBasketButton");

              addToBasketButton.addEventListener("click", function() {
                  var quantity = numberInput.value;
                  addToBasketButton.href += "&quantity=" + quantity;
              });
          });
        </script>';
  } else {
      echo "Item not found";
  }
} else {
  echo "Id not found in the url";
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