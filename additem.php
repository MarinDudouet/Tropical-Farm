
  <!DOCTYPE html>
  <html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add item - Tropical farm</title>
  
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link href="style.css" rel="stylesheet" type="text/css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
  <style>
    .hidden {
      display: none;
    }
  </style>
  <script src="java.js"></script>
  <script>
    function showImage(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
  
        reader.onload = function (e) {
          document.getElementById('imagePreview').src = e.target.result;
        };
  
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  
  <script>
    function afficherOptions() {
      var valeurBoutonRadio = document.querySelector('input[name="category"]:checked').value;
      var optionsSupplementaires1 = document.getElementById('optionsSupplementaires1');
      var optionsSupplementaires2 = document.getElementById('optionsSupplementaires2');
      var optionsSupplementaire3 = document.getElementById('optionsSupplementaires3');
  
      if (valeurBoutonRadio === 'reptiles') {
        optionsSupplementaires1.classList.remove('hidden');
      } else {
        optionsSupplementaires1.classList.add('hidden');
      }
      if (valeurBoutonRadio === 'food') {
        optionsSupplementaires2.classList.remove('hidden');
      } else {
        optionsSupplementaires2.classList.add('hidden');
      }
      if (valeurBoutonRadio === 'materials') {
        optionsSupplementaires3.classList.remove('hidden');
      } else {
        optionsSupplementaires3.classList.add('hidden');
      }
    }
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
          <a href="http://localhost:80/Tropical-Farm/itemseller.php">My items</a>
        </li>
        <li>
          <a href="http://localhost:80/Tropical-Farm/auctionseller.php">Auction</a>
        </li>
        <li>
          <a href="http://localhost:80/Tropical-Farm/tradeseller.php">Trade</a>
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
    </nav>
    </div>
    
    <br><br><br><br><br>
  
  <!--Item-->
  
  <div class="container">
      <div class="item-img-div">
          <center><img id="imagePreview" src="#" alt="Image Preview" /></center>
      </div>
      <div class="item-car-div">
          <br>
          <center>
          <form method="post" action="http://localhost:80/Tropical-Farm/additem555.php">
          <input type="text" name="name" placeholder="Name of the item" required><br><br>
          <input type="file" name="photo" value="Select an Image" onchange="showImage(this)" required> <br><br>
          <input type="radio" name="category" value="reptiles" onchange="afficherOptions()" required> Reptiles &nbsp
          <input type="radio" name="category" value="food" onchange="afficherOptions()" required> Food &nbsp
          <input type="radio" name="category" value="materials" onchange="afficherOptions()" required> Materials <br><br>
          <div id="optionsSupplementaires1" class="hidden">
          <input type="radio" name="second_category" value="snakes"> Snakes &nbsp <br>
          <input type="radio" name="second_category" value="lizards"> Lizards &nbsp 
          <input type="radio" name="second_category" value="turtles"> Turtles &nbsp <br>
          <input type="radio" name="second_category" value="amphibians"> Amphibians &nbsp
          <input type="radio" name="second_category" value="chameleons"> Chameleons &nbsp <br><br>
          </div>
          <div id="optionsSupplementaires2" class="hidden">
          <input type="radio" name="second_category" value="snakes"> Living food &nbsp <br>
          <input type="radio" name="second_category" value="lizards"> Frozen food &nbsp 
          <input type="radio" name="second_category" value="chameleons"> Dry food &nbsp <br><br>
          </div>
          <div id="optionsSupplementaires3" class="hidden">
          <input type="radio" name="second_category" value="snakes"> Terrarium &nbsp <br>
          <input type="radio" name="second_category" value="lizards"> Aquarium &nbsp 
          <input type="radio" name="second_category" value="chameleons"> Decoration &nbsp <br><br>
          </div>
          <input type="text" name="description" placeholder="Description of the item" required><br><br>
          <input type="text" name="price" placeholder="Price" required><br><br>
          <input type="text" name="stock" placeholder="Number item" required><br><br>
          <input type="checkbox" name="sell" value="sell"> Sell &nbsp
          <input type="checkbox" name="auction" value="auction"> Auction &nbsp 
          <input type="checkbox" name="trade" value="trade"> Trade <br><br>
          <input class="item-submit" type="submit" value="Add Item">
          <input class="item-submit"  type="reset" value="Reset Values">
          </form>
          </center>
  
  
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
