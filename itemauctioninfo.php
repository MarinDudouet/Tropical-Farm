<!DOCTYPE html>
<html>

<?php session_start();?>

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

<script>
  function submitAuction(itemId) {
    var auctionPrice = document.getElementById("auctionPrice").value;
    var auctionForm = document.getElementById("auctionForm" + itemId);

  // Create objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      console.log("The bid has been registered !");
      auctionForm.style.display = "none"; // Cacher le formulaire après soumission
    } else {
      console.error("Error : " + xhr.status);
    }
  }
};


  // prepare the send of info
  var data = new FormData();
  data.append("auctionPrice", auctionPrice);
  data.append("itemId", itemId);

  xhr.open("POST", "insert_auction.php"); 
  xhr.send(data);
}


function submitAuction2(itemId) {
    var auctionPrice = document.getElementById("auctionPrice2").value;
    var auctionForm2 = document.getElementById("auctionForm2" + itemId);

  // Create objet XMLHttpRequest
  var xhr = new XMLHttpRequest();


  xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      console.log("The bid has been registered !");
      auctionForm2.style.display = "none"; // Cacher le formulaire après soumission
    } else {
      console.error("Error : " + xhr.status);
    }
  }
};


  // prepare the send of info
  var data = new FormData();
  data.append("auctionPrice", auctionPrice);
  data.append("itemId", itemId);

  xhr.open("POST", "insert_auction2.php"); 
  xhr.send(data);
}

function submitAuction3(itemId) {
    var auctionPrice = document.getElementById("auctionPrice3").value;
    var auctionForm3 = document.getElementById("auctionForm3" + itemId);

  // Create objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      console.log("The bid has been registered !");
      auctionForm3.style.display = "none"; // Cacher le formulaire après soumission
    } else {
      console.error("Error : " + xhr.status);
    }
  }
};


  // prepare the send of info
  var data = new FormData();
  data.append("auctionPrice", auctionPrice);
  data.append("itemId", itemId);

  xhr.open("POST", "insert_auction3.php"); 
  xhr.send(data);
}

function submitAuction4(itemId) {
    var auctionPrice = document.getElementById("auctionPrice4").value;
    var auctionForm4 = document.getElementById("auctionForm4" + itemId);

  // Create objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      console.log("The bid has been registered !");
      auctionForm4.style.display = "none"; // Cacher le formulaire après soumission
    } else {
      console.error("Error : " + xhr.status);
    }
  }
};


  // prepare the send of info
  var data = new FormData();
  data.append("auctionPrice", auctionPrice);
  data.append("itemId", itemId);

  xhr.open("POST", "insert_auction4.php"); 
  xhr.send(data);
}

</script>
  

<div class="headnav">
  
<!--Header-->

<?php

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

<!--Item-->


<div class="container">

<?php
// Connexion to database
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "tropicalfarm";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if (!$connexion) {
    die("error : " . mysqli_connect_error());
}

if (isset($_GET['iditem'])) {
  $iditem = $_GET['iditem'];}

if (isset($_GET['iditem'])) {
  $iditem = $_GET['iditem'];}

// get data
$condition = "auction is not null";
$condition2 = "iditem = $iditem";

if (isset($_GET['filter'])) {
  $filter = $_GET['filter'];

if($filter == 'asc'){
  $query = "SELECT * FROM item WHERE $condition and $condition2  ORDER BY price ASC";
  $resultat = mysqli_query($connexion, $query);
}

elseif($filter == 'desc'){
  $query = "SELECT * FROM item WHERE $condition and $condition2 ORDER BY price DESC";
  $resultat = mysqli_query($connexion, $query);
}

elseif($filter == 'null'){
  $query = "SELECT * FROM item WHERE $condition and $condition2";
  $resultat = mysqli_query($connexion, $query);
}
}

else{
  $query = "SELECT * FROM item WHERE $condition and $condition2";
  $resultat = mysqli_query($connexion, $query);
}

if (!$resultat) {
    die("error : " . mysqli_error($connexion));
}


while ($row = mysqli_fetch_assoc($resultat)) {

  $iditem = $row['iditem'];
  $_SESSION['iditemauction']=$iditem;
  $name = $row['name'];
  echo '<div class="item">';
  if(isset($row["sell"])){
    echo "<a href='http://localhost:80/Tropical-Farm/item.php?iditem=$iditem'><img src= image/". $row['photo'] ." alt='Image' /><br></a>";}
  else if(isset($row["auction"])){
    echo "<a href='http://localhost:80/Tropical-Farm/item.php?iditem=$iditem'><img src= image/". $row['photo'] ." alt='Image' /><br></a>";}
  echo "<center><h5><b>" . $row['name'] . "</b></h5>";
  echo "<p> Initial price : " .$row['price'] . "  £</p></center>";

  //first bid
  echo '<div id="auctionForm' . $iditem . '">';

  $queryfirst = "SELECT * FROM auction WHERE state='firstbid' and id_item='$iditem' order by id_auction desc limit 1";
  $resultatfirst = mysqli_query($connexion, $queryfirst);

  if ($resultatfirst) {
    $rowfirst = mysqli_fetch_assoc($resultatfirst);
  
    if (mysqli_num_rows($resultatfirst) == 0 || $rowfirst['state'] != 'firstbid') {
      echo '<p>  <input type="number" id="auctionPrice" placeholder="Enter your max bid" min="$row["price"]">';
      echo '<button type="button" onclick="submitAuction(' . $iditem . ')">Submit bid</button></p>';

    }

  }
  echo '</div>';

  //second bid


  $query2 = "SELECT * FROM auction WHERE state='firstbid' and id_item='$iditem' order by id_auction desc limit 1";
  $resultat2 = mysqli_query($connexion, $query2);

  if ($resultat2) {
    $row2 = mysqli_fetch_assoc($resultat2);
  
    if (mysqli_num_rows($resultat2) == 0 || $rowfirst['state'] != 'firstbid') {
      if(isset($rowfirst["price"])){            
        echo '<div id="auctionForm2' . $iditem . '">';
        echo '<p>  <input type="number" id="auctionPrice2" placeholder="Enter your second bid" min="$rowfirst["price"]>';
        echo '<button type="button" onclick="submitAuction2(' . $iditem . ')">Submit bid</button></p>';
        echo '</div>';

      }



    }

  }

  if(isset($rowfirst["price"])){
    echo "<p><center> Max bid : " .$rowfirst['price'] . "  £</p></center>"; }

  if (isset($row2["price"])){
    echo "<p><center> Second bid : " .$row2['price'] . "  £</p></center>"; }

    //third bid

    $query3 = "SELECT * FROM auction WHERE state='secondbid' and id_item='$iditem' order by id_auction desc limit 1";
    $resultat3 = mysqli_query($connexion, $query3);
  
    if ($resultat3) {
      $row3 = mysqli_fetch_assoc($resultat3);
    
      if (mysqli_num_rows($resultat3) == 0 || $row2['state'] != 'secondbid') {
        if(isset($row2["price"])){

          echo '<div id="auctionForm3' . $iditem . '">';
          echo '<p>  <input type="number" id="auctionPrice3" placeholder="Enter your third bid">';
          echo '<button type="button" onclick="submitAuction3(' . $iditem . ')" min="$row2["price"]>Submit bid</button></p>';
          echo '</div>';
        }

  
      }
  
    }

  if(isset($row3["price"])){
    echo "<p><center> Third bid : " .$row3['price'] . "  £</p></center>"; }

//fourth bid

$query4 = "SELECT * FROM auction WHERE state='thirdbid' and id_item='$iditem' order by id_auction desc limit 1";
$resultat4 = mysqli_query($connexion, $query4);

if ($resultat3) {
  $row4 = mysqli_fetch_assoc($resultat4);

  if (mysqli_num_rows($resultat4) === 0 || $row2['state'] == 'secondbid') {
    if(isset($row3["price"])){

      echo '<div id="auctionForm4' . $iditem . '">';
      echo '<p>  <input type="number" id="auctionPrice4" placeholder="Enter your fourth bid" min="$row3["price"]>';
      echo '<button type="button" onclick="submitAuction4(' . $iditem . ')">Submit bid</button></p>';
      echo '</div>';

    }



  }

}

if(isset($rowfirst["price"])){
echo "<p><center> Fourth bid : " .$rowfirst['price'] . "  £</p></center>"; }

  echo "</div>";
  
}

?>
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