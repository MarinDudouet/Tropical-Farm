<?php
    $serveur = "localhost";
    $dbname = "tropicalfarm";
    $user = "root";
    $pass = "";

    $name = $_POST["name"];
    $photo = $_POST["photo"];
    $category = $_POST["category"];
    $second_category = $_POST["second_category"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $sell = $_POST["sell"];
    $auction = $_POST["auction"];
    $trade = $_POST["trade"];

    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO item(name, photo, category, second_category, description, price, stock, sell, auction, trade)
            VALUES(:name, :photo, :category, :second_category, :description, :price, :stock, :sell, :auction, :trade)");
        $sth->bindParam(':name',$name);
        $sth->bindParam(':photo',$photo);
        $sth->bindParam(':category',$category);
        $sth->bindParam(':second_category',$second_category);
        $sth->bindParam(':description',$description);
        $sth->bindParam(':price',$price);
        $sth->bindParam(':stock',$stock);
        $sth->bindParam(':sell',$sell);
        $sth->bindParam(':auction',$auction);
        $sth->bindParam(':trade',$trade);

        $sth->execute();

        //On renvoie l'utilisateur vers la page de remerciement
        header("Location: http://localhost:80/Tropical-Farm/form-merci.php");

  }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
  