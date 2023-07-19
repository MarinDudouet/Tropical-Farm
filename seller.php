<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seller - Tropical farm</title>


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

<br><br><br><br><br>

<!-- Explain -->

<h3>&nbsp; How to sell ?</h3><br>

<div class="containerseller">
<div class="step">
    <p>1. Add a picture</p> 
</div>
<div class="info">
    <img src="image/pictures.png" width="100px" height="100px">
</div>

<div class="step">
    <p>2. Add a name and a description :</p> 
</div>
<div class="info">
    <img src="image/text.png" width="100px" height="100px">
</div>

<div class="step">
    <p>3. Add your price</p> 
</div>
<div class="info">
    <img src="image/price-tag.png" width="100px" height="100px">
</div>
<a href="http://localhost:80/Tropical-Farm/itemseller.php"><center>See my item</center></a><br>

</div>
<br>

<h3>&nbsp; How to auction ?</h3><br>

<div class="containerseller">
<div class="step">
    <p>1. Add your item</p> 
</div>
<div class="info">
    <img src="image/new-product.png" width="100px" height="100px">
</div>

<div class="step">
    <p>2. Follow the auctions :</p> 
</div>
<div class="info">
    <img src="image/volatility (1).png" width="100px" height="100px">
</div>

<div class="step">
    <p>3. Sell your item</p> 
</div>
<div class="info">
    <img src="image/best-price (1).png" width="100px" height="100px">
</div>
<a href="http://localhost:80/Tropical-Farm/auctionseller.php"><center>See my auction</center></a><br>

</div>
<br>

<br>
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
