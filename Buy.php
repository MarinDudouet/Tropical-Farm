<?php
session_start();
$serveur = "localhost";
$dbname = "tropicalfarm";
$user = "root";
$pass = "";

// On se connecte à la BDD
$dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM buyer WHERE username = :username AND password = :password";
$stmt = $dbco->prepare($query);
$stmt->bindParam(':username', $_SESSION['username']);
$stmt->bindParam(':password', $_SESSION['password']);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Connexion réussie
    $row = $stmt->fetch();
    $_SESSION["name"] = $row['name'];
    $_SESSION["street"] = $row['street'];
    $_SESSION["flat"] = $row['flat'];
    $_SESSION["city"] = $row['city'];
    $_SESSION["state"] = $row['state'];
    $_SESSION["postcode"] = $row['postcode'];
    $_SESSION["phone"] = $row['phone'];
    $_SESSION["typecard"] = $row['card'];
    $_SESSION["cardnumber"] = $row['cardnumber'];
    $_SESSION["expirationmonth"] = $row['monthexpiration'];
    $_SESSION["expirationyear"] = $row['yearexpiration'];
    $_SESSION["cvc"] = $row['cvc'];
}

// Fermeture de la connexion à la base de données
$dbco = null;
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buy - Tropical farm</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
    <script src="java.js"></script>
    <style>
.container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
}

.item-recap {
    /* Styles pour la partie de récapitulation des articles */
}

.info-buyer {
    margin-top: 20px;
}

.step {
    font-weight: bold;
    color: #008000;
    margin-bottom: 10px;
}

.info {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    color: #008000;
    margin-bottom: 5px;
}

input[type="text"],
input[type="radio"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

.expiration-date {
    display: flex;
}

.expiration-date input[type="text"] {
    flex-grow: 1;
    margin-right: 5px;
}

.card-type {
    display: flex;
}

.card-option {
    margin-right: 10px;
}

.buy-button {
    background-color: #008000;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.buy-button:hover {
    background-color: #006400;
}

.center {
    text-align: center;
}

.total-price {
    background-color: #28a745;
    color: white;
    padding: 10px;
    border-radius: 5px;
    margin-top: 20px;
    text-align: center;
  }


    </style>

<script>
function confirmPurchase() {
  // Afficher une alerte avec un message de confirmation
  if (confirm("thank you for your order")) {
    // Si l'utilisateur confirme, effectuer la redirection
    window.location.href = "traitment_account.php";
  } else {
    // Si l'utilisateur annule, empêcher la redirection
    return false;
  }
}
</script>

</head>

<body>
    <div class="headnav">
        <!--Header-->

        <script>
            function showAlert() {
                alert("Your tropical farm order has been registered and will be processed in the next few days.");
                //window.location.href = "http://localhost:80/Tropical-Farm/index.php";
                //http://localhost/Tropical-Farm/index.php";

            }

        </script>


        <?php
$serveur = "localhost";
$dbname = "tropicalfarm";
$user = "root";
$pass = "";


    //Connexion to database
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$username = $_SESSION['username'];
$password = $_SESSION['password'];

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
    $passwors=$row['password'];
}

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
    $passwors=$row['password'];
}

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
    <?php
if (isset($_GET['totalPrice'])) {
    $totalPrice = $_GET['totalPrice'];
} else {
    // Gérer le cas où le total price n'est pas présent dans l'URL
    // Par exemple, rediriger l'utilisateur vers la page basket.php avec un message d'erreur
    header("Location: basket.php?error=1");
    exit;
}
?>

    <div class="container">
        <div class="item-recap">
            <!-- Récapitulation des articles -->
        </div>
        <div class="info-buyer">
            <form action="traitment_account.php" method="POST">
                <div class="step">
                    <p>1. Delivery Address</p>
                </div>
                <div class="info">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="<?php echo $_SESSION['name'] ?>" required>
                </div>
                <div class="info">
                    <label for="street">Street Name:</label>
                    <input type="text" name="street" id="street" placeholder="Street address" value="<?php echo $_SESSION['street'] ?>" required>
                    <input type="text" name="flat" id="flat" placeholder="Flat, building, floor, etc." value="<?php echo $_SESSION['flat'] ?>">
                </div>
                <div class="info">
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" value="<?php echo $_SESSION['city'] ?>" required>
                </div>
                <div class="info">
                    <label for="state">State/Province/Region:</label>
                    <input type="text" name="state" id="state" value="<?php echo $_SESSION['state'] ?>" required>
                </div>
                <div class="info">
                    <label for="postcode">Postcode:</label>
                    <input type="text" name="postcode" id="postcode" value="<?php echo $_SESSION['postcode'] ?>" required>
                </div>
                <div class="info">
                    <label for="phone">Phone number:</label>
                    <input type="text" name="phone" id="phone" maxlength="10" pattern="[0-9]{10}" value="<?php echo $_SESSION['phone'] ?>" required>
                </div>
                <div class="step">
                    <p>2. Card Information</p>
                </div>
                <div class="info">
                    <label for="card">Type of card:</label>
                    <div class="card-type">
                        <?php
            $selectedOption = $_SESSION['typecard'];

            $option1 = 'visa';
            $option2 = 'master';
          ?>

                        <div class="card-option">
                            <input type="radio" name="card" value="<?php echo $option1; ?>" id="visa" <?php echo ($selectedOption == $option1) ? 'checked' : ''; ?>>
                            <label for="visa"><img src="image/visa.png" alt="Visa Card" width="25" height="20"></label>
                        </div>

                        <div class="card-option">
                            <input type="radio" name="card" value="<?php echo $option2; ?>" id="mastercard" <?php echo ($selectedOption == $option2) ? 'checked' : ''; ?>>
                            <label for="mastercard"><img src="image/mastercard.png" alt="Mastercard" width="25" height="15"></label>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <label for="cardname">Name on card:</label>
                    <input type="text" name="cardname" id="cardname" value="<?php echo $_SESSION['name'] ?>" required>
                </div>
                <div class="info">
                    <label for="cardnumber">Card number:</label>
                    <input type="text" name="cardnumber" id="cardnumber" maxlength="16" pattern="[0-9]{16}" value="<?php echo $_SESSION['cardnumber'] ?>" required>
                </div>
                <div class="info">
                    <label for="expiration">Expiration Date:</label>
                    <div class="expiration-date">
                        <input type="text" name="month" id="month" maxlength="2" pattern="[0-9]{2}" value="<?php echo $_SESSION['expirationmonth'] ?>" required>
                        <span>/</span>
                        <input type="text" name="year" id="year" maxlength="4" pattern="[0-9]{4}" value="<?php echo $_SESSION['expirationyear'] ?>" required>
                    </div>
                </div>
                <div class="info">
                    <label for="cvc">Security Code (CVV):</label>
                    <input type="text" name="cvc" id="cvc" maxlength="3" pattern="[0-9]{3}" value="<?php echo $_SESSION['cvc'] ?>" required>
                </div>
                <div class="info">
                    <span><?php echo "<div class='total-price'><b>Total price : $totalPrice £</b></div>";?></span>
                </div>
                <div class="center">
                  <button type="submit" class="buy-button" onclick="confirmPurchase()">Buy it now</button>
                </div>
            </form>
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
