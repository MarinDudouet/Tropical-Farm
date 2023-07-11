<?php
    $serveur = "localhost";
    $dbname = "tropicalfarm";
    $user = "root";
    $pass = "";
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO seller(username, password)
            VALUES(:username, :password)");
        $sth->bindParam(':username',$username);
        $sth->bindParam(':password',$password);

        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location: form-merci.html");

        }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }