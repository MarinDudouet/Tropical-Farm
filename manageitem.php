<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage item admin - Tropical farm</title>


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
function deleteItem(itemId) {
  if (confirm("Are you sure you want to delete this item?")) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_item.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        alert("Item deleted successfully");
        location.reload();
      }
    };
    xhr.send("itemId=" + itemId);
  }
}
</script>


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
        <a href="http://localhost:80/Tropical-Farm/manageitem.php">Manage items</a>
      </li>
      <li>
        <a href="http://localhost:80/Tropical-Farm/manageusers.php">Manage costumers/seller</a>
      </li>
      <li>
        <a href="http://localhost:80/Tropical-Farm/index.php">Home page</a>
      </li>
    </ul>
  </nav>
  </div>
  
  <br><br><br><br><br><br>

<!--Manage item-->


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

$query = "SELECT * FROM item";
$resultat = mysqli_query($connexion, $query);

if (!$resultat) {
    die("error : " . mysqli_error($connexion));
}

while ($row = mysqli_fetch_assoc($resultat)) {
  echo '<div class="item">';
  echo "<img src= image/". $row['photo'] ." alt='Image' /><br>";
  echo "<center><h5><b>" . $row['name'] . "</b></h5>";
  echo "<p>" .$row['price'] . "  £</p></center>";
  echo '<center><button onclick="deleteItem(' . $row['iditem'] . ')">Delete</button></div>';
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
