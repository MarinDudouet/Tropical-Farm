<?php
session_start();

// check if id in url
if (isset($_GET["iditem"]) && !empty($_GET["iditem"])) {
    $iditem = $_GET["iditem"];
}

// check is user is connected
if (isset($_SESSION["role"]) && $_SESSION["role"] === "seller") {
    $serveur = "localhost";
    $dbname = "tropicalfarm";
    $user = "root";
    $pass = "";

    try {
        // Connexion ok
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['delete_item'])) {
    try {
        // get id to item to delete
        $item_id = $_POST['item_id'];

        // Connexion ok
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // delete item
        $query = "DELETE FROM item WHERE iditem = :item_id";
        $stmt = $dbco->prepare($query);
        $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirection to the same page
        header("Location: itemseller.php");
        exit;
    } catch (PDOException $e) {
        die("Error in the suppression : " . $e->getMessage());
    }
}

        // get back item 
        $idseller = $_SESSION["idseller"];
        $sth = $dbco->prepare("SELECT * FROM item WHERE idseller = :idseller");
        $sth->bindParam(':idseller', $idseller, PDO::PARAM_INT);
        $sth->execute();

        // keep info in database
        $allItems = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Impossible de récupérer les items. Erreur : ' . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Items seller - Tropical farm</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link href="style.css" rel="stylesheet" type="text/css"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
<script src="java.js"></script>

</head>

<body>

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
      <a href="http://localhost:80/Tropical-Farm/itemseller.php">My items</a>
    </li>
    <li>
      <a href="http://localhost:80/Tropical-Farm/auctionseller.php">Auction</a>
    </li>
    <li>
      <a href="http://localhost:80/Tropical-Farm/index.php">Home page</a>
    </li>
  </ul>
</nav>
</div>

<br><br><br><br><br><br>

<!--Item-->
<div class="container">

<div class="item">
      <a href="http://localhost:80/Tropical-Farm/additem.php"><img src="image/pictures.png"></a><br>
      <center><h5><b>Name of the item</b></h5>
      <p><b>Stock</b></p>
      <p><b>Price</b></p></center>
  </div>

  <?php if (!empty($allItems)) { ?>
    <?php foreach ($allItems as $item) { ?>
        <div class="item">
            <a href="#"><img src="image/<?php echo $item['photo']; ?>"></a><br>
            <center>
                <?php
                echo '<h5><b> ' . $item['name'] . '</b></h5>';
                echo '<p><b>Stock: ' . $item['stock'] . '</b></p>';
                echo '<p><b> ' . $item['price'] . ' £</b></p>';
                
                // check if "iditem" define $item before use it
                if (isset($item['iditem'])) {
                    echo '<form method="post" action="itemseller.php">';
                    echo '<input type="hidden" name="item_id" value="' . $item['iditem'] . '">';
                    echo '<button type="submit" name="delete_item">Delete this item</button>';
                    echo '</form>';
                }
                ?>
            </center>
        </div>
    <?php } ?>
<?php } ?>

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
