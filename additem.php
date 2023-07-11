<?php
    $serveur = "localhost";
    $dbname = "tropicalfarm";
    $user = "root";
    $pass = "";
    
    $name = $_POST["name"];
    $category = $_POST["category"];
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
            INSERT INTO item(name, category, description, price, stock, sell, auction, trade)
            VALUES(:name, :category, :description, :price, :stock, :sell, :auction, :trade)");
        $sth->bindParam(':name',$name);
        $sth->bindParam(':category',$category);
        $sth->bindParam(':description',$description);
        $sth->bindParam(':price',$price);
        $sth->bindParam(':stock',$stock);
        $sth->bindParam(':sell',$auction);
        $sth->bindParam(':trade',$trade);

        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location: form-merci.html");

        }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }