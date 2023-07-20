<?php

session_start();

    $serveur = "localhost";
    $dbname = "tropicalfarm";
    $user = "root";
    $pass = "";
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    try{
        //Connexion to bdd
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Seller

        $query = "SELECT * FROM seller WHERE username = :username AND password = :password";
        $stmt = $dbco->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
        // Connexion ok
        
        $row = $stmt->fetch();
        $_SESSION["idseller"]=$row['idseller'];
        $_SESSION["username"]=$row["username"];
        $_SESSION["password"]=$row['password'];
        $_SESSION["role"]="seller";
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
        $_SESSION["photo"]=$row['photo'];
        $_SESSION["background"]=$row['background'];
        header('Location: http://localhost:80/Tropical-Farm/seller.php');
        exit();
        } 

        //Buyer

        $query = "SELECT * FROM buyer WHERE username = :username AND password = :password";
        $stmt = $dbco->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
        // Connexion ok
        $row = $stmt->fetch();
        $_SESSION["idbuyer"]=$row['idbuyer'];
        $_SESSION["username"]=$row["username"];
        $_SESSION["password"]=$row['password'];
        $_SESSION["role"]="buyer";
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
        $_SESSION["photo"]=$row['photo'];
        $_SESSION["background"]=$row['background'];
        
        header('Location: http://localhost:80/Tropical-Farm/index.php');
        exit();
        } 

        //Admin

        $query = "SELECT * FROM admin WHERE username = :username AND password = :password";
        $stmt = $dbco->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
        // Connexion ok
        $row = $stmt->fetch();
        $_SESSION["idadmin"]=$row['idadmin'];
        $_SESSION["username"]=$row["username"];
        $_SESSION["password"]=$row['password'];
        $_SESSION["role"]="admin";
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
        $_SESSION["photo"]=$row['photo'];
        $_SESSION["background"]=$row['background'];
        header('Location: http://localhost:80/Tropical-Farm/index.php');
        exit();

        } 

        else {
            // Identifiants wrong
            header('Location: http://localhost:80/Tropical-Farm/loginerror.php');
            exit();
            }

}
    catch(PDOException $e){
        echo 'Error : '.$e->getMessage();
    }
?>