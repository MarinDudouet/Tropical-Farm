<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buy - Tropical farm</title>


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

session_start();
$serveur = "localhost";
    $dbname = "tropicalfarm";
    $user = "root";
    $pass = "";
    

    //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "SELECT * FROM buyer WHERE username = :username AND password = :password";
        $stmt = $dbco->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
        // Connexion réussie
        $row = $stmt->fetch();
        $_SESSION["name"]=$row['name'];
        $_SESSION["street"]=$row['street'];
        $_SESSION["flat"]=$row['flat'];
        $_SESSION["city"]=$row['city'];
        $_SESSION["state"]=$row['state'];
        $_SESSION["postcode"]=$row['postcode'];
        $_SESSION["phone"]=$row['phone'];
        $_SESSION["typecard"]=$row['card'];
        $_SESSION["cardnumber"]=$row['cardnumber'];
        $_SESSION["expirationmonth"]=$row['monthexpiration'];
        $_SESSION["expirationyear"]=$row['yearexpiration'];
        $_SESSION["cvc"]=$row['cvc'];
        $username=$row["username"];
        $passwors=$row['password'];}

        $query = "SELECT * FROM seller WHERE username = :username AND password = :password";
        $stmt = $dbco->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
        // Connexion réussie
        $row = $stmt->fetch();
        $_SESSION["name"]=$row['name'];
        $_SESSION["street"]=$row['street'];
        $_SESSION["flat"]=$row['flat'];
        $_SESSION["city"]=$row['city'];
        $_SESSION["state"]=$row['state'];
        $_SESSION["postcode"]=$row['postcode'];
        $_SESSION["phone"]=$row['phone'];
        $_SESSION["typecard"]=$row['card'];
        $_SESSION["cardnumber"]=$row['cardnumber'];
        $_SESSION["expirationmonth"]=$row['monthexpiration'];
        $_SESSION["expirationyear"]=$row['yearexpiration'];
        $_SESSION["cvc"]=$row['cvc'];
        $username=$row["username"];
        $passwors=$row['password'];}

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

<!--Buy-->

<div class="container">
    <div class="item-recap">
        
    </div>
    <div class="info-buyer">
            <div class="step">
            <form action="traitment_account.php"  method="POST">
                <p>1. Delivery Adress</p> 
            </div><br>
            <center><div class="info">
                <p>Name :<br>
                <input type="text" name="name" id="name" value=<?php echo $_SESSION["name"]?>></p>
                <p>Street Name :<br>
                <input type="text" name="street" id="street" placeholder="Street adress" value=<?php echo $_SESSION["street"]?>><br>
                <input type="text" name="flat" id="flat" placeholder="Flat, building, floor, etc." value=<?php echo $_SESSION["flat"]?>></p>
                <p>City :<br>
                <input type="text" name="city" id="city" value=<?php echo $_SESSION["city"]?>></p>
                <p>State/Province/Region :<br>
                <input type="text" name="state" id="state" value=<?php echo $_SESSION["state"]?>></p>
                <p>Postcode :<br>
                <input type="text" name="postcode" id="postcode" value=<?php echo $_SESSION["postcode"]?>></p>
                <p>Phone number :<br>
                <input type="text" value=<?php echo $_SESSION["phone"]?>></p>
            </div></center>
<br>
            <div class="step">
                <p>2. Card informations</p> 
            </div><br>
            <center>
            <div class="info">
                <p>Type of card :<br>
                <?php
                  $selectedOption = $_SESSION["typecard"]; // Supposons que vous avez la valeur de l'option sélectionnée

                  $option1 = "visa";
                  $option2 = "master";
                  ?>

                  <input type="radio" name="card" value="<?php echo $option1; ?>" <?php echo ($selectedOption == $option1) ? 'checked' : ''; ?>> Visa <img src="image/visa.png" width="25px" height="20px">&nbsp;
                  <input type="radio" name="card" value="<?php echo $option2; ?>" <?php echo ($selectedOption == $option2) ? 'checked' : ''; ?>> Mastercard <img src="image/mastercard.png" width="25px" height="15px">
                                    
                </p>
                <p>Name on card :<br>
                <input type="text" value=<?php echo $_SESSION["name"]?>></p>
                <p>Card number :<br>
                <input type="text" name="cardnumber" id="cardnumber" value=<?php echo $_SESSION["cardnumber"]?>><br>
                <p>Month of expiration :<br>
                <input type="text" name="month" id="month" value=<?php echo $_SESSION["expirationmonth"]?>><br>
                <p>Year of expiration :<br>
                <input type="text" name="year" id="year" value=<?php echo $_SESSION["expirationyear"]?>><br>
                <p>Security Code (CVV:CVC) :<br>
                <input type="text" name="cvc" id="cvc" value=<?php echo $_SESSION["cvc"]?>></p>
            </div>
        <button onclick="">Buy it now</button></center>
    </div></form>
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
